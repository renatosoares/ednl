<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 07/10/17
 * Time: 09:44
 */

namespace EDNL\TREE;


class RedBlackTree extends AbstractSelfBalancingBinarySearchTree
{

    protected $ColorEnum = [
        'RED' => 'red',
        'BLACK' => 'black',
    ];

    /** @var RedBlackNode $nilNode  */
    protected static $nilNode = null;

    /**
     * @param int $element
     * @return Node
     */
    public function insert(int $element): Node
    {
        /** @var Node $newNode */
        $newNode = parent::insert($element);
        $newNode::$left = self::$nilNode;
        $newNode::$right = self::$nilNode;
        $this->root::$parent = self::$nilNode;
        /*  FIXME fazer cast para nó RedBlackTree */
        $this->insertRBFixup($newNode);
        return $newNode;
    }

    private function insertRBFixup(RedBlackTree $currentNode)
    {
        /* TODO */
    }
    /**
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     * @return mixed
     */
    protected function createNode(int $value, Node $parent, Node $left, Node $right): Node
    {
        // TODO: Implement createNode() method.
    }
}
