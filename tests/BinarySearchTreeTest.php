<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 13/10/17
 * Time: 13:19
 */

namespace EDNL\TREE;

class BinarySearchTreeTest extends BaseBSTTest
{
    public function testInsertDelete()
    {
        $tree = new BinarySearchTree();
        $tree->insert(10);
        $tree->insert(16);
        $tree->insert(1);
        $tree->insert(8);
        $this->assertTrue($tree->contains(10));
        $this->assertTrue($tree->contains(16));
        $this->assertTrue($tree->contains(1));
        $this->assertFalse($tree->contains(9));
        $tree->delete(16);
        $tree->delete(1);
        $this->assertFalse($tree->contains(16));
        $this->assertFalse($tree->contains(1));

        $this->testTreeBSTProperties($tree->root);
    }
}
