<?php
/**
 * Created by PhpStorm.
 * User: mobister
 * Date: 31/10/17
 * Time: 08:27
 */

namespace EDNL\TREE;

/**
 * Interface IVertex
 * @package EDNL\TREE
 *
 * @property int $key
 * @property float $value
 * @method  __constructor(int $key, double $value)
 *
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
