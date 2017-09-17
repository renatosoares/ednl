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

        $testInsert->insert(7, 'primeiro');
        $testInsert->insert(3, 'segundo');
        $testInsert->insert(5, 'terceiro');
        $testInsert->insert(2, 'quarto');
//        $testInsert->insert(14, 'quinto');
//        $testInsert->insert(22, 'sexto');
//        $testInsert->insert(1, 'setimo');
//        $testInsert->insert(8, 'oitavo');
//        $testInsert->insert(4, 'nono');
//        $testInsert->insert(6, 'decimo');
//        $testInsert->insert(9, 'decimo primeiro');

        $n = $testInsert->getRoot();
        $testInsert->preOrder($n);
        print_r($n);

    }

}
