<?php


namespace Mpwar\Unit\BerlinHour;


use Mpwar\BerlinHour\Transformer;

final class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldBeOdd()
    {
        $timeArray = [
            'seconds' => '0',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('05:32:58');

        $this->assertEquals($timeArray["seconds"], $result["seconds"], "the lamp is off when second is odd");
    }

    /** @test */
    public function shouldBeEven()
    {
        $timeArray = [
            'seconds' => '1',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('05:32:59');

        $this->assertEquals($timeArray["seconds"], $result["seconds"], "the lamp is off when second is even");
    }

    /** @test */
    public function shouldHaveThreeHoursOfValueFiveLampOn()
    {
        $timeArray = [
            'hours_5x' => '1110',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('19:00:00');

        $this->assertEquals($timeArray["hours_5x"], $result["hours_5x"], "the lamp is off when second is even");
    }

    /** @test */
    public function shouldHaveAllHoursOfValueFiveLampOn()
    {
        $timeArray = [
            'hours_5x' => '1111',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('20:00:00');

        $this->assertEquals($timeArray["hours_5x"], $result["hours_5x"], "the lamp is off when second is even");
    }

    /** @test */
    public function shouldHaveNoneHoursOfValueFiveLampOn()
    {
        $timeArray = [
            'hours_5x' => '0000',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('00:00:00');

        $this->assertEquals($timeArray["hours_5x"], $result["hours_5x"], "the lamp is off when second is even");
    }
}