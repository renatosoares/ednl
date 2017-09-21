<?php

namespace EDNL\TREE;

class AvlTree extends BinarySearchTree
{
    /** @var Node $root */
    private $root = null;

    /**
     * @return Node
     */
    public function getRoot(): Node
    {
        return $this->root;
    }

    /**
     * @param int $key
     * @return bool
     */
    public function insert(int $key) : bool
    {
        if ($this->root == null) {
            $this->root = new Node($key, null);
            return true;
        }

        /** @var Node $n */
        $n = $this->root;

        while (true) {
            if ($n->key == $key) {
                return false;
            }

            /** @var Node $parent */
            $parent = $n;

            /** @var bool $goLeft */
            $goLeft = $n->key > $key;

            $n = $goLeft ? $n->left : $n->right;

            if ($n == null) {
                if ($goLeft) {
                    $parent->left = new Node($key, $parent);
                } else {
                    $parent->right = new Node($key, $parent);
                }
                $this->rebalance($parent);
                break;
            }
        }
        return true;
    }

    /**
     * @param Node $n
     * @return void
     */
    private function rebalance(Node $n)
    {
        $this->setBalance([$n]);

        if ($n->balance == -2) {
            if ($this->height($n->left->left) >= $this->height($n->left->right)) {
                $n = $this->rotateRight($n);
            } else {
                $n = $this->rotateLeftThenRight($n);
            }
        } elseif ($n->balance == 2) {
            if ($this->height($n->right->right) >= $this->height($n->right->left)) {
                $n = $this->rotateLeft($n);
            } else {
                $n = $this->rotateRightThenLeft($n);
            }
        }

        if ($n->parent != null) {
            $this->rebalance($n->parent);
        } else {
            $this->root = $n;
        }
    }

    /**
     * adiciona fator de balanceamento
     *
     * @param array $nodes
     * @return void
     */
    private function setBalance(array $nodes)
    {
        /** @var Node $n */
        foreach ($nodes as $n) {
            $this->reheight($n);
            $n->balance = $this->height($n->right) - $this->height($n->left);
        }
    }

    /**
     *
     *
     * @param Node $node
     * @return void
     */
    private function reheight(Node $node)
    {
        if ($node != null) {
            $node->height = 1 + max($this->height($node->left), $this->height($node->right));
        }
    }

    /**
     * retorna a altura do nó
     *
     * @param Node $n
     * @return int
     */
    private function height($n) : int
    {
        if ($n == null) {
            return -1;
        }
        return (int) $n->height;
    }

    /**
     * @param Node $a
     * @return Node
     */
    private function rotateLeft(Node $a) : Node
    {
        /** @var Node $b */
        $b = $a->right;
        $b->parent = $a->parent;

        $a->right = $b->left;

        if ($a->right != null) {
            $a->right->parent = $a;
        }

        $b->left = $a;
        $a->parent = $b;

        if ($b->parent != null) {
            if ($b->parent->right == $a) {
                $b->parent->right = $b;
            } else {
                $b->parent->left = $b;
            }
        }

        $this->setBalance([$a, $b]);

        return $b;
    }

    /**
     * @param Node $a
     * @return Node
     */
    private function rotateRight(Node $a) : Node
    {
        /** @var Node $b */
        $b = $a->left;
        $b->parent = $a->parent;

        $a->left = $b->right;

        if ($a->left != null) {
            $a->left->parent = $a;
        }

        $b->right = $a;
        $a->parent = $b;

        if ($b->parent != null) {
            if ($b->parent->right == $a) {
                $b->parent->right == $a;
            } else {
                $b->parent->left = $b;
            }
        }

        $this->setBalance([$a, $b]);

        return $b;
    }



    /**
     * Rotação dupla a direita
     *
     * @param Node $n
     * @return Node
     */
    private function rotateLeftThenRight(Node $n) : Node
    {
        $n->left = $this->rotateLeft($n->left);
        return $this->rotateRight($n);
    }

    /**
     * Rotação dupla a esquerda
     * @param Node $n
     * @return Node
     */
    private function rotateRightThenLeft(Node $n) : Node
    {
        $n->right = $this->rotateRight($n->right);
        return $this->rotateLeft($n);
    }
}
