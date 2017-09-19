<?php

namespace EDNL\TREE;

class AvlTree extends BinarySearchTree
{
    /** @var Node $root */
    private $root = null;

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

    private function rebalance(Node $parent)
    {

        $heightLeft = $parent->left ? $parent->left->height : 0 ;
        $heightRight = $parent->right ? $parent->right->height : 0;

        $height = $heightLeft - $heightRight;


    }

/*public boolean insert(int key) {
if (root == NULL) {
root = new Node(key, null);
return true;
}

Node n = root;
        while (true) {
            if (n.key == key)
                return false;

            Node parent = n;

            boolean goLeft = n.key > key;
            n = goLeft ? n.left : n.right;

            if (n == null) {
                if (goLeft) {
                    parent.left = new Node(key, parent);
                } else {
                    parent.right = new Node(key, parent);
                }
                rebalance(parent);
                break;
            }
        }
        return true;
    }*/
}
