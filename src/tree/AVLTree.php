<?php
namespace EDNL\TREE;

/**
 * Na ciência da computação, uma árvore AVL é uma árvore de pesquisa binária auto-equilibrada
 * e foi a primeira estrutura de dados a ser inventada. [1] Em uma árvore AVL, as alturas das
 * duas subveres secundárias de qualquer nó diferem em pelo menos uma. A pesquisa, a inserção
 * e a exclusão tomam o tempo O (log n) nos casos médio e pior, onde n é o número de nós na árvore
 * antes da operação. Inserções e exclusões podem exigir que a árvore seja reequilibrada
 * por uma ou mais rotações na árvore.
 *
 */

class AVLTree extends AbstractSelfBalancingBinarySearchTree
{

    /**
     * @see AbstractBinarySearchTree::insert()
     *
     * O método de inserção da árvore AVL também equilibra a árvore, se necessário.
     * O parâmetro de altura adicional no nó é usado para rastrear se uma subárvore
     * é maior do que outra em mais de um, caso a rotação da árvore AVL seja realizada
     * para recuperar o equilíbrio da árvore.
     *
     * @param int $element
     * @return Node
     */
    public function insert(int $element): Node
    {
        /** @var Node $newNode */
        $newNode = parent::insert($element);

        $this->rebalance($newNode);
        return $newNode;
    }

    /**
     * @see AbstractBinarySearchTree::delete()
     *
     * @param int $element
     * @return Node
     */
    public function delete(int $element): Node
    {
        // TODO: implement
    }

    /**
     * @see AbstractSelfBalancingBinarySearchTree::createNode()
     *
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     * @return mixed
     */
    protected function createNode(int $value, $parent, $left, $right): Node
    {
        // TODO: Implement createNode() method.
    }

    /**
     * Vá do nó inserido e atualize as informações de altura e balanceamento, se necessário.
     * Se algum valor de balanceamento do nó atingir 2 ou -2, isso significa que a subárvore
     * deve ser reequilibrada.
     *
     * @param AVLNode $node
     */
    private function rebalance(AVLNode $node): void
    {
        // TODO:  Implement
    }


    /**
     * Rotação para o lado esquerdo
     *
     * @param Node $node
     * @return Node
     */
    private function avlRotateLeft(Node $node): Node
    {
        // TODO: Implement
    }

    /**
     * Rotação para o lado direito
     *
     * @param Node $node
     * @return Node
     */
    private function avlRotateRight(Node $node): Node
    {
        // TODO: Implement
    }

    /**
     * Pegue o filho direito e gire para o lado direito primeiro e depois gire nó para o lado esquerdo.
     * @param Node $node
     * @return Node
     */
    protected function doubleRotateRightLeft(Node $node): Node
    {
        // TODO Implement
    }

    /**
     * Pegue o filho esquerdo e gire para o lado esquerdo primeiro e depois gire nó para o lado direito.
     *
     * @param Node $node
     * @return Node
     */
    protected function doubleRotateLeftRight(Node $node): Node
    {
        // TODO Implement
    }

    /**
     * Recompõe informações de altura do nó, e sobe para todos os pais. Precisa ser feito depois de excluir.
     *
     */
    private function recomputeHeight(AVLNode $node): void
    {
        // TODO Implement
    }

    /**
     * Retorna uma altura maior de 2 nós.
     *
     * @param AVLNode $node1
     * @param AVLNode $node2
     * @return int
     */
    private function maxHeight(AVLNode $node1, AVLNode $node2): int
    {
        // TODO Implement
    }

    /**
     * Atualiza altura e balanceia o nó
     */
    private static final function updateHeight(AVLNode $node): void
    {
        // TODO Implement
    }

}
