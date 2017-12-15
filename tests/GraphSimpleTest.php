<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 11/09/17
 * Time: 13:31
 */

namespace EDNL\GRAPH;

use PHPUnit\Framework\TestCase;

class GraphSimpleTest extends TestCase
{
    public function testInsertVertex()
    {
        $graph = new GraphSimple();
        $vertex0 = new Vertex(0,0.3);
        $vertex1 = new Vertex(1,1.4);
        $vertex2 = new Vertex(2,2.3);
        $vertex3 = new Vertex(3,2.4);

        $graph->insertVertex($vertex0);
        $graph->insertVertex($vertex1);
        $graph->insertVertex($vertex2);
        $graph->insertVertex($vertex3);

        print_r('%%%%%%%% insere vértice %%%%%%%%' . PHP_EOL);
        $graph->showVertex();

        return $graph;

    }

    public function testRemoveVertex()
    {
        $graph = $this->testInsertEdge();

        $vertex = $graph->vertex();

        $graph->removeVertex($vertex[2]);

        print_r('%%%%%%%% remove vértice %%%%%%%%' . PHP_EOL);
        $graph->showMatrix();
    }

    public function testInsertEdge()
    {

        $graph = $this->testInsertVertex();
        /** @var Vertex $vertex */
        $vertex = $graph->vertex();

        $graph->insertEdge($vertex[0], $vertex[1], ($vertex[0]->getValue() + $vertex[1]->getValue()) );
        $graph->insertEdge($vertex[0], $vertex[2], ($vertex[0]->getValue() + $vertex[2]->getValue()) );
        $graph->insertEdge($vertex[3], $vertex[1], ($vertex[3]->getValue() + $vertex[1]->getValue()) );
        $graph->insertEdge($vertex[3], $vertex[2], ($vertex[3]->getValue() + $vertex[2]->getValue()) );

        $graph->insertEdge($vertex[1], $vertex[2], ($vertex[1]->getValue() + $vertex[2]->getValue()) );

        print_r('%%%%%%%% insere aresta %%%%%%%%' . PHP_EOL);
        $graph->showMatrix();

        return $graph;
    }

}
