<?php


namespace App\Helpers;


use App\Data\DistanceUnit;
use App\Models\DistanceValue;


class UnitCalculatorHelper {

    public static function addDistance(DistanceValue $value1, DistanceValue $value2, $unitOut): DistanceValue {

        $sum = round(self::convertToUnit($value1, $unitOut) + self::convertToUnit($value2, $unitOut), 2);

        return DistanceValue::factory()->make(['unit' => $unitOut, 'value' => $sum]);
    }


    private static function convertToUnit(DistanceValue $value, $unit): float {


        if ($value->unit === $unit) {
            return $value->value;
        }

        if ($unit === DistanceUnit::METERS) {
          return $value->value * DistanceUnit::YARD_RATIO;
        }
        if ($unit === DistanceUnit::YARDS) {
          return $value->value / DistanceUnit::YARD_RATIO;
        }
    }

}
