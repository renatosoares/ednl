<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 31/10/17
 * Time: 13:30
 */

namespace EDNL\TREE;


/**
 * Interface IGraphSimple
 * @package EDNL\TREE
 *
 * @property int $quantityVertex
 * @property Vertex $vertex;
 * @property Edge $matrixAdjacent
 *
 */
interface IGraphSimple
{
    /**
     *  Insere e retorna um novo vértice armazenando o elemento $vertex
     * @param Vertex $vertex
     * @return void
     */
    public function insertVertex(Vertex $vertex) : void;

    /**
     *  Remove o vértice $vertex ( e todas as arestas incidentes)
     *
     * @param Vertex $vertex
     * @return void
     */
    public function removeVertex(Vertex $vertex) : void;

    /**
     *  Insere e retorna uma nova aresta não-dirigida (v1,v2) armazenando o elemento $value
     *
     * @param Vertex $vertexOne
     * @param Vertex $vertexTwo
     * @param float $value
     * @return Edge
     */
    public function insertEdge(Vertex $vertexOne, Vertex $vertexTwo, float $value) : Edge;

    /**
     *  Remove a aresta
     *
     * @param Edge $edge
     * @return void
     */
    public function removeEdge(Edge $edge) : void;

    /**
     * @param Vertex $vertexOne
     * @param Vertex $vertexTwo
     * @param float $value
     * @return Edge
     */
    public function insertBow(Vertex $vertexOne, Vertex $vertexTwo, float $value) : Edge;

    /**
     * @param Edge $edge
     * @return void
     */
    public function removeBow(Edge $edge) : void;

    /**
     * @param Vertex $vertex
     * @return int
     */
    public function degree(Vertex $vertex) : int;

    /**
     * @return int
     */
    public function order() : int;

    /**
     *  Retorna uma coleção de todos os vértices no grafo.
     *
     * @return array
     */
    public function vertex() : array;

    /**
     *  Retorna uma coleção de todas as arestas no grafo
     *
     * @return array
     */
    public function edge() : array;

    /**
     *  Retorna uma coleção de todas as arestas incidentes sob o vértice $vertex
     *
     * @param Vertex $vertex
     * @return array
     */
    public function edgesIncidents(Vertex $vertex) : array;

    /**
     *  Retorna um array armazenando os vértices finais da aresta $e.
     *
     * @param Edge $e
     * @return array
     */
    public function finalVertex(Edge $e) : array;

    /**
     *  Retorna o vértice oposto de $v em $e, ou seja,
     *  o vértice final da aresta e separado do vértice $v.
     *  Um erro ocorre se $e não é incidente a $v.
     *
     * @param Vertex $v
     * @param Edge $e
     * @return Vertex
     */
    public function opposite(Vertex $v, Edge $e) : Vertex;

    /**
     *  Retorna true se $v e $w são adjacentes
     *
     * @param Vertex $v
     * @param Vertex $w
     * @return bool
     */
    public function isAdjacent(Vertex $v, Vertex $w) : bool;
}
