<?php

use PHPUnit\Framework\TestCase;
use Zhukov\QuadEquation;
use Zhukov\ZhukovException;

require __DIR__ . './../vendor/autoload.php';

class QuadEquationTest extends TestCase {
    /**
     * @dataProvider providerEquationTwo
     * @param $a
     * @param $b
     * @param $c
     * @param $res
     */
    public function TestEquationTwo($a, $b, $c, $res) {
        $fTest = new QuadEquation();
        $this->assertEquals($res, $fTest->equationTwo($a, $b, $c));
    }
    /**
     * @dataProvider providerEquationTwoZhukovException
     * @param $a
     * @param $b
     * @param $c
     * @param $res
     */
    public function testEquationTwoZhukovException($a, $b, $c, $res) {
        $this->expectException(ZhukovException::class);
        $fTest = new QuadEquation();
        $this->assertEquals($res, $fTest->equationTwo($a, $b, $c));
    }
    /**
     * @dataProvider providerEquationTwoTypeErrorException
     * @param $a
     * @param $b
     * @param $c
     * @param $res
     */
    public function testEquationTwoTypeErrorException($a, $b, $c, $res) {
        $this->expectException(TypeError::class);
        $fTest = new QuadEquation();
        $this->assertEquals($res, $fTest->equationTwo($a, $b, $c));
    }

    public function providerEquationTwo (): array
    {
        return array (
            array (15, 9, 0,[0.0 ,-0.6]),
            array (1, 6, -40,[ 4.0,-10.0]),
            array (0, 1, 1,[-1]),
            array (0, 1, 2, [-2.0]),
            array (false, true, 1==0, [0]),
        );
    }
    public function providerEquationTwoZhukovException (): array
    {
        return array (
            array (0, 0, 0, 0),
            array (4, 2, 1, 0),
            array (true, true, true, [0]),
            array (false, false, false, [0]),
            array (true, false, true, [0]),
        );
    }
    public function providerEquationTwoTypeErrorException(): array
    {
        return array (
            array ('a', 'b', 'c', 0),
            array (null, null, null, 0)
        );
    }
}
?>