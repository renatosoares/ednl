<?php

namespace EDNL\TREE;

/**
 * O nó da árvore AVL possui propriedades adicionais de altura e equilíbrio.
 * Se o equilíbrio for igual a 2 (ou -2), esse nó precisa ser equilibrado.
 * (A altura é a altura da subárvore começando com este nó e o equilíbrio
 * é diferença entre as alturas dos nós esquerdo e direito).
 */

class AVLNode extends Node
{
    /** @var static AVLNode $height */
    public $height;

    /**
     * @inheritdoc
     * @param int $value
     * @param Node $parent
     * @param Node $left
     * @param Node $right
     */
    public function __construct(int $value, $parent, $left, $right)
    {
        parent::__construct($value, $parent, $left, $right);
    }
}
