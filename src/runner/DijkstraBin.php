<?php

namespace EDNL\RUNNER;

use EDNL\DIJKSTRA\Dijkstra;
use Psr\Http\Message\ServerRequestInterface as Request;

class DijkstraBin
{
    public function binRelocationCities($source, $target)
    {
        print_r('Matrix de ligação das Cidades e seus custos' . PHP_EOL);
        print_r( PHP_EOL);
        $matrixCities = [
            [INF,INF,INF,5  ,INF,INF,INF,INF],
            [INF,INF,INF,4  ,INF,INF,INF,INF],
            [INF,INF,INF,INF,INF,INF,1  ,INF],
            [5  ,4  ,INF,INF,INF,6  ,INF,INF],
            [INF,INF,INF,INF,INF,INF,INF,INF],
            [INF,INF,INF,6  ,INF,INF,3  ,2  ],
            [INF,INF,1  ,INF,INF,3  ,INF,2  ],
            [INF,INF,INF,INF,INF,2  ,2  ,INF],
        ];

        $d = new Dijkstra($matrixCities);

        foreach ($matrixCities as $key => $row) {
            print_r('[ ' . $key . ' ] => ' . '[ ');
            foreach ($row as $key => $column) {
                if ($key != (count($row) - 1)) {
                    print_r(' ' . ($column === INF ? INF : ' ' . $column . ' ') . ' ,');
                } else {
                    print_r(' ' . ($column === INF ? INF : ' ' . $column . ' '));
                }
            }
            print_r(' ]' . PHP_EOL);
        }

        print_r( PHP_EOL);
        print_r('custo : saltos' . PHP_EOL);

        $d->shortestPath($source, $target);
    }

    public function binMaze($source, $target)
    {
        $trimmed = file(dirname(__DIR__) . '/runner/maze.dat', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $graphMatrix = array_map(function ($string) {
            $value = str_split($string);

            $v = array_map(function ($element) {
                $e = (int) $element;
                return $e == 1 ? INF : $e ;
            }, $value);

            return $v;
        }, $trimmed);

        $firstRow = current($graphMatrix);

        $countSrc = 0;
        $countTgt = 0;

        foreach ($firstRow as $key => $value) {
            $rowSrcK = array_search(2, array_column($graphMatrix, $key));
            $rowTgtK = array_search(3, array_column($graphMatrix, $key));

            if (is_int($rowSrcK)) {


                $positionSrc[$countSrc]['row'] = $rowSrcK;
                $positionSrc[$countSrc]['column'] = $key;

                $countSrc++;
            }

            if (is_int($rowTgtK)) {

                $positionTgt[$countTgt]['row'] = $rowTgtK;
                $positionTgt[$countTgt]['column'] = $key;

                $countTgt++;
            }
        }

        $d = new Dijkstra($graphMatrix);

        print_r('Menor caminho do labirinto' . PHP_EOL);

        print_r( PHP_EOL);

        foreach ($graphMatrix as $key => $row) {
            print_r('[ ' . $key . ' ] => ' . '[ ');
            foreach ($row as $key => $column) {
                if ($key != (count($row) - 1)) {
                    print_r(' ' . ($column === INF ? INF : ' ' . $column . ' ') . ' ,');
                } else {
                    print_r(' ' . ($column === INF ? INF : ' ' . $column . ' '));
                }
            }
            print_r(' ]' . PHP_EOL);
        }

        print_r( PHP_EOL);
        print_r('custo : saltos' . PHP_EOL);

        $d->shortestPath($source, $target);
    }

    public function binRelocationCitiesLinked()
    {
        $graph = array(
            'A' => array('B' => 3, 'D' => 3, 'F' => 6),
            'B' => array('A' => 3, 'D' => 1, 'E' => 3),
            'C' => array('E' => 2, 'F' => 3),
            'D' => array('A' => 3, 'B' => 1, 'E' => 1, 'F' => 2),
            'E' => array('B' => 3, 'C' => 2, 'D' => 1, 'F' => 5),
            'F' => array('A' => 6, 'C' => 3, 'D' => 2, 'E' => 5),
        );

        $d = new Dijkstra($graph);

        print_r('Lista ligada de  ligação das Cidades e seus custos' . PHP_EOL);

        print_r( PHP_EOL);

        foreach ($graph as $key => $row) {
            print_r('[ ' . $key . ' ] => ' . '[ ');
            foreach ($row as $key => $column) {
                if ($key != 'F') {
                    print_r(' ' . ($column === INF ? INF : ' ' . $column . ' ') . ' ,');
                } else {
                    print_r(' ' . ($column === INF ? INF : ' ' . $column . ' '));
                }
            }
            print_r(' ]' . PHP_EOL);
        }

        print_r( PHP_EOL);
        print_r('custo : saltos' . PHP_EOL);

        $d->shortestPath('D', 'C');
        $d->shortestPath('C', 'A');
        $d->shortestPath('B', 'F');
        $d->shortestPath('F', 'A');
        $d->shortestPath('A', 'G');
    }

    /**
     * Exibe no navegador
     *
     * @param Request $request
     */
    public function viewRelocationCities(Request $request)
    {
        $source = $request->getAttribute('source');
        $target = $request->getAttribute('target');
        echo '<pre>';
        echo $this->binRelocationCities($source, $target);
        echo '</pre>';
    }

    /**
     * Exibe no navegador
     *
     * @param Request $request
     */
    public function viewMaze(Request $request)
    {
        $source = $request->getAttribute('source');
        $target = $request->getAttribute('target');
        echo '<pre>';
        echo $this->binMaze($source, $target);
        echo '</pre>';
    }
    /**
     * Exibe no navegador
     *
     */
    public function viewRelocationCitiesLinked()
    {
        echo '<pre>';
        echo $this->binRelocationCitiesLinked();
        echo '</pre>';
    }
}
