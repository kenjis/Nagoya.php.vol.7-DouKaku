<?php
/**
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    BSD License
 * @copyright  2014 Kenji Suzuki
 * @link       https://github.com/kenjis/Nagoya.php.vol.7-DouKaku
 */

namespace Nagoyaphp\Doukaku;

class AppTest extends \PHPUnit_Framework_TestCase
{
    protected $app;

    protected function setUp()
    {
        $this->app = new App;
    }
    
    /**
     * @dataProvider provideData
     */
    public function test_run($input, $output)
    {
        $test = $this->app->run($input);
        $this->assertEquals($output, $test);
    }
    
    public function provideData()
    {
        return [
            // input, output
            /*0*/ array( "befi", "14,16,24,26" ),
            /*1*/ array( "abc", "14,15,16,24,25,26,34,35,36" ),
            /*2*/ array( "de", "14,15,16,24,26,34,35,36" ),
            /*3*/ array( "fghi", "14,15,16,24,25,26,34,35,36" ),
            /*4*/ array( "abcdefghi", "-" ),
            /*5*/ array( "ag", "24,25,26,34,35,36" ),
            /*6*/ array( "dh", "14,15,16,34,35,36" ),
            /*7*/ array( "bf", "14,15,16,24,25,26" ),
            /*8*/ array( "ch", "15,25,35" ),
            /*9*/ array( "be", "14,16,24,26,34,36" ),
            /*10*/ array( "ci", "14,15,24,25,34,35" ),
            /*11*/ array( "cgi", "15,24,25,35" ),
            /*12*/ array( "acgi", "24,25,35" ),
            /*13*/ array( "cdefghi", "15,35" ),
            /*14*/ array( "acdefghi", "35" ),
            /*15*/ array( "cdegi", "15,24,35" ),
            /*16*/ array( "bcdegi", "24" ),
            /*17*/ array( "afh", "14,15,16,24,25,26,34,35,36" ),
            /*18*/ array( "abfh", "14,15,16,24,25,26" ),
            /*19*/ array( "dfh", "14,15,16,34,35,36" ),
            /*20*/ array( "cdfh", "15,35" ),
            /*21*/ array( "deh", "14,15,16,34,35,36" ),
            /*22*/ array( "cdeh", "15,35" ),
            /*23*/ array( "abefgh", "24,26" ),
            /*24*/ array( "abdefgh", "-" ),
            /*25*/ array( "acfghi", "25,35" ),
            /*26*/ array( "acdfghi", "35" ),
            /*27*/ array( "cegi", "15,24,35" ),
            /*28*/ array( "abcfhi", "15,25" ),
            /*29*/ array( "abcefhi", "-" ),
            /*30*/ array( "abdi", "14,15,16,24,34,35,36" ),
            /*31*/ array( "abdfi", "14,15,16,24" ),
            /*32*/ array( "bdi", "14,15,16,24,34,35,36" ),
            /*33*/ array( "bdfi", "14,15,16,24" ),
            /*34*/ array( "adfh", "14,15,16,34,35,36" ),
            /*35*/ array( "adfgh", "34,35,36" ),
            /*36*/ array( "acdfhi", "15,35" ),
            /*37*/ array( "bcdfgi", "24" ),
            /*38*/ array( "bcdfghi", "-" ),
            /*39*/ array( "defi", "14,15,16,24,34,35,36" ),
            /*40*/ array( "defhi", "14,15,16,34,35,36" ),
            /*41*/ array( "cdefg", "15,24,26,35" ),
            /*42*/ array( "cdefgi", "15,24,35" ),
            /*43*/ array( "bdefg", "24,26" ),
            /*44*/ array( "bdefgi", "24" ),
            ];
    }
}
