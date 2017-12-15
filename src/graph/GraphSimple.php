<?php

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
     * Acha um vértice por sua chave
     *
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
    public function removeEdge(Edge $edge): void // FIXME missing test
    {
        /** @var int $ind1 */
        $ind1 = $this->findIndex($edge->getVertexOrigin()->getKey());
        /** @var int $ind2 */
        $ind2 = $this->findIndex($edge->getVertexDestination()->getKey());

        $this->matrixAdjacent[$ind1][$ind2] = $this->matrixAdjacent[$ind2][$ind1] = null;
    }

    /**
     * @param Vertex $vertexOne
     * @param Vertex $vertexTwo
     * @param float $value
     * @return Edge
     */
    public function insertBow(Vertex $vertexOne, Vertex $vertexTwo, float $value = 0.0): Edge // FIXME missing test
    {
        /** @var Edge $a */
        $a = new Edge($vertexOne, $vertexTwo, $value, true);

        /** @var int $ind1 */
        $ind1 = $this->findIndex($vertexOne->getKey());
        /** @var int $ind2 */
        $ind2 = $this->findIndex($vertexTwo->getKey());

        $this->matrixAdjacent[$ind1][$ind2] = $a;

        return $a;
    }

    /**
     * @param Edge $edge
     * @return void
     */
    public function removeBow(Edge $edge): void // FIXME missing test
    {
        // TODO: Implement removeBow() method.
    }

    /**
     *
     */
    public function showVertex(): void // FIXME missing test
    {
        for ($f = 0; $f < count($this->vertex); $f++) {
            print_r($this->vertex[$f] . ',' . PHP_EOL);
        }
        print_r(PHP_EOL);
    }

    /**
     *
     */
    public function showMatrix(): void // FIXME missing test
    {
        for ($f = 0; $f < $this->quantityVertex; $f++) {
            for ($g = 0; $g < $this->quantityVertex; $g++) {
                print_r( '[' . $f . '] => ' . '[' . $g . ']' . $this->matrixAdjacent[$f][$g] . PHP_EOL);
            }
            print_r('.....................................................' . PHP_EOL);
        }
        print_r(PHP_EOL);
        print_r('######################################################' . PHP_EOL);
        print_r(PHP_EOL);
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
     * @return array|ArrayIterator
     */
    public function edge(): ArrayIterator // FIXME missing test
    {
        $v = new ArrayIterator();

        for ($l = 0; $l < $this->quantityVertex; $l++) {
            for ($c = 0; $c < $this->quantityVertex; $c++) {
                $v->append($this->matrixAdjacent[$l][$c]);
            }
        }

        return $v;

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
     * @return ArrayIterator
     */
    public function finalVertex(Edge $e): ArrayIterator // FIXME missing test
    {
        $v = new ArrayIterator();

        $v->append($e->getVertexOrigin());
        $v->append($e->getVertexDestination());

        return $v;
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
    public function isAdjacent(Vertex $v, Vertex $w): bool // FIXME missing test
    {
        /** @var int $ind1 */
        $ind1 = $this->findIndex($v->getKey());
        /** @var int $ind2 */
        $ind2 = $this->findIndex($v->getKey());

        return ($this->matrixAdjacent[$ind1][$ind2]) != null;
    }

}
