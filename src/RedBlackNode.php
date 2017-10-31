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
    public $color;

    /**
     * @inheritdoc
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     * @param $color
     */
    public function __construct(int $value, $parent, $left, $right, $color)
    {
        parent::__construct($value, $parent, $left, $right);
        $this->color = $color;
    }
}


