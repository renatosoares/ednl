<?php

namespace EDNL\TREE;

class AVLNode extends Node
{
    /** @var static AVLNode $height */
    public $height;

    /**
     * @inheritdoc
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     */
    public function __construct(int $value, $parent, $left, $right)
    {
        parent::__construct($value, $parent, $left, $right);
    }
}
