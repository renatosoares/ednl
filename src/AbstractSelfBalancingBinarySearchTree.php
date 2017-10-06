<?php

namespace EDNL\TREE;


abstract class AbstractSelfBalancingBinarySearchTree extends AbstractBinarySearchTree
{
    /**
     * Rotação para esquerda
     *
     * @param Node $node Nó que será rotacionado
     * @return Node Nó que está no lugar do nó fornecido após a rotação
     */
    protected function rotateLeft(Node $node) : Node
    {
        /** @var Node $temp */
        $temp = $node::$right;
        $temp::$parent = $node::$parent;

        $node::$right = $temp::$left;
        if ($node::$right != null) {
            $node::$right::$parent = $node;
        }

        $temp::$left = $node;
        $node::$parent = $temp;

        // Temp assumiu o lugar do nó, então agora o pai deve apontar para temp
        if ($temp::$parent != null) {
            if ($node == $temp::$parent::$left) {
                $temp::$parent::$left = $temp;
            } else {
                $temp::$parent::$right = $temp;
            }
        } else {
            $this->root = $temp;
        }

        return $temp;
    }
}