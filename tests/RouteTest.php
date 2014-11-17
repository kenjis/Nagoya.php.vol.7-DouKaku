<?php
/**
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    BSD License
 * @copyright  2014 Kenji Suzuki
 * @link       https://github.com/kenjis/Nagoya.php.vol7-DouKaku
 */

namespace Nagoyaphp\Doukaku;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    protected $route;

    protected function setUp()
    {
        $this->route = new Route;
    }
    
    /**
     * @dataProvider provideData
     */
    public function test_getRoutes($startPoint, $removePoints, $routes)
    {
        $this->route->removePoints($removePoints);
        $test = $this->route->getRoutes($startPoint);
        $this->assertEquals($routes, $test);
    }
    
    public function provideData()
    {
        return [
            ['1', ['b', 'e', 'f', 'i'], ['4','6']],
            ['2', ['b', 'e', 'f', 'i'], ['4','6']],
            ['3', ['b', 'e', 'f', 'i'], []],
            ['1', ['a', 'b', 'c'], ['4', '5', '6']],
            ['2', ['a', 'b', 'c'], ['4', '5', '6']],
            ['3', ['a', 'b', 'c'], ['4', '5', '6']],
        ];
    }
}
