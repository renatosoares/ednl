<?php

namespace EDNL\TREE;
// FIXME https://rosettacode.org/wiki/AVL_tree#Java
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

        }
    }

/*public boolean insert(int key) {
if (root == null) {
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
