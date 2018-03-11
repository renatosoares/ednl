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

    public function testSize()
    {
        /** @var BinarySearchTree $tree */
        $tree = new BinarySearchTree();
        $tree->insert(10);
        $tree->insert(16);
        $tree->insert(1);
        $this->assertEquals($tree->getSize(), 3);
        $tree->delete(16);
        $this->assertEquals($tree->getSize(), 2);
        $tree->delete(16);
        $this->assertEquals($tree->getSize(), 2);
    }

    public function testMinimumMaximum()
    {
        /** @var BinarySearchTree $tree */
        $tree = new BinarySearchTree();
        $tree->insert(10);
        $tree->insert(16);
        $tree->insert(1);
        $tree->insert(8);
        $this->assertEquals($tree->getMinimum(), 1);
        $this->assertEquals($tree->getMaximum(), 16);
    }

    public function testGetSuccessor()
    {
        /** @var BinarySearchTree  $tree */
        $tree = new BinarySearchTree();
        $tree->insert(15);
        $tree->insert(6);
        $tree->insert(18);
        $tree->insert(17);
        $tree->insert(20);
        $tree->insert(3);
        $tree->insert(7);
        $tree->insert(2);
        $tree->insert(4);
        $tree->insert(13);
        $tree->insert(9);
        $this->assertEquals($tree->getSuccessor(15), 17);
        $this->assertEquals($tree->getSuccessor(13), 15);
    }

}
