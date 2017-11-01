<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 31/10/17
 * Time: 08:36
 */

namespace EDNL\TREE;

/**
 * Interface IEdge
 * @package EDNL\TREE
 *
 * @property Vertex $vertexOrigin
 * @property Vertex $vertexDestination
 * @property float $value
 * @property bool $directed
 * @method  __constructor(Vertex $vertexOrigin, Vertex $vertexDestination, float $value, bool $directed)
 *
 */

interface IEdge
{
    /**
     * @return Vertex
     *
     */
    public function getVertexOrigin() : Vertex;

    /**
     * @param Vertex $vertexOrigin
     * @return void
     */
    public function setVertexOrigin(Vertex $vertexOrigin);

    /**
     * @return Vertex
     */
    public function getVertexDestination() : Vertex;

    /**
     * @param Vertex $vertexDestination
     * @return void
     */
    public function setVertexDestination(Vertex $vertexDestination);

    /**
     * @return float $value
     */
    public function getValue() : float;

    /**
     * @param float $value
     * @return void
     */
    public function setValue(float $value);

    /**
     *  Testa se a aresta é direcionada
     *
     * @return bool $directed
     */
    public function isDirected() : bool;

    /**
     * @param bool $directed
     * @return void
     */
    public function setDirected(bool $directed);



}
