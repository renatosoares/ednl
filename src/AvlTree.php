<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 03/09/17
 * Time: 17:03
 */

namespace EDNL\TREE;

class AvlTree
{
    private $_root;
    private $_size;
    private $_compare;

    private $_balanceState = [
        'UNBALANCED_RIGHT'          => 1,
        'SLIGHTLY_UNBALANCED_RIGHT' => 2,
        'BALANCED'                  => 3,
        'SLIGHTLY_UNBALANCED_LEFT'  => 4,
        'UNBALANCED_LEFT'           => 5
    ];

    /**
     * AVLtree constructor.
     * @param null $compareCustom
     * @internal param $_root
     * @internal param $_size
     */
    public function __construct($compareCustom)
    {
        $this->_root = null ;
        $this->_size = 0;
        if ($compareCustom) {
            $this->_compare = $compareCustom;
        }
    }

    private function _compare($a, $b)
    {
        if ($a > $b) {
            return 1;
        }
        if ($a < $b) {
            return -1;
        }
        return 0;
    }

    /**
     *
     *
     *
     * @param $key
     * @param $value
     */
    public function insert($key, $value)
    {
        $this->_root = $this->_insert($key, $value, $this->_root);
        $this->_size++;
    }

    /**
     * Insere um novo nó com uma chave específica na árvore
     *
     * @param $key
     * @param $value
     * @param Node $root
     * @return Node
     */
    private function _insert($key, $value, $root) : Node
    {
        if ($root === null) {
            return new Node($key, $value);
        }
        if ($this->_compare($key, $root->key) < 0) {
            $root->left = $this->_insert($key, $value, $root->left);
        } elseif ($this->_compare($key, $root->key) > 0) {
            $root->right = $this->_insert($key, $value, $root->right);
        } else {
            $this->_size--;
            return $root;
        }

        $root->height = max($root->leftHeight(), $root->rightHeight());
        $balanceState = $this->getBalanceState($root);

        if ($balanceState === $this->_balanceState['UNBALANCED_LEFT']) {
            if ($this->_compare($key, $root->left->key) < 0) {
                // Rotação simples a direita
                $root = $root->rotateRight();
            } else {
                // Rotação dupla a direita
                $root->left = $root->left->rotateLeft();
                return $root->rotateRight();
            }
        }

        if ($balanceState === $this->_balanceState['UNBALANCED_RIGHT']) {
            if ($this->_compare($key, $root->right->key) > 0) {
                // Rotação simples e esquerda
                $root = $root->rotateLeft();
            } else {
                // Rotação dupla a esquerda
                $root->right = $root->right->rotateRight();
                return $root->rotateLeft();
            }
        }

        return $root;
    }

    /**
     * Pega o estado de balanceamento do Nó, indicando se a sub árvore esquerda ou direita está desbalanceada.
     * @param Node $node
     * @return Array $_balanceState
     */
    protected function getBalanceState(Node $node)
    {
        $heightDifference = $node->leftHeight() - $node->rightHeight();

        switch ($heightDifference) {
            case -2:
                return $this->_balanceState['UNBALANCED_RIGHT'];
            case -1:
                return $this->_balanceState['SLIGHTLY_UNBALANCED_RIGHT'];
            case 1:
                return $this->_balanceState['SLIGHTLY_UNBALANCED_LEFT'];
            case 2:
                return $this->_balanceState['UNBALANCED_LEFT'];
            default:
                return $this->_balanceState['BALANCED'];
        }
    }

    public function getRoot()
    {
        return $this->_root;
    }

}
