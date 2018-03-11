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

    public function testInsert()
    {
        /** @var AVLTree $tree */
        $tree = new AVLTree();
        $tree->insert(20);
        $tree->insert(15);
        $tree->insert(25);
        $tree->insert(22);
        $tree->insert(21);
        $this->assertEquals($tree->getSize(), 5);
        $this->assertEquals((int) $tree->root->value, 20);
        $this->assertEquals((int) $tree->root->left->value, 15);

        /**
         * @var AVLNode rightSubtree
         * @vat AVLTree $tree->root->right
         */
        $rightSubtree = $tree->root->right;
        // Rotação realizada e altura + balanço atualizado
        $this->assertEquals((int) $rightSubtree->value, 22);
        $this->assertEquals((int) $rightSubtree->height, 1);
        $this->assertEquals((int) $rightSubtree->right->value, 25);

        /** @var AVLNode $rightSubtree->right */
        $this->assertEquals(($rightSubtree->right)->height, 0);
        $this->assertEquals((int) $rightSubtree->left->value, 21);

        /** @var AVLNode $rightSubtree->left */
        $this->assertEquals(($rightSubtree->left)->height, 0);

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
