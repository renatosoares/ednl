<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 16/09/17
 * Time: 17:13
 */

namespace EDNL\TREE;


class BinarySearchTree
{

    /**
     * @param Node $n
     * @return string
     */
    public function preOrder(Node $n)
    {
        print_r( $n->key . " ");
        if($n->left != null) {
            $this->preOrder($n->left);
        }
        if($n->right != null){
            $this->preOrder($n->right);
        }
    }

    public function inOrder(Node $n)
    {
        if($n->getLeft() != null) {
            $this->inOrder($n->getLeft());
        }
        echo $n->getValue() . " ";
        if($n->getRight() != null){
            $this->inOrder($n->getRight());
        }

    }

    public function postOrder(Node $n)
    {
        if($n->getLeft() != null) {
            $this->postOrder($n->getLeft());
        }
        if($n->getRight() != null){
            $this->postOrder($n->getRight());
        }
        echo $n->getValue() . " ";
    }
}