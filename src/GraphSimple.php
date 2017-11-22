<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 02/11/17
 * Time: 12:22
 */

namespace EDNL\TREE;

class GraphSimple implements IGraphSimple
{
    /** @var int $quantityVertex */
    private $quantityVertex;

    /** @var array $vertex */
    private $vertex;

    /** @var Edge $matrixAdjacent[[]] */
    private $matrixAdjacent = [[]];

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
        // TODO: Implement insertVertex() method.
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

        /** @var Edge $tempMatrixAdj */
        $tempMatrixAdj[][] = [$this->quantityVertex][$this->quantityVertex];

        /** @var int $ff */
        $ff = 0;
        /** @var int $gg */
        $gg;

        for ($f = 0; $f < $this->quantityVertex + 1; $f++) {
            $gg = 0;
        }
    }


    /*
 16     public void removerVertice(Vertices Vertice){
 17         qtdVertices--;
 18         int índice=achaÍndice(Vertice.getChave());
 19         vertices.remove(índice);  // remove o vértice do vector
 20         // remove linhas e colunas da matriz de adjacência
 21         Arestas tempMatrizAdj[][]=new Arestas[qtdVertices][qtdVertices];
 22         int ff=0,gg;
 23         for(int f=0;f<qtdVertices+1;f++){
 24             gg=0;
 25             for(int g=0;g<qtdVertices+1;g++){
 26                 if(f!=índice && g!=índice){
 27                   tempMatrizAdj[ff][gg]= matrizAdj[f][g];
 28                   if(g!=índice)
 29                       gg++;
 30                 }
 31             }
 32             if(f!=índice)
 33                 ff++;
 34         }
 35         matrizAdj=tempMatrizAdj;
 36     }
*/

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
        // TODO: Implement insertEdge() method.
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
     * @param Vertex $vertex
     * @return int
     */
    public function degree(Vertex $vertex): int
    {
        // TODO: Implement degree() method.
    }

    /**
     * @return int
     */
    public function order(): int
    {
        // TODO: Implement order() method.
    }

    /**
     *  Retorna uma coleção de todos os vértices no grafo.
     *
     * @return array
     */
    public function vertex(): array
    {
        // TODO: Implement vertex() method.
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

    /**
     * @param int $getKey
     * @return int
     */
    private function findIndex(int $getKey) : int
    {
    }
}