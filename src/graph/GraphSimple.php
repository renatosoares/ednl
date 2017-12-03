<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 02/11/17
 * Time: 12:22
 */

namespace EDNL\GRAPH;

use ArrayIterator;
use CachingIterator;
use SplFixedArray;

class GraphSimple implements IGraphSimple
{
    /** @var int $quantityVertex */
    private $quantityVertex;

    /** @var array $vertex */
    private $vertex;

    /** @var SplFixedArray $matrixAdjacent */
    private $matrixAdjacent;

    /**
     * GraphSimple constructor.
     */
    public function __construct()
    {
        $this->quantityVertex = 0;
        $this->vertex = [];
    }

    /**
     *  Insere e retorna um novo vértice armazenando o elemento $vertex
     * @param Vertex $vertex
     * @return void
     */
    public function insertVertex(Vertex $vertex): void
    {
        $this->quantityVertex = $this->quantityVertex + 1;
        $this->vertex[] = $vertex;

        // cria matrix para a quantidade de vertices
        if ($this->quantityVertex == 1) {
            $this->matrixAdjacent = new SplFixedArray($this->quantityVertex);
            $this->matrixAdjacent->offsetSet(($this->quantityVertex - 1), new SplFixedArray($this->quantityVertex));
        } else {
            do {
                $this->matrixAdjacent->current()->setSize($this->quantityVertex);
                $this->matrixAdjacent->next();

                $hasNext = $this->matrixAdjacent->valid();

                if (! $hasNext) {
                    // volta para o início da matrix
                    do {
                        $this->matrixAdjacent->rewind();
                    } while ($this->matrixAdjacent->key() != 0);
                }
            } while ($hasNext);

            $this->matrixAdjacent->setSize($this->quantityVertex);

            $this->matrixAdjacent->offsetSet(($this->quantityVertex - 1), new SplFixedArray($this->quantityVertex));
        }


    }

    /**
     *  Remove o vértice $vertex ( e todas as arestas incidentes)
     *
     * @param Vertex $vertex
     * @return void
     */
    public function removeVertex(Vertex $vertex): void
    {
        $this->quantityVertex--;

        /** @var int $index */
        $index = $this->findIndex($vertex->getKey());

        unset($this->vertex[$index]); // remove o vértice do vector

        // remove linha e colunas da matriz de adjacêcia
        /** @var SplFixedArray $tempMatrixAdj[Edge] */
        $tempMatrixAdj = new SplFixedArray($this->quantityVertex);
        foreach ($tempMatrixAdj as $key => $value) {
            $tempMatrixAdj->offsetSet($key, new SplFixedArray($this->quantityVertex));
        }

        /** @var int $ff */
        $ff = 0;
        /** @var int $gg */
        $gg;

        for ($f = 0; $f < $this->quantityVertex + 1; $f++) {
            $gg = 0;

            for ($g = 0; $g < $this->quantityVertex + 1; $g++) {

                if ($f != $index && $g != $index) {
                    $tempMatrixAdj[$ff][$gg] = $this->matrixAdjacent[$f][$g];

                    if ($g != $index) {
                        $gg++;
                    }
                }
            }
            if ($f != $index) {
                $ff++;
            }
        }

        $this->matrixAdjacent = $tempMatrixAdj;
    }

    /**
     *  Insere e retorna uma nova aresta não-dirigida (v1,v2) armazenando o elemento $value
     *
     * @param Vertex $vertexOne
     * @param Vertex $vertexTwo
     * @param float $value
     * @return Edge
     */
    public function insertEdge(Vertex $vertexOne, Vertex $vertexTwo, float $value): Edge
    {
        /** @var Edge $a */
        $a = new Edge($vertexOne, $vertexTwo, $value);

        $ind1 = $this->findIndex($vertexOne->getKey());
        $ind2 = $this->findIndex($vertexTwo->getKey());

        $this->matrixAdjacent[$ind2][$ind1] = $a; // grafo nao orientado
        $this->matrixAdjacent[$ind1][$ind2] = $this->matrixAdjacent[$ind2][$ind1]; // grafo nao orientado

        return $a;

    }

    /**
     * @param int $key
     * @return int
     */
    private function findIndex(int $key) : int
    {

        /** @var CachingIterator $i */
        $i = new CachingIterator(new ArrayIterator($this->vertex), CachingIterator::FULL_CACHE);

        /** @var int $ind */
        $ind = 0;

        while ($i->hasNext()) {
            /** @var Vertex $v */
            $i->next();
            $v = $i->current();
            if ($v->getKey() == $key) { // achei
                return $ind;
            }

            $ind++;
        }

        return -1; // não achei
    }

    /**
     *  Remove a aresta
     *
     * @param Edge $edge
     * @return void
     */
    public function removeEdge(Edge $edge): void
    {
        // TODO: Implement removeEdge() method.
    }

    /**
     * @param Vertex $vertexOne
     * @param Vertex $vertexTwo
     * @param float $value
     * @return Edge
     */
    public function insertBow(Vertex $vertexOne, Vertex $vertexTwo, float $value): Edge
    {
        // TODO: Implement insertBow() method.
    }

    /**
     * @param Edge $edge
     * @return void
     */
    public function removeBow(Edge $edge): void
    {
        // TODO: Implement removeBow() method.
    }

    /**
     * Número de arestas incidentes do vértice
     *
     * @param Vertex $vertex
     * @return int
     */
    public function degree(Vertex $vertex): int
    {
        // TODO: Implement degree() method.
    }

    /**
     * Número de nós do grafo
     *
     * @return int
     */
    public function order(): int
    {
        return $this->quantityVertex;
    }

    /**
     *  Retorna uma coleção de todos os vértices no grafo.
     *
     * @return array
     */
    public function vertex(): array
    {
        return $this->vertex;
    }

    /**
     *  Retorna uma coleção de todas as arestas no grafo
     *
     * @return array
     */
    public function edge(): array
    {
        // TODO: Implement edge() method.
    }

    /**
     *  Retorna uma coleção de todas as arestas incidentes sob o vértice $vertex
     *
     * @param Vertex $vertex
     * @return array
     */
    public function edgesIncidents(Vertex $vertex): array
    {
        // TODO: Implement edgesIncidents() method.
    }

    /**
     *  Retorna um array armazenando os vértices finais da aresta $e.
     *
     * @param Edge $e
     * @return array
     */
    public function finalVertex(Edge $e): array
    {
        // TODO: Implement finalVertex() method.
    }

    /**
     *  Retorna o vértice oposto de $v em $e, ou seja,
     *  o vértice final da aresta e separado do vértice $v.
     *  Um erro ocorre se $e não é incidente a $v.
     *
     * @param Vertex $v
     * @param Edge $e
     * @return Vertex
     */
    public function opposite(Vertex $v, Edge $e): Vertex
    {
        // TODO: Implement opposite() method.
    }

    /**
     *  Retorna true se $v e $w são adjacentes
     *
     * @param Vertex $v
     * @param Vertex $w
     * @return bool
     */
    public function isAdjacent(Vertex $v, Vertex $w): bool
    {
        // TODO: Implement isAdjacent() method.
    }


    public function showMatrix(): void
    {
    /*  TODO saida amigável */
        print_r($this->matrixAdjacent);
//        for ($f = 0; $f < $this->quantityVertex; $f++) {
//            for ($g = 0; $g < $this->quantityVertex; $g++) {
//                print_r($this->matrixAdjacent[$f][$g] . " ");
//            }
//            print_r("...");
//        }
    }
}
