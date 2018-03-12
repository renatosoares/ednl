<?php

namespace EDNL\CONTROLLERS;

use EDNL\GRAPH\GraphSimple;
use EDNL\GRAPH\Vertex;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

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

        print_r('%%%%%%%% insere vértice %%%%%%%%' . PHP_EOL);
        $graph->showVertex();

        return $graph;

    }

    public function binRemoveVertex($vertexRemove)
    {
        $graph = $this->binInsertEdge();

        $vertex = $graph->vertex();

        $graph->removeVertex($vertex[$vertexRemove]);

        print_r('%%%%%%%% remove vértice >> ' . $vertexRemove . ' << %%%%%%%%' . PHP_EOL);
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

        $graph->insertEdge($vertex[1], $vertex[2], ($vertex[1]->getValue() + $vertex[2]->getValue()) );

        print_r('%%%%%%%% insere aresta %%%%%%%%' . PHP_EOL);
        $graph->showMatrix();

        return $graph;
    }

    /**
     * Exibe insersão de aresta no navegador
     *
     */
    public function viewInsertEdge()
    {
        echo '<pre>';
        echo $this->binInsertEdge();
        echo '</pre>';
    }

    /**
     * Exibe insersão de vértice no navegador
     *
     */
    public function viewInsertVertex()
    {
        echo '<pre>';
        echo $this->binInsertVertex();
        echo '</pre>';
    }

    /**
     * Exibe remoção do grafo no navegador
     *
     * @param Request $request
     */
    public function viewRemoveVertex(Request $request)
    {
        $key = $request->getAttribute('key');
        echo '<pre>';
        echo $this->binRemoveVertex($key);
        echo '</pre>';
    }

}
