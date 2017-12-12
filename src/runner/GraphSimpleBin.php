<?php

namespace EDNL\RUNNER;

use EDNL\GRAPH\GraphSimple;

class GraphSimpleBin
{
    public function binInsertVertex()
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

        return $graph;

    }

    public function binRemoveVertex()
    {
        /** @var GraphSimple $graph */
        $graph = $this->binInsertEdge();

        /* FIXME verificar inserido */
        $vertex = $graph->vertex();

        $graph->removeVertex($vertex[3]);

        $graph->showMatrix();
    }

    public function binInsertEdge()
    {

        $graph = $this->binInsertVertex();
        /** @var Vertex $vertex */
        $vertex = $graph->vertex();

        $graph->insertEdge($vertex[0], $vertex[1], ($vertex[0]->getValue() + $vertex[1]->getValue()) );
        $graph->insertEdge($vertex[0], $vertex[2], ($vertex[0]->getValue() + $vertex[2]->getValue()) );
        $graph->insertEdge($vertex[3], $vertex[1], ($vertex[3]->getValue() + $vertex[1]->getValue()) );
        $graph->insertEdge($vertex[3], $vertex[2], ($vertex[3]->getValue() + $vertex[2]->getValue()) );

//        $graph->insertEdge($vertex[1], $vertex[2], ($vertex[1]->getValue() + $vertex[2]->getValue()) );

        return $graph;
    }

}
