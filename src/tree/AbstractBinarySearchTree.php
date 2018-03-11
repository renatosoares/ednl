<?php

namespace EDNL\TREE;

/**
 * Implementação de árvore de pesquisa binária abstrata. É basicamente totalmente
 * implementada árvore de pesquisa binária, apenas o método de modelo é fornecido
 * para criar Nó (outras árvores podem ter nós ligeiramente diferentes com mais
 * informações). Desta forma, algum código da árvore de pesquisa binária padrão
 * pode ser reutilizado para outros tipos de binário
 */

abstract class AbstractBinarySearchTree
{
    /** @var Node $root Nó raiz onde toda a árvore começa. */
    public $root;

    /** @var  int $size Tamanho da árvore*/
    protected $size;

    /**
     * Como esta é a classe abstrata e várias árvores têm informações adicionais diferentes
     * em subclasses de nós diferentes, usa esse método abstrato para criar nós (talvez da
     * classe {@link Node} ou talvez alguma sub classe de nó diferente).
     *
     * @param int $value Valor esse nó terá
     * @param Node $parent Pai do nó
     * @param Node $left
     * @param Node $right
     * @return mixed
     */
    abstract protected function createNode(int $value, ?Node $parent, ?Node $left, ?Node $right): Node;

    /**
     *
     * Procura um nó com o valor do parametro, se não for encontrado retorna null
     *
     * @param int $element
     * @return Node
     */
    public function search(int $element): ?Node
    {
        /** @var Node $node */
        $node = $this->root;

        while ($node != null && $node->value != null && $node->value != $element) {
            if ($element < $node->value) {
                $node = $node->left;
            } else {
                $node = $node->right;
            }
        }

        return $node;
    }


    /**
     *
     * Insere um novo valor na árvore
     *
     * @param int $element
     * @return Node
     */
    public function insert(int $element): Node
    {
        if ($this->root == null) {
            $this->root = $this->createNode($element, null, null, null);
            $this->size++;
            return $this->root;
        }

        /** @var Node $insertParentNode */
        $insertParentNode = null;

        /** @var Node $searchTempNode */
        $searchTempNode = $this->root;

        while ($searchTempNode != null && $searchTempNode->value != null) {
            $insertParentNode = $searchTempNode;
            if ($element < $searchTempNode->value) {
                $searchTempNode = $searchTempNode->left;
            } else {
                $searchTempNode = $searchTempNode->right;
            }
        }

        $newNode = $this->createNode($element, $insertParentNode, null, null);

        if ($insertParentNode->value > $newNode->value) {
            $insertParentNode->left = $newNode;
        } else {
            $insertParentNode->right = $newNode;
        }

        $this->size++;

        return $newNode;
    }

    /**
     * Remove um nó com o elemento passado se ele existir
     *
     * @param int $element Elemento que será removido
     * @return Node Novo nó que está no lugar do nó excluído. Ou nulo se o elemento para apagar não foi encontrado.
     */
    public function delete(int $element): ?Node
    {
        /** @var Node $deleteNode */
        $deleteNode = $this->search($element);

        if ($deleteNode != null) {
            return $this->deleteProtected($deleteNode);
        } else {
            return null;
        }
    }

   /**
     * Lógica para deletar quando o nó é encontrado
     *
     * @param Node $deleteNode Nó que precisa se excluído
     * @return Node Novo nó que está no lugar do nó excluído. Ou nulo se o elemento para * delete não foi encontrado.
     */
    protected function deleteProtected(Node $deleteNode): ?Node
    {
        if ($deleteNode != null) {
            /** @var Node $nodeToReturn */
            $nodeToReturn = null;

            if ($deleteNode != null) {
                if ($deleteNode->left == null) {
                    $nodeToReturn = $this->transplant($deleteNode, $deleteNode->right);
                } elseif ($deleteNode->right == null) {
                    $nodeToReturn = $this->transplant($deleteNode, $deleteNode->left);
                } else {
                    /** @var Node $successorNode */
                    $successorNode = $this->getMinimumProtected($deleteNode->right);

                    if ($successorNode->parent != $deleteNode) {
                        $this->transplant($successorNode, $successorNode->right);
                        $successorNode->right = $deleteNode->right;
                        $successorNode->right->parent = $successorNode;
                    }

                    $this->transplant($deleteNode, $successorNode);
                    $successorNode->left = $deleteNode->left;
                    $successorNode->left->parent = $successorNode;
                    $nodeToReturn = $successorNode;
                }
                $this->size--;
            }
            return $nodeToReturn;
        }
        return null;
    }

