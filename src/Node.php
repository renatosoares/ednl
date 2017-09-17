<?php

namespace EDNL\TREE;

class Node
{
    /** @var int $key */
    private $key;
    /** @var int $balance */
    private $balance;
    /** @var int $height */
    private $height;
    /** @var Node $left */
    private $left;
    /** @var Node $right */
    private $right;
    /** @var Node $parent */
    private $parent;

    public function __construct(int $key, Node $parent)
    {
        $this->key = $key;
        $this->parent = $parent;
    }
}