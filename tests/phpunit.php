<?php
require_once __DIR__ . "/../vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class Math
{
    public function multiplicate($x, $y)
    {
        return $x * $y;
    }
}

class XController {
    public function get($id)
    {
        return ['id' => $id, 'name' => 'asdasd'];
    }
}

final class MathTest extends TestCase
{
    public function testXController()
    {
        $controller = new XController();
        $result = $controller->get(1); //feature
        $this->assertArrayHasKey('name', $result);
        $this->assertTrue($result['id'] == 1);
    }

    public function testMultiplicate()
    {
        $result = 4;
        $x = 2;
        $y = 2;
        $math = new Math();
        $res = $math->multiplicate($x, $y);
        $this->assertTrue($result == $res, "$result !== $res");

        $result = 10;
        $x = 5;
        $y = 2;
        $math = new Math();
        $res = $math->multiplicate($x, $y);
        $this->assertTrue($result == $res, "$result !== $res");

        $result = 10;
        $x = 10;
        $y = 12;
        $math = new Math();
        $res = $math->multiplicate($x, $y);
        $this->assertFalse($result == $res);
        $this->assertNotEquals($result, $res);
    }
}