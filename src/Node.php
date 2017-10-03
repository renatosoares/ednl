<?php

namespace EDNL\TREE;

class Node
{
    /** @var int $value */
    public static $value;
    /** @var Node $parent */
    public static $parent;
    /** @var Node $left */
    public static $left;
    /** @var Node $right */
    public static $right;

    /**
     * Node constructor.
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     */
    public static function Node(int $value, Node $parent, Node $left, Node $right)
    {
        self::$value = $value;
        self::$parent = $parent;
        self::$left = $left;
        self::$right = $right;
    }

    /**
     * @return bool
     */
    public static function isLeaf() : bool
    {

    }

    /**
     * @param $obj
     * @return bool
     */
    public static function equals($obj) : bool
    {

    }

}