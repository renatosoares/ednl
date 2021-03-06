<?php

namespace EDNL\TREE;

/**
 * Classe abstrata para auto-balanceamento de árvores de busca binária.
 * Contém alguns métodos que são usados para balenceamento da árvores.
 *
 * Class AbstractSelfBalancingBinarySearchTree
 * @package EDNL\TREE
 */

abstract class AbstractSelfBalancingBinarySearchTree extends AbstractBinarySearchTree
{
    /**
     * Rotação para esquerda
     *
     * @param Node $node Nó que será rotacionado
     * @return Node Nó que está no lugar do nó fornecido após a rotação
     */
    protected function rotateLeft(Node $node): Node
    {
        /** @var Node $temp */
        $temp = $node->right;
        $temp->parent = $node->parent;

        $node->right = $temp->left;
        if ($node->right != null) {
            $node->right->parent = $node;
        }

        $temp->left = $node;
        $node->parent = $temp;

        // $temp assumiu o lugar do nó, então agora o pai deve apontar para $temp
        if ($temp->parent != null) {
            if ($node == $temp->parent->left) {
                $temp->parent->left = $temp;
            } else {
                $temp->parent->right = $temp;
            }
        } else {
            $this->root = $temp;
        }

        return $temp;
    }

    /**
     * Rotação para direita
     *
     * @param Node $node Nó que será rotacionado
     * @return Node Nó que vai ficar no lugar do nó fornecido após a rotação
     */
    protected function rotateRight(Node $node): Node
    {
        /** @var Node $temp */
        $temp = $node->left;
        $temp->parent = $node->parent;

        $node->left = $temp->right;
        if ($node->left != null) {
            $node->left->parent = $node;
        }

        $temp->right = $node;
        $node->parent = $temp;

        // $temp assumiu o lugar do nó, então agora o pai deve apontar para $temp
        if ($temp->parent != null) {
            if ($node == $temp->parent->left) {
                $temp->parent->left = $temp;
            } else {
                $temp->parent->right = $temp;
            }
        } else {
            $this->root = $temp;
        }

        return $temp;
    }
}
