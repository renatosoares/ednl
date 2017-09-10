<?php

namespace EDNL\TREE;

class Node
{

    public $left;
    public $right;
    public $height;
    public $key;
    public $value;

    public function __construct($key, $value)
    {
        $this->left = null;
        $this->right = null;
        $this->height = null;
        $this->key = $key;
        $this->value = $value;
    }

    public function leftHeight()
    {
        if (! $this->left) {
            return -1;
        }
        return $this->left->height;
    }
    public function rightHeight()
    {
        if (! $this->right) {
            return -1;
        }
        return $this->right->height;
    }

    /**
     * Rotação simples a direita
     * Rotação direita de um Nó
     *
     * @return Node : O nó root da sub-árvore, o nó onde esté nó é usado
     */
    public function rotateRight()
    {
        $other = $this->left;
        $this->left = $other->right;
        $other->right = $this;
        $this->height = max($this->leftHeight(), $this->rightHeight());

        $other->height = max($other->leftHeight(), $this->height);
        return $other;
    }

    public function rotateLeft()
    {
        $other = $this->right;
        $this->right = $other->left;
        $other->left = $this;
        $this->height = max($this->leftHeight(), $this->rightHeight());
        $other->height = max($other->rightHeight(), $this->height);
        return $other;
    }
}
