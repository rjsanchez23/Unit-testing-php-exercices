<?php


namespace Mpwar\BerlinHour;


final class Transformer
{

    public function fromDigitalToBerlin($time)
    {
        list($hours, $minutes, $seconds) = explode(":",$time);

        $isSecondsLampOn = ($seconds % 2)?0:1;
        $result["seconds"]      = $this->lampsToStringConversion($isSecondsLampOn, 1);
        $result["hours_5x"]     = $this->lampsToStringConversion(floor($hours/5), 4);
        $result["hours_1x"]     = $this->lampsToStringConversion(($hours % 5), 4);
        $result["minutes_5x"]   = $this->lampsToStringConversion(floor($minutes/5), 11);
        $result["minutes_1x"]   = $this->lampsToStringConversion(($minutes % 5), 4);

        return $result;
    }
    private function lampsToStringConversion($lampsOn, $lampsNumber)
    {
        $lamp =  array_fill (0, $lampsNumber , 0);
        for($index = 0; $index < $lampsOn; $index++){

            $lamp[$index] = 1;
        }
        return implode($lamp);

    }



}