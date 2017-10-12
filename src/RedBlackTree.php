<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 07/10/17
 * Time: 09:44
 */

namespace EDNL\TREE;


class RedBlackTree extends AbstractSelfBalancingBinarySearchTree
{

    protected $ColorEnum = [
        'RED' => 'red',
        'BLACK' => 'black',
    ];

    /** @var RedBlackNode $nilNode  */
    protected static $nilNode = null;

    /**
     * @inheritdoc
     * @param int $element
     * @return Node
     */
    public function insert(int $element): Node
    {
        /** @var Node $newNode */
        $newNode = parent::insert($element);
        $newNode::$left = self::$nilNode;
        $newNode::$right = self::$nilNode;
        /** @var RedBlackNode $parent */
        $this->root::$parent = self::$nilNode;
        $this->insertRBFixup($newNode);
        return $newNode;
    }

    /**
     * Rotina de exclusão ligeiramente modificada para a árvore rubro negra
     *
     * @inheritdoc
     * @param Node $deleteNode
     * @return Node
     */
    protected function deleteProtected(Node $deleteNode) : Node
    {
        /** @var Node $replaceNode */
        $replaceNode = null; // Nó de trilha que substitui removeOrMovedNode

        /*TODO*/

        return $replaceNode;
    }

    /**
     *
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     * @return Node
     */
    protected function createNode(int $value, Node $parent, Node $left, Node $right): Node
    {
        return new RedBlackNode($value, $parent, $left, $right, $this->ColorEnum['RED']);
    }

    /**
     * {@inheritDoc}
     */
    protected function getMinimumProtected(Node $node) : Node
    {
        parent::getMinimumProtected($node);
        /*TODO*/
    }

    /**
     * {@inheritDoc}
     */
    protected function getMaximumProtected(Node $node): Node
    {
        parent::getMaximumProtected($node);
    }

    /**
     * {@inheritdoc}
     *
     * @param Node $node
     * @return Node
     */
    protected function rotateLeft(Node $node): Node
    {
        /** @var Node $temp */
        $temp = $node::$right;
        return $temp;
    }

    /**
     * {@inheritdoc}
     *
     * @param Node $node
     * @return Node
     */
    protected function rotateRight(Node $node) : Node
    {
        /*TODO*/
    }

    /**
     * Semelhante ao método original de transplant() no BST, mas usa nilNode em vez de null.
     *
     * @param Node $nodeToReplace
     * @param Node $newNode
     * @return Node
     */
    private function rbTreeTransplant(Node $nodeToReplace, Node $newNode) : Node
    {
        /*TODO */
    }

    /**
     * Restaura as propriedades da árvore rubro negra depois de excluir, se necessário.
     *
     * @param RedBlackNode $x
     * @return void
     */
    private function deleteRBFixup(RedBlackNode $x)
    {
        /*TODO*/
    }

    /**
     * @param Node $node
     * @return bool
     */
    private function isBlack(Node $node) : bool
    {
        /*TODO*/
    }

    /**
     * @param Node $node
     * @return bool
     */
    private function isRed(Node $node) : bool
    {
        /*TODO*/
    }

    /**
     * Restaura as propriedades da árvore rubro negra após a inserção,
     * se necessário. Inserir pode quebrar apenas 2 propriedades:
     * a raiz é vermelha ou se o nó está vermelho, os filhos devem ser pretas.
     *
     * @param RedBlackNode $currentNode
     * @return void
     */
    private function insertRBFixup(RedBlackNode $currentNode)
    {
        // O nó atual é sempre VERMELHO, então se o pai é vermelho ele para
        // propriedade rubro negra, caso contrário, não é necessária nenhuma
        // correcção e o loop pode terminar
        /** @var RedBlackNode $parent */
        /** @var RedBlackNode $color */
        while ($currentNode::$parent != $this->root && $currentNode::$parent::$color == $this->ColorEnum['RED']) {
            /** @var RedBlackNode $parent */
            $parent = $currentNode::$parent;
            /** @var RedBlackNode $grandParent */
            $grandParent = (object) $parent::$parent;

            if ($parent == $grandParent::$left) {
                /** @var RedBlackNode $uncle */
                /** @var RedBlackNode $right */
                $uncle = $grandParent::$right;
                // case1 - tio e pai são ambos vermelhos
                // recolore ambos para preto
                if ($uncle::$color == $this->ColorEnum['RED']) {
                    $parent::$color = $this->ColorEnum['BLACK'];
                    $uncle::$color = $this->ColorEnum['BLACK'];
                    $grandParent::$color = $this->ColorEnum['RED'];
                    // avô foi colorido para vermelho, então, na próxima iteração,
                    // verificamos se não quebra a propriedade rubro negra
                    $currentNode = $grandParent;
                } else { // caso 2/3 tio é negro -
                    if ($currentNode == $parent::$right) {
                        $currentNode = $parent;
                        $this->rotateLeft($currentNode);
                    }
                    // não use $parent
                    $parent::$color = $this->ColorEnum['BLACK']; // caso 3
                    $grandParent::$color = $this->ColorEnum['RED'];
                    $this->rotateRight($grandParent);
                }
            } elseif ($parent == $grandParent::$right) {
                /** @var RedBlackNode $uncle */
                /** @var RedBlackNode $left */
                $uncle = $grandParent::$left;
                // case1 - tio e pai são ambos vermelhos colorem ambos para preto
                if ($uncle::$color == $this->ColorEnum['RED']) {
                    $parent::$color = $this->ColorEnum['BLACK'];
                    $uncle::$color = $this->ColorEnum['BLACK'];
                    $grandParent::$color = $this->ColorEnum['RED'];
                    // o avô foi recolorido para vermelho, então na próxima
                    // iteração verificamos se não quebra a propriedade rubro negra
                    $currentNode = $grandParent;
                } else { // caso 2/3 tio é negro - então realizamos rotações
                    if ($currentNode == $parent::$left) { // case 2, primeiro rotacione para direita
                        $currentNode = $parent;
                        $this->rotateRight($currentNode);
                    }
                    // não use $parent
                    $parent::$color = $this->ColorEnum['BLACK']; // caso 3
                    $grandParent::$color = $this->ColorEnum['RED'];
                    $this->rotateLeft($grandParent);
                }
            }
        }
        // Certifique-se de que a raiz é preta no caso de ter vermelho colorido na correção.
        $this->root::$color = $this->ColorEnum['BLACK'];
    }

}
