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

        $testInsert->insert(4, 'banana');
    }

}