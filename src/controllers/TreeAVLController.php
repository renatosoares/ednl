<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 11/03/18
 * Time: 14:08
 */

namespace EDNL\CONTROLLERS;

use EDNL\TREE\AVLTree;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Http\Cookies;
use Slim\Http\Response;

class TreeAVLController
{

    /**
     * TreeAVLBin constructor.
     * @param $container
     */
    public function __construct($container) {
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public function insert(Request $request, Response $response, $args)
    {
        if (isset($_COOKIE['value_node'])) {
            $args['params'] = $_COOKIE['value_node'];
        } else {
            setcookie('value_node', $args['params'], time()+3600, '/', 'ednl.d3v');
        }

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
        if (isset($_COOKIE['value_node'])) {
            $nodes['keys'] = $_COOKIE['value_node'];
        } else {
            var_dump('insira chaves para os nós'); die();
        }

        $delete_nodes = explode('/', $args['params']);
        $insert_nodes = explode('/', $nodes['keys']);

        $treeAvl = $this->insertAvl($insert_nodes);

        echo '<pre>';
        $treeAvl->printTree();
        echo '</pre>';

        print PHP_EOL;
        print '-------------------------------';
        print PHP_EOL;

        print $delete_nodes;

        print PHP_EOL;
        print '-------------------------------';
        print PHP_EOL;

        foreach ($delete_nodes as $delete_node) {
            $treeAvl->delete((int) $delete_node);
        }

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
