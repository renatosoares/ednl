<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 11/09/17
 * Time: 13:31
 */

namespace EDNL\TREE;

use PHPUnit\Framework\TestCase;

class GraphSimpreTest extends TestCase
{
    public function testInsertVertex()
    {
        $t = new GraphSimple();
        $vertex0 = new Vertex(0,0.5);
        $vertex1 = new Vertex(1,1.5);

        $t->insertVertex($vertex0);
        $t->insertVertex($vertex1);
    }
}
