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
    /**
     *
     */
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

    /**
     *
     */
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

    /**
     * @throws \Exception
     */
    public function testRotateLeft()
    {
        /** @var Node  $root */
        $root = new AVLNode(4, null, null, null);

        /** @var Node $rightChild */
        $rightChild = new AVLNode(6, $root, null, null);
        $root->right = $rightChild;

        /** @var Node $leftGrandChild */
        $leftGrandChild = new AVLNode(5, $rightChild, null, null);

        /** @var Node $rightGrandChild */
        $rightGrandChild = new AVLNode(7, $rightChild, null, null);
        $rightChild->left = $leftGrandChild;
        $rightChild->right = $rightGrandChild;

        /** @var AVLTree $tree */
        $tree = new AVLTree();

        /**
         * teste método protected AVLTree::rotateLeft
         */
        $reflection = new \ReflectionClass(get_class($tree));
        $method = $reflection->getMethod('rotateLeft');
        $method->setAccessible(true);
        /** @var Node $rotated */
        $rotated = $method->invokeArgs($tree, [$root]);

        $this->assertEquals((int) $rotated->value, 6);
        $this->assertEquals((int) $rotated->left->value, 4);
        $this->assertEquals((int) $rotated->right->value, 7);
        $this->assertEquals((int) $rotated->left->right->value, 5);

        $this->assertNull($rotated->parent);
        $this->assertEquals($rotated->left->parent->value, $rotated->value);
        $this->assertEquals($rotated->right->parent->value, $rotated->value);
        $this->assertEquals($rotated->left->right->parent->value, $rotated->left->value);
    }

    /**
     *
     * @throws \ReflectionException
     */
    public function testRotateRight()
    {
        /** @var Node $root */
        $root = new AVLNode(8, null, null, null);

        /** @var Node $leftChild */
        $leftChild = new AVLNode(6, $root, null, null);

        $root->left = $leftChild;

        /** @var Node $leftGrandChild */
        $leftGrandChild = new AVLNode(5, $leftChild, null, null);

        /** @var Node $rightGrandChild */
        $rightGrandChild = new AVLNode(7, $leftChild, null, null);
        $leftChild->left = $leftGrandChild;
        $leftChild->right = $rightGrandChild;

        /** @var AVLTree $tree */
        $tree = new AVLTree();

        /**
         * teste método protected AVLTree::rotateRight
         */
        $reflection = new \ReflectionClass(get_class($tree));
        $method = $reflection->getMethod('rotateRight');
        $method->setAccessible(true);
        /** @var Node $rotated */
        $rotated = $method->invokeArgs($tree, [$root]);

        $this->assertEquals((int) $rotated->value, 6);
        $this->assertEquals((int) $rotated->left->value, 5);
        $this->assertEquals((int) $rotated->right->value, 8);
        $this->assertEquals((int) $rotated->right->left->value, 7);

        $this->assertNull($rotated->parent);
        $this->assertEquals($rotated->left->parent->value, $rotated->value);
        $this->assertEquals($rotated->right->parent->value, $rotated->value);
        $this->assertEquals($rotated->right->left->parent->value, $rotated->right->value);
    }

    /**
     *
     * @throws \ReflectionException
     */
    public function testDoubleRotateRightLeft()
    {
        /** @var Node $root */
        $root = new AVLNode(5, null, null, null);

        /** @var Node $rightChild */
        $rightChild = new AVLNode(8, $root, null, null);


        $root->right = $rightChild;

        /** @var Node $leftGrandChild */
        $leftGrandChild = new AVLNode(7, $rightChild, null, null);

        /** @var Node $rightGrandChild */
        $rightGrandChild = new AVLNode(10, $rightChild, null, null);

        $rightChild->left = $leftGrandChild;
        $rightChild->right = $rightGrandChild;

        /** @var AVLTree $tree */
        $tree = new AVLTree();

        /**
         * teste método protected AVLTree::doubleRotateRightLeft
         */
        $reflection = new \ReflectionClass(get_class($tree));
        $method = $reflection->getMethod('doubleRotateRightLeft');
        $method->setAccessible(true);
        /** @var Node $rotated */
        $rotated = $method->invokeArgs($tree, [$root]);

        $this->assertEquals((int) $rotated->value, 7);
        $this->assertEquals((int) $rotated->left->value, 5);
        $this->assertEquals((int) $rotated->right->value, 8);
        $this->assertEquals((int) $rotated->right->right->value, 10);

        $this->assertNull($rotated->parent);
        $this->assertEquals($rotated->left->parent->value, $rotated->value);
        $this->assertEquals($rotated->right->parent->value, $rotated->value);
        $this->assertEquals($rotated->right->right->parent->value, $rotated->right->value);

        $tree->printTree();
    }

    /**
     *
     * @throws \ReflectionException
     */
    public function testDoubleRotateLeftRight()
    {
        /** @var Node $root */
        $root = new AVLNode(5, null, null, null);

        /** @var Node $leftChild */
        $leftChild = new AVLNode(3, $root, null, null);
        $root->left = $leftChild;

        /** @var Node $leftGrandChild */
        $leftGrandChild = new AVLNode(1, $leftChild, null, null);

        /** @var Node $rightGrandChild */
        $rightGrandChild = new AVLNode(4, $leftChild, null, null);
        $leftChild->left = $leftGrandChild;
        $leftChild->right = $rightGrandChild;

        /** @var AVLTree $tree */
        $tree = new AVLTree();

        /**
         * teste método protected AVLTree::doubleRotateLeftRight
         */
        $reflection = new \ReflectionClass(get_class($tree));
        $method = $reflection->getMethod('doubleRotateLeftRight');
        $method->setAccessible(true);
        /** @var Node $rotated */
        $rotated = $method->invokeArgs($tree, [$root]);

        $this->assertEquals((int) $rotated->value, 4);
        $this->assertEquals((int) $rotated->left->value, 3);
        $this->assertEquals((int) $rotated->right->value, 5);
        $this->assertEquals((int) $rotated->left->left->value, 1);

        $this->assertNull($rotated->parent);
        $this->assertEquals($rotated->left->parent->value, $rotated->value);
        $this->assertEquals($rotated->right->parent->value, $rotated->value);
        $this->assertEquals($rotated->left->left->parent->value, $rotated->left->value);
    }

    /**
     *
     */
    public function testInsertOld()
    {
        $avl = new AVLTree();

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
        $avl->printTree();
    }
}
