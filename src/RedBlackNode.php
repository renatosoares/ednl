<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 07/10/17
 * Time: 09:55
 */

namespace EDNL\TREE;


class RedBlackNode extends Node
{
    public static $color;

    public static function RedBlackNode(int $value, Node $parent, Node $left, Node $right, $color)
    {
        $parent::Node($value, $parent, $left, $right);
        self::$color = $color;
    }
}


