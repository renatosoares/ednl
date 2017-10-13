<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 12/10/17
 * Time: 19:33
 */

namespace EDNL\TREE;

class RedBlackTreeTest extends BaseBSTTest
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
        $this->assertTrue($tree->contains(10));
        $this->assertTrue($tree->contains(16));
        $this->assertTrue($tree->contains(1));
        $this->assertTrue($tree->contains(9));
        $tree->delete(16);
        $tree->delete(1);
        $this->assertFalse($tree->contains(16));
        $this->assertFalse($tree->contains(1));

        $this->testTreeBSTProperties($tree->root);
    }
}
