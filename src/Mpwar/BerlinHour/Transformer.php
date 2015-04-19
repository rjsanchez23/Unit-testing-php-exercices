<?php


namespace Mpwar\BerlinHour;


final class Transformer
{


    public function fromDigitalToBerlin($time)
    {
        $time = explode(":", $time);
        $hours = $time[0];
        $minutes = $time[1];
        $seconds = $time[2];
        $result = [
            'seconds' => '0',
            'hours_5x' => '0000',
            'hours_1x' => '0000',
            'minutes_5x' => '00000000000',
            'minutes_1x' => '0000',
        ];

        if ($seconds % 2) {
            $result['seconds'] = 1;
        }

        $hours_5x = $this->hoursToLamp(floor($hours/5));
        $result["hours_5x"] = implode($hours_5x);

        $hours_1x = $this->hoursToLamp(($hours % 5));
        $result["hours_1x"] = implode(($hours_1x));

        return $result;
    }

    private function hoursToLamp($hours){
        $lamp = [0,0,0,0];
        for($index = 0; $index < $hours; $index++){

            $lamp[$index] = 1;
        }
        return $lamp;

    }



}