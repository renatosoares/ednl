<?php

namespace EDNL\TREE;

class Node
{
    /** @var int $value */
    public $value;
    /** @var Node $parent */
    public $parent;
    /** @var Node $left */
    public $left;
    /** @var Node $right */
    public $right;

    /**
     * Node constructor.
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     */
    public function __construct(int $value, $parent, $left, $right)
    {
        $this->value = $value;
        $this->parent = $parent;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return bool
     */
    public static function isLeaf() : bool
    {
        /*TODO*/
    }

    /**
     * @param $obj
     * @return bool
     */
    public static function equals($obj) : bool
    {
        /*TODO*/
    }
}
