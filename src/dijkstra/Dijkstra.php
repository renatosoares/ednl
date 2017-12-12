<?php

namespace EDNL\DIJKSTRA;

use SplPriorityQueue;
use SplStack;

class Dijkstra
{
    protected $graph;

    public function __construct($graph) {
        $this->graph = $graph;
    }

    public function shortestPath($source, $target) {
        // array das melhores estimativas do caminho mais curto para cada
        // vértice
        $d = array();
        // array de antecessores para cada vértice
        $pi = array();
        // fila de todos os vértices não optimizados
        $Q = new SplPriorityQueue();

        foreach ($this->graph as $v => $adj) {
            $d[$v] = INF; // definir a distância inicial para "infinito"
            $pi[$v] = null; // antecessores não é conhecido ainda
            foreach ($adj as $w => $cost) {
                // use o custo da aresta como prioridade
                $Q->insert($w, $cost);
            }
        }

        // A distância inicial na origem é 0
        $d[$source] = 0;

        while (!$Q->isEmpty()) {
            // extraia o custo mínimo
            $u = $Q->extract();
            if (!empty($this->graph[$u])) {
                // "relaxar" cada vértice adjacente
                foreach ($this->graph[$u] as $v => $cost) {
                    // comprimento de rota alternativo para vizinho adjacente
                    $alt = $d[$u] + $cost;
                    // se a rota alternativa for mais curta
                    if ($alt < $d[$v]) {
                        $d[$v] = $alt; // atualiza o comprimento mínimo para o vértice
                        $pi[$v] = $u;  // adicionar vizinho aos anteriores
                        //  para o vértice
                    }
                }
            }
        }

        // agora podemos encontrar o caminho mais curto usando reverso
        // iteração
        $S = new SplStack(); // caminho mais curto com uma pilha
        $u = $target;
        $dist = 0;
        // atravessar de destino para origem
        while (isset($pi[$u]) && $pi[$u]) {
            $S->push($u);
            $dist += $this->graph[$u][$pi[$u]]; // adicionar distância ao antecessor
            $u = $pi[$u];
        }

        // A pilha estará vazia se não houver nenhuma rota de volta
        if ($S->isEmpty()) {
            echo "No route from $source to $target";
        }
        else {
            // adicione o nó de origem e imprima o caminho no sentido inverso
            // (LIFO) order
            $S->push($source);
            echo "$dist:";
            $sep = '';
            foreach ($S as $v) {
                echo $sep, $v;
                $sep = '->';
            }
            echo "\n";
        }
    }
}
