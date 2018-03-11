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
    public function __construct(int $value, ?Node $parent, ?Node $left, ?Node $right)
    {
        $this->value = $value;
        $this->parent = $parent;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return bool
     */
    public static function isLeaf(): bool
    {
        /*TODO*/
    }

    public function hashCode(): int
    {
        // TODO Implement
    }

    /**
     * @param object $obj
     * @return bool
     */
    public function equals(object $obj): bool
    {
        /*TODO*/
    }
}
