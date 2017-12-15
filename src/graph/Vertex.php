<?php

namespace EDNL\GRAPH;

/**
 * @method  Vertex(int $key, double $value)
 */
class Vertex implements IVertex
{
    /**
     * @var  int $key
     */
    private $key;

    /**
     * @var  float $value
     */
    private $value;

    /**
     * Vertex constructor.
     *
     * @param $key
     * @param $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * output values
     *
     * @return string
     */
    public function __toString()
    {
        return 'key => ' . $this->key . ' |-> value => ' . $this->value;
    }

    /**
     * @return int $key
     */
    public function getKey(): int
    {
        return $this->key;
    }

    /**
     * @param int $key
     * @return void
     */
    public function setKey(int $key)
    {
        $this->key = $key;
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
}
