<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 11/09/17
 * Time: 13:31
 */

namespace EDNL\TREE;

use PHPUnit\Framework\TestCase;

class SkeletonTest extends TestCase
{
    public function testEcho()
    {
        $t = new SkeletonClass();

        $this->assertEquals('testok', $t->echoPhrase('testok'));
    }
}
