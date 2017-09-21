<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 21/09/17
 * Time: 13:18
 */

namespace EDNL\TREE;


class Tree
{

    /**
     *  Pré-ordem, os filhos de um nó são processados após o nó
     *
     * @param Node $n
     * @return void
     */
    public function preOrder(Node $n)
    {
        print_r($n->key . " ");

        if ($n->left != null) {
            $this->preOrder($n->left);
        }

        if ($n->right != null) {
            $this->preOrder($n->right);
        }
    }

    /**
     *  Em-ordem, em que se processa o filho à esquerda, o nó, e finalmente o filho à direita.
     *
     * @param Node $n
     * @return void
     */
    public function inOrder(Node $n)
    {
        if ($n->left != null) {
            $this->inOrder($n->left);
        }

        print_r($n->key . " ");

        if ($n->right != null){
            $this->inOrder($n->right);
        }

    }

    /**
     * pós-ordem, os filhos são processados antes do nó
     *
     * @param Node $n
     */
    public function postOrder(Node $n)
    {
        if($n->left != null) {
            $this->postOrder($n->left);
        }
        if($n->right != null){
            $this->postOrder($n->right);
        }
        print_r($n->key . " ");
    }
}