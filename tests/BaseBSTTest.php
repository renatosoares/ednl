<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 12/10/17
 * Time: 19:44
 */

namespace EDNL\TREE;

use PHPUnit\Framework\TestCase;

class BaseBSTTest extends TestCase
{

    /**
     * Superclasse que contém alguns testes BST básicos.
     *
     * @param Node $entry
     */
    protected function testTreeBSTProperties(Node $entry)
    {
        if ($entry != null) {
            // propriedades de heap de teste e propriedades BST
            if ($entry::$left != null) {
                $this->assertTrue($entry::$value >= $entry::$left::$value);
            }
            if ($entry::$right != null) {
               $this->assertTrue($entry::$value <= $entry::$right::$value);
            }
            $this->testTreeBSTProperties($entry::$left);
            $this->testTreeBSTProperties($entry::$right);
        }
    }
}
