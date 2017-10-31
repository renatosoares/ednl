<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 03/10/17
 * Time: 10:28
 */

namespace EDNL\TREE;


abstract class AbstractBinarySearchTree
{
    /** @var Node $root */
    public $root;

    /** @var  int $size */
    protected $size;

    /**
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     * @return mixed
     */
    abstract protected function createNode(int $value, $parent, $left, $right) : Node;

    /**
     *
     * Procura um nó com o valor do parametro, se não for encontrado retorna null
     *
     * @param int $element
     * @return Node
     */
    public function search(int $element) : Node
    {
        /** @var Node $node */
        $node = $this->root;

        /* TODO */

        return $node;
    }


    /**
     *
     * Insere um novo valor na árvore
     *
     * @param int $element
     * @return Node
     */
    public function insert(int $element) : Node
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
     *
     * Retorna um nó com o elemento passado se ele existir
     *
     * @param int $element
     * @return Node
     */
    public function delete(int $element) : Node
    {
        /*TODO*/
    }

    /**
     * Lógica para deletar quando o nó é encontrado
     *
     * @param int $element : Nó que precisa se excluído
     * @return Node : Novo nó que está no lugar do nó excluído. Ou nulo se o elemento para * delete não foi encontrado.
     */
    protected function deleteProtected(int $element) : Node
    {
        /*TODO*/
    }

    /**
     * Coloque um nó da árvore (newNode) para o local de outro (nodeToReplace).
     *
     * @param Node $nodeToReplace Nó que é substituído por newNode e removido da árvore.
     * @param Node $newNode
     * @return Node Novo nó substituído
     */
    private function transplant(Node $nodeToReplace, Node $newNode) : Node
    {
        /*TODO*/
    }

    /**
     *
     * @param int $element
     * @return Node Retorna true se conter elemento
     */
    public function contains(int $element) : Node
    {
        return $this->search($element) != null;
    }

    /**
     * @return int Menor elemento da árvore
     */
    public function getMinimum() : int
    {
        /*TODO*/
    }

    /**
     * @return int Maior elemento da árvore.
     */
    public function getMaximum() : int
    {
        /*TODO*/
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
    public function getSize() : int
    {
        return $this->size;
    }

    /**
     * Árvore traversal com impressão dos valores dos elementos. Método em ordem.
     *
     * @return void
     */
    public function printTreeInOrder()
    {
        /*TODO*/
    }

    /**
     * Árvore traversal com impressão dos valores dos elementos. Método pré ordem.
     *
     * @return void
     */
    public function printTreePreOrder()
    {
            /*TODO*/
    }

    /**
     * Árvore traversal com impressão dos valores dos elementos. Método pré ordem.
     *
     *@return void
     */
    public function printTreePostOrder()
    {

    }

    /*-------------------PRIVATE HELPER METHODS-------------------*/

    /**
     * Lógica da chamada InOrder
     *
     * @param Node $entry
     */
    private function printTreeInOrderPrivate(Node $entry)
    {
        /*TODO*/
    }

    /**
     * Lógica da chamada PreOrder
     *
     * @param Node $entry
     */
    private function printTreePreOrderPrivate(Node $entry)
    {
        /*TODO*/
    }

    /**
     * Lógica da chamada PostOrder
     *
     * @param Node $entry
     */
    private function printTreePostOrderPrivate(Node $entry)
    {
        /*TODO*/
    }

    /**
     * @param Node $node
     * @return Node
     */
    protected function getMinimumProtected(Node $node) : Node
    {
        /*TODO*/
    }

    /**
     * @param Node $node
     * @return Node
     */
    protected function getMaximumProtected(Node $node) : Node
    {
        /*TODO */
    }


    protected function getSuccessorProtected(Node $node) : Node
    {
        /*TODO*/
    }



    //-------------------------------- TREE PRINTING ------------------------------------

    public function printTree()
    {
        $this->printSubtree($this->root);
    }

    public function printSubtree(Node $node)
    {
        /*TODO*/
    }

    private function printNodeValue(Node $node)
    {
        /*TODO*/
    }

    private function printTreePrivate(Node $node, bool $isRight, string $indent)
    {
        /*TODO*/
    }

}