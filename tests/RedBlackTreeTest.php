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
        /** @var RedBlackTree $tree */
        $tree = new RedBlackTree();

//        $tree->insert(3);
//        $tree->insert(1);
//        $tree->insert(2);

        $tree->insert(20);
        $tree->insert(15);
        $tree->insert(25);
        $tree->insert(10); // recolorir 15 e 25 nessa inserção
        $this->assertEquals($tree->root->color, $tree->ColorEnum->BLACK);
//        $this->assertEquals($tree->search(15)->color, $tree->ColorEnum['BLACK']);
//        $this->assertEquals($tree->search(25)->color, $tree->ColorEnum['BLACK']);
        $tree->insert(17);
        $tree->insert(8);
//        $this->assertEquals($tree->search(15)->color, $tree->ColorEnum['RED']);
//        $this->assertEquals($tree->search(10)->color, $tree->ColorEnum['BLACK']);
//        $this->assertEquals($tree->search(17)->color, $tree->ColorEnum['BLACK']);
//        $this->assertEquals($tree->search(8)->color, $tree->ColorEnum['RED']);
        $tree->insert(9); // caso 2/3 - rotação a direita, depois a esquerda
//        $this->assertEquals($tree->search(10)->color, $tree->ColorEnum['RED']);
//        $this->assertEquals($tree->search(8)->color, $tree->ColorEnum['BLACK']);
//        $this->assertEquals($tree->search(9)->left->value, 8);
    }
}
