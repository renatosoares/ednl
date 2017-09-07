<?php

namespace AVLtree;


class Node
{

    private $_left;
    private $_right;
    private $_height;
    private $_key;
    private $_value;

    /**
     * Node constructor.
     * @param null $left
     * @param null $right
     * @param null $height
     * @param null $key
     * @param null $value
     */
    public function __construct($key, $value)
    {
        $this->_left = null;
        $this->_right = null;
        $this->_height = null;
        $this->_key = $key;
        $this->_value = $value;
    }

    /**
     * @return null
     */
    public function getLeft()
    {
        return $this->_left;
    }

    /**
     * @param null $left
     */
    public function setLeft($left)
    {
        $this->_left = $left;
    }

    /**
     * @return null
     */
    public function getRight()
    {
        return $this->_right;
    }

    /**
     * @param null $right
     */
    public function setRight($right)
    {
        $this->_right = $right;
    }

    /**
     * @return null
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param null $height
     */
    public function setHeight($height)
    {
        $this->_height = $height;
    }

    /**
     * @return null
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * @param null $key
     */
    public function setKey($key)
    {
        $this->_key = $key;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @param null $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }


}
