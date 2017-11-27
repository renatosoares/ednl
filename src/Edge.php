<?php

namespace EDNL\GRAPH;

/**
 * @property Vertex $vertexOrigin
 * @property Vertex $vertexDestination
 * @property float $value
 * @property bool $directed
 * @method  Edge(Vertex $vertexOrigin, Vertex $vertexDestination, float $value, bool $directed)
 */
class Edge implements IEdge
{
    private $vertexOrigin;
    private $vertexDestination;
    private $value;
    private $directed;
    /**
     * Edge constructor.
     * @param Vertex $vertexOrigin
     * @param Vertex $vertexDestination
     * @param float $value
     * @param bool $directed
     */
    public function __construct(Vertex $vertexOrigin, Vertex $vertexDestination, float $value = 0.0 , bool $directed = true)
    {
        $this->vertexOrigin = $vertexOrigin;
        $this->vertexDestination = $vertexDestination;
        $this->value = $value;
        $this->directed = $directed;
    }

    /**
     * @return Vertex
     *
     */
    public function getVertexOrigin(): Vertex
    {
        return $this->vertexOrigin;
    }

    /**
     * @param Vertex $vertexOrigin
     * @return void
     */
    public function setVertexOrigin(Vertex $vertexOrigin)
    {
        $this->vertexOrigin = $vertexOrigin;
    }

    /**
     * @return Vertex
     */
    public function getVertexDestination(): Vertex
    {
        return $this->vertexDestination;
    }

    /**
     * @param Vertex $vertexDestination
     * @return void
     */
    public function setVertexDestination(Vertex $vertexDestination)
    {
        $this->vertexDestination = $vertexDestination;
    }

    /**
     * @return float $value
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return void
     */
    public function setValue(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return bool $directed
     */
    public function isDirected(): bool
    {
        return $this->directed;
    }

    /**
     * @param bool $directed
     * @return void
     */
    public function setDirected(bool $directed)
    {
        $this->directed = $directed;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '[' . (string) $this->vertexOrigin . '-' . (string) $this->vertexDestination . ':' . $this->value . ']';
//        return '[' . $this->value . ']';
    }
}
