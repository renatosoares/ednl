<?php

namespace EDNL\TREE;

class Node
{
    /** @var int $key */
    public $key;
    /** @var int $balance */
    public $balance;
    /** @var int $height */
    public $height;
    /** @var Node $left */
    public $left;
    /** @var Node $right */
    public $right;
    /** @var Node $parent */
    public $parent;

    /**
     * Node constructor.
     * @param int $key
     * @param Node $parent
     */
    public function __construct(int $key, $parent)
    {
        $this->key = $key;
        $this->parent = $parent;
    }
}