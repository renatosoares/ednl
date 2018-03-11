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
    protected function createNode(int $value, ?Node $parent, ?Node $left, ?Node $right): Node
    {
        return new AVLNode($value, $parent, $left, $right);
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
        while ($node != null) {

            /** @var Node $parent */
            $parent = $node->parent;

            /**
             * @var int $leftHeight
             * @var AVLNode $node->left
             */
            $leftHeight = ($node->left == null) ? -1 : ($node->left)->height;

            /**
             * @var int $rightHeight
             * @var AVLNode $node->right
             */
            $rightHeight = ($node->right == null) ? -1 : ($node->right)->height;

            /** @var int $nodeBalance */
            $nodeBalance = $rightHeight - $leftHeight;

            // rebalanceamento (-2 significa subárvore à esquerda, 2 significa subárvore direito)
            if ($nodeBalance == 2) {
                if ($node->right->right != null) {
                    /** @var AVLNode $node */
                    $node = $this->avlRotateLeft($node);
                    break;
                } else {
                    /** @var AVLNode $node */
                    $node = $this->doubleRotateRightLeft($node);
                    break;
                }
            } elseif ($nodeBalance == -2) {
                if ($node->left->left != null) {
                    /** @var AVLNode $node */
                    $node = $this->avlRotateRight($node);
                    break;
                } else {
                    /** @var AVLNode $node */
                    $node = $this->doubleRotateLeftRight($node);
                    break;
                }
            } else {
                self::updateHeight($node);
            }

            /** @var AVLNode $node */
            $node = $parent;
        }
    }


    /**
     * Rotação para o lado esquerdo
     *
     * @param Node $node
     * @return Node
     */
    private function avlRotateLeft(Node $node): Node
    {
        /** @var Node $temp */
        $temp = parent::rotateLeft($node);

        /**
         * @var AVLNode $temp->right
         * @var AVLNode $temp
         */
        self::updateHeight($temp->left);
        self::updateHeight($temp);

        return $temp;
    }

    /**
     * Rotação para o lado direito
     *
     * @param Node $node
     * @return Node
     */
    private function avlRotateRight(Node $node): Node
    {
        /** @var Node $temp */
        $temp = parent::rotateRight($node);

        /**
         * @var AVLNode $temp->right
         * @var AVLNode $temp
         */
        self::updateHeight($temp->right);
        self::updateHeight($temp);

        return $temp;
    }

    /**
     * Pegue o filho direito e gire para o lado direito primeiro e depois gire nó para o lado esquerdo.
     * @param Node $node
     * @return Node
     */
    protected function doubleRotateRightLeft(Node $node): Node
    {
        $node->right = $this->avlRotateRight($node->right);
        return $this->avlRotateLeft($node);
    }

    /**
     * Pegue o filho esquerdo e gire para o lado esquerdo primeiro e depois gire nó para o lado direito.
     *
     * @param Node $node
     * @return Node
     */
    protected function doubleRotateLeftRight(Node $node): Node
    {
        $node->left = $this->avlRotateLeft($node->left);
        return $this->avlRotateRight($node);
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
     * @param AVLNode $node
     */
    private static final function updateHeight(AVLNode $node): void
    {
        /**
         * @var int $leftHeight
         * @var AVLNode $node->left
         */
        $leftHeight = ($node->left == null) ? -1 : ($node->left)->height;

        /**
         * @var int $rightHeight
         * @var AVLNode $node->right
         */
        $rightHeight = ($node->right == null) ? -1 : ($node->right)->height;
        $node->height = 1 + max($leftHeight, $rightHeight);
    }

}
