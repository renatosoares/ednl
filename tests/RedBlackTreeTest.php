<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 12/10/17
 * Time: 19:33
 */

namespace EDNL\TREE;

use PHPUnit\Framework\TestCase;

class RedBlackTreeTest extends TestCase
{
    /**
     *
     */
    public function testInsert()
    {
        $tree = new RedBlackTree();
        $tree->insert(20);
        $tree->insert(15);
        $tree->insert(25);
        $tree->insert(10);
    }
}
