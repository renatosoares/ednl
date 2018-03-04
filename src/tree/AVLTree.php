<?php
namespace EDNL\TREE;

class AVLTree extends AbstractSelfBalancingBinarySearchTree
{

    /**
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
}
