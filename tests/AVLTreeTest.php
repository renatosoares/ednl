<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 10/09/17
 * Time: 16:12
 */

namespace EDNL\TREE;

class AVLTreeTest extends BaseBSTTest
{
    public function testDelete()
    {
        /** @var AVLTree $tree */
        $tree = new AVLTree();
        $tree->insert(20);
        $tree->insert(15);
        $tree->insert(25);
        $tree->insert(23);
        $this->assertEquals($tree->getSize(), 4);
        $tree->delete(15); // A raiz agora é rotação desequilibrada realizada
        $this->assertEquals($tree->getSize(), 3);
        $this->assertEquals($tree->root->value, 23); // nova raiz
        $this->assertEquals(($tree->root)->height, 1); // nova raiz
        $this->assertEquals($tree->root->left->value, 20);
        $this->assertEquals($tree->root->right->value, 25);

        $this->testTreeBSTProperties($tree->root);
    }

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
