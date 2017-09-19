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
        $testInsert = new AvlTree();

        $testInsert->insert(7);
        $testInsert->insert(3);
        $testInsert->insert(5);
        $testInsert->insert(2);
//        $testInsert->insert(14, 'quinto');
//        $testInsert->insert(22, 'sexto');
//        $testInsert->insert(1, 'setimo');
//        $testInsert->insert(8, 'oitavo');
//        $testInsert->insert(4, 'nono');
//        $testInsert->insert(6, 'decimo');
//        $testInsert->insert(9, 'decimo primeiro');


    }

}
