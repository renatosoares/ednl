<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 10/09/17
 * Time: 16:12
 */

namespace EDNL\TREE;

use PHPUnit\Framework\TestCase;

class TestAvlTree extends TestCase
{
    public function testInsertTree()
    {
        $avl = new AvlTree();

        $avl->insert(7);
        $avl->insert(3);
        $avl->insert(5);
        $avl->insert(2);
        $avl->insert(22);
        $avl->insert(1);
        $avl->insert(8);
        $avl->insert(4);
        $avl->insert(6);
        $avl->insert(9);
        $avl->insert(33);
        $avl->preOrder($avl->getRoot());



    }

}
