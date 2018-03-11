<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 11/03/18
 * Time: 14:08
 */

namespace EDNL\RUNNER;

use EDNL\TREE\AVLTree;
use Psr\Http\Message\ServerRequestInterface as Request;

class TreeAVLBin
{
    /**
     * @param Request $request
     * @param $response
     * @param $args
     */
    public function insert(Request $request, $response, $args)
    {
        $params = explode('/', $args['params']);
        $treeAvl = $this->insertAvl($params);
        
        echo '<pre>';
        $treeAvl->printTree();
        echo '</pre>';
    }


    /**
     * @param Request $request
     * @param $response
     * @param $args
     */
    public function delete(Request $request, $response, $args)
    {
        $params = explode('/', $args['params']);

        $deleteValue = array_pop($params);

        $treeAvl = $this->insertAvl($params);

        echo '<pre>';
        $treeAvl->printTree();
        echo '</pre>';

        print PHP_EOL;
        print '-------------------------------';
        print PHP_EOL;

        print $deleteValue;

        print PHP_EOL;
        print '-------------------------------';
        print PHP_EOL;

        $treeAvl->delete((int) $deleteValue);

        echo '<pre>';
        $treeAvl->printTree();
        echo '</pre>';

    }

    /**
     * @param $params
     * @return AVLTree
     */
    private function insertAvl($params)
    {
        $treeAvl = new AVLTree();

        foreach ($params as $param) {

            $treeAvl->insert($param);
        }

        return $treeAvl;
    }

}
