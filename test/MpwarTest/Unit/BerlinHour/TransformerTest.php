<?php


namespace Mpwar\Unit\BerlinHour;


use Mpwar\BerlinHour\Transformer;

final class TransformerTest extends \PHPUnit_Framework_TestCase
{
    /**@test*/
    public function shouldBeOdd()
    {
        $timeArray = [
            'seconds'    => '0',
            'hours_5x'   => '0000',
            'hours_1x'   => '0000',
            'minutes_5x' => '00000000000',
            'minutes_1x' => '0000',
        ];

        $transformer = new Transformer;
        $result = $transformer->fromDigitalToBerlin('00:00:00');

        $this->assertEquals($timeArray["seconds"], $result["seconds"], "the lamp is off when second is odd");
    }
}