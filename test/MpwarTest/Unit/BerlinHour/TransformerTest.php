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
    public function shouldHaveThreeLampsOfFirstRowOn()
    {
        $timeArray = [
            'hours_5x' => '1110',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('19:00:00');

        $this->assertEquals($timeArray["hours_5x"], $result["hours_5x"], "Three lights should be on, when computing the value 19 for the hours");
    }

    /** @test */
    public function shouldHaveAllTheLampsOfTheFrstRowOn()
    {
        $timeArray = [
            'hours_5x' => '1111',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('20:00:00');

        $this->assertEquals($timeArray["hours_5x"], $result["hours_5x"], "All of the lamps of the first row should be on when the time is 20 or plus");
    }

    /** @test */
    public function shouldHaveAllTheLampsOfTheFirstRowOff()
    {
        $timeArray = [
            'hours_5x' => '0000',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('00:00:00');

        $this->assertEquals($timeArray["hours_5x"], $result["hours_5x"], "All of the lights of the first row should go off when the time is 00 ");
    }

    /** @test */
    public function shouldHaveTwoLampsOfTheSecondRowOn()
    {
        $timeArray = [
            'hours_1x' => '1100',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('17:00:00');

        $this->assertEquals($timeArray["hours_1x"], $result["hours_1x"], "Two of the lamps of the second row should be on when the time is 17");
    }

    /** @test */
    public function shouldHaveAllOfTheLampsOfTheSecondRowOn()
    {
        $timeArray = [
            'hours_1x' => '1111',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('24:00:00');

        $this->assertEquals($timeArray["hours_1x"], $result["hours_1x"], "All of the lamps of the second row should be on when the time is 24");
    }

    /** @test */
    public function shouldHaveAllOfTheLAmpsOfTheSecondRowOff()
    {
        $timeArray = [
            'hours_1x' => '0000',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('00:00:00');

        $this->assertEquals($timeArray["hours_1x"], $result["hours_1x"], "All of the lamps of the second row should be off when the time is 00");
    }


    /** @test */
    public function shouldHaveFiveLampsOfTheThirdRowOn()
    {
        $timeArray = [
            'minutes_5x' => '11111000000',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('19:25:00');

        $this->assertEquals($timeArray["minutes_5x"], $result["minutes_5x"], "Five lamps of the third row should be on when the minutes are 25");
    }

    /** @test */
    public function shouldHaveAllOfTheLampsOfTheThirdRowOn()
    {
        $timeArray = [
            'minutes_5x' => '11111111111',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('20:57:00');

        $this->assertEquals($timeArray["minutes_5x"], $result["minutes_5x"], "All of the lamps of the third row should go on when minutes are 55+");
    }

    /** @test */
    public function shouldHaveAllOfTheLampsOfTheThirdRowOff()
    {
        $timeArray = [
            'minutes_5x' => '00000000000',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('00:00:00');

        $this->assertEquals($timeArray["minutes_5x"], $result["minutes_5x"], "All should be off on the third line when minutes are 00");
    }

    /** @test */
    public function shouldHaveTwoLampsOfTheFourthRowOn()
    {
        $timeArray = [
            'minutes_1x' => '1100',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('17:57:00');

        $this->assertEquals($timeArray["minutes_1x"], $result["minutes_1x"], "When minutes are 57 the fourth row should have two lamps on");
    }

    /** @test */
    public function shouldHaveAllHoursOfValueOneLampOn()
    {
        $timeArray = [
            'minutes_1x' => '1111',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('24:59:00');

        $this->assertEquals($timeArray["minutes_1x"], $result["minutes_1x"], "All of the lamps of the forth row should be on when minutes are 59");
    }

    /** @test */
    public function shouldHaveAllOfTheLampsOfTheFourthRowOff()
    {
        $timeArray = [
            'minutes_1x' => '0000',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('00:00:00');

        $this->assertEquals($timeArray["minutes_1x"], $result["minutes_1x"], "All of the lamps of the forth row should be off when minutes are 00");
    }



}