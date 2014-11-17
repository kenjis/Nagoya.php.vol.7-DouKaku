<?php

namespace Nagoyaphp\Doukaku;

class Route
{
    private $routes = [
        '1' => ['a', 'g'],
        'a' => ['b'],
        'b' => ['c', '5'],
        'c' => ['4', '6'],
        '2' => ['d', 'h'],
        'd' => ['c', 'e'],
        'e' => ['5'],
        '3' => ['b', 'f'],
        'f' => ['g'],
        'g' => ['c', 'e', 'h'],
        'h' => ['4', 'i'],
        'i' => ['6'],
        
    ];

    private function getNext($point)
    {
        if (isset($this->routes[$point])) {
            return $this->routes[$point];
        }
        
        return [];
    }

    private function isEnd($point)
    {
        if ($point === '4') {
            return true;
        }
        if ($point === '5') {
            return true;
        }
        if ($point === '6') {
            return true;
        }
        
        return false;
    }
    
    /**
     * @param string $start
     * @return array
     */
    public function getRoutes($start)
    {
        $routes = $this->getNext($start);
        
        $okRoutes = [];
        foreach ($routes as $route) {
            //            echo $route . PHP_EOL;
            if ($this->isEnd($route)) {
                $okRoutes[] = $route;
            } else {
                $okRoutes = array_merge($okRoutes, $this->getRoutes($route));
            }
        }

        $okRoutes = array_unique($okRoutes);
        sort($okRoutes, SORT_STRING);
        return $okRoutes;
    }

    /**
     * @param array $points
     */
    public function removePoints($points)
    {
        foreach ($points as $point) {
            $this->removePoint($point);
        }
//        var_dump($this->routes);
    }

    private function removePoint($removePoint)
    {
        $newRoutes = [];
        
        foreach ($this->routes as $key => $val) {
            if ($key === $removePoint) {
                continue;
            }
            
            foreach ($val as $point) {
                if ($point === $removePoint) {
                    // remove
                } else {
                    $newRoutes[$key][] = $point;
                }
            }
        }
        
        $this->routes = $newRoutes;
    }
}
