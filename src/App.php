<?php
/**
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    BSD License
 * @copyright  2014 Kenji Suzuki
 * @link       https://github.com/kenjis/Nagoya.php.vol7-DouKaku
 */

namespace Nagoyaphp\Doukaku;

class App
{
    /**
     * @param string $input
     * @return string
     */
    public function run($input)
    {
        $blockedPoints = $this->parseInput($input);
        
        $router = new Route();
        $router->removePoints($blockedPoints);
        
        $routes['1'] = $router->getRoutes('1');
        $routes['2'] = $router->getRoutes('2');
        $routes['3'] = $router->getRoutes('3');
        
        return $this->output($routes);
    }

    /**
     * @param string $input
     * @return array
     */
    public function parseInput($input)
    {
        $blockedPoints = str_split($input);
        return $blockedPoints;
    }

    /**
     * @param array $routes
     * @return string
     */
    public function output($routes)
    {
        $output = '';

        foreach ($routes as $start => $ends) {
            foreach ($ends as $end) {
                $output .= $start . $end . ',';
            }
        }

        if ($output === '') {
            $output = '-';
        }
        
        return rtrim($output, ',');
    }
}