    /**
     * Coloque um nó da árvore (newNode) para o local de outro (nodeToReplace).
     *
     * @param Node $nodeToReplace Nó que é substituído por newNode e removido da árvore.
     * @param Node $newNode
     * @return Node Novo nó substituído
     */
    private function transplant(?Node $nodeToReplace, ?Node $newNode): ?Node
    {
        if ($nodeToReplace->parent == null) {
            $this->root = $newNode;
        } elseif ($nodeToReplace == $nodeToReplace->parent->left) {
            $nodeToReplace->parent->left = $newNode;
        } else {
            $nodeToReplace->parent->right = $newNode;
        }

        if ($newNode != null) {
            $newNode->parent = $nodeToReplace->parent;
        }
        return $newNode;
    }

    /**
     *
     * @param int $element
     * @return bool Retorna true se conter elemento
     */
    public function contains(int $element): bool
    {
        return $this->search($element) != null;
    }

    /**
     * @return int Menor elemento da árvore
     */
    public function getMinimum(): int
    {
        return $this->getMinimumProtected($this->root)->value;
    }

    /**
     * @return int Maior elemento da árvore.
     */
    public function getMaximum(): int
    {
        return $this->getMaximumProtected($this->root)->value;
    }


    /**
     * Obter o elemento elemento seguinte que é maior que o elemento fornecido
     *
     * @param int $element Elemento para quem o elemento descendente é pesquisado
     * @return int Valor sucessor
     */
    public function getSuccessor(int $element) : int
    {
        /*TODO*/
    }

    /**
     * @return int retorna número de elementos da árvore
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Árvore traversal com impressão dos valores dos elementos. Método em ordem.
     *
     * @return void
     */
    public function printTreeInOrder(): void
    {
        /*TODO*/
    }

    /**
     * Árvore traversal com impressão dos valores dos elementos. Método pré ordem.
     *
     * @return void
     */
    public function printTreePreOrder(): void
    {
            /*TODO*/
    }

    /**
     * Árvore traversal com impressão dos valores dos elementos. Método pós ordem.
     *
     * @return void
     */
    public function printTreePostOrder(): void
    {
    }

    /*-------------------PRIVATE HELPER METHODS-------------------*/

    /**
     * Lógica da chamada InOrder
     *
     * @param Node $entry
     */
    private function printTreeInOrderPrivate(Node $entry): void
    {
        /*TODO*/
    }

    /**
     * Lógica da chamada PreOrder
     *
     * @param Node $entry
     */
    private function printTreePreOrderPrivate(Node $entry): void
    {
        /*TODO*/
    }

    /**
     * Lógica da chamada PostOrder
     *
     * @param Node $entry
     */
    private function printTreePostOrderPrivate(Node $entry): void
    {
        /*TODO*/
    }

    /**
     * @param Node $node
     * @return Node
     */
    protected function getMinimumProtected(Node $node): Node
    {
        while ($node->left != null) {
            $node = $node->left;
        }
        return $node;
    }

    /**
     * @param Node $node
     * @return Node
     */
    protected function getMaximumProtected(Node $node): Node
    {
        while ($node->right != null) {
            $node = $node->right;
        }

        return $node;
    }


    /**
     * @param Node $node
     * @return Node
     */
    protected function getSuccessorProtected(Node $node): Node
    {
        /*TODO*/
    }



    //-------------------------------- TREE PRINTING ------------------------------------

    /**
     *
     */
    public function printTree(): void
    {
        $this->printSubtree($this->root);
    }

    /**
     * @param Node $node
     */
    public function printSubtree(Node $node): void
    {
        /*TODO*/
    }

    /**
     * @param Node $node
     */
    private function printNodeValue(Node $node): void
    {

    }

    /**
     * @param Node $node
     * @param bool $isRight
     * @param string $indent
     */
    private function printTreePrivate(Node $node, bool $isRight, string $indent)
    {
        /*TODO*/
    }
}
