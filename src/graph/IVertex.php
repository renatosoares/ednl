<?php

namespace EDNL\GRAPH;

/**
 * Interface IVertex
 *
 * @package  EDNL\TREE
 * @property int $key
 * @property float $value
 * @method Vertex(int $key, double $value)
 */

interface IVertex
{
    /**
     * @return int
     */
    public function getKey() : int;

    /**
     * @param int $key
     * @return void
     */
    public function setKey(int $key);

    /**
     * @return float
     */
    public function getValue() : float;

    /**
     * @param float $value
     * @return void
     */
    public function setValue(float $value);
}
