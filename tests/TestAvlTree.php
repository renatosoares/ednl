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
        $testInsert = new AvlTree(false);

        $testInsert->insert(1, 'banana');
        $testInsert->insert(2, 'vaca');
        $testInsert->insert(3, 'morango');
        $testInsert->insert(4, 'morango');
        $testInsert->insert(5, 'morango');
        $testInsert->insert(6, 'morango');
        $testInsert->insert(7, 'morango');
        $testInsert->insert(8, 'morango');
        $testInsert->insert(9, 'morango');
        $testInsert->insert(10, 'morango');
        $testInsert->insert(11, 'morango');

        print $testInsert->getRoot();
    }

}
