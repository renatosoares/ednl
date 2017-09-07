<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 03/09/17
 * Time: 17:03
 */

namespace AVLtree;


class AVLtree
{
    private $_root;
    private $_size;
    private $_compare;

    /**
     * AVLtree constructor.
     * @param null $compareCustom
     * @internal param $_root
     * @internal param $_size
     */
    public function __construct ($compareCustom)
    {
        $this->_root = null ;
        $this->_size = 0;
        if ($compareCustom)
        {
            $this->_compare = $compareCustom;
        }
    }

    private function _compare ($a, $b)
    {
        if ($a > $b) {
            return 1;
        }
        if ($a < $b) {
            return -1;
        }
        return 0;
    }

    public function insert ($key, $value)
    {
        $this->setRoot($this->_insert($key, $value, $this->getRoot()));
        $this->setSize($this->getSize() + 1);
    }

    private function _insert ($key, $value, Node $root) : Node
    {
        if ($root === null) {
            return new Node($key, $value);
        }
        if ($this->_compare($key, $root->getKey()) < 0) {
            $root->setLeft($this->_insert($key, $value, $root->getLeft()));
        } elseif ($this->_compare($key, $root->getKey()) > 0) {
            $root->setRight($this->_insert($key, $value, $root->getRight()));
        } else {
            $this->setSize($this->getSize() -1);
            return $root;
        }

    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->_size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size)
    {
        $this->_size = $size;
    }

    /**
     * @return null
     */
    public function getRoot()
    {
        return $this->_root;
    }

    /**
     * @param null $root
     */
    public function setRoot($root)
    {
        $this->_root = $root;
    }




}