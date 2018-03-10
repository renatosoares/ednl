<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 16/09/17
 * Time: 17:13
 */

namespace EDNL\TREE;

class BinarySearchTree extends AbstractBinarySearchTree
{

    /**
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     * @return mixed
     */
    protected function createNode(int $value, ?Node $parent, ?Node $left, ?Node $right): Node
    {
        return new Node($value, $parent, $left, $right);
    }
}
