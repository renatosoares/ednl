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
    /**
     * @property RedBlackNode $parent
     *
     */

    /** @var static RedBlackNode $color */
    public static $color;

    /**
     * @inheritdoc
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     * @param $color
     */
    public static function RedBlackNode(int $value, Node $parent, Node $left, Node $right, $color)
    {
        $parent::Node($value, $parent, $left, $right);
        self::$color = $color;
    }

    /*    protected static class RedBlackNode extends Node {
        public ColorEnum color;

        public RedBlackNode(Integer value, Node parent, Node left, Node right, ColorEnum color) {
            super(value, parent, left, right);
            this.color = color;
        }
    }*/
}


