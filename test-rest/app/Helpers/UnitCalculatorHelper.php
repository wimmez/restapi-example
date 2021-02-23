<?php


namespace App\Helpers;


use App\Data\DistanceUnit;
use App\Models\DistanceValue;
use RuntimeException;


class UnitCalculatorHelper {


    /**
     * Sum two distance values in the specified output unit
     * @param DistanceValue $value1
     * @param DistanceValue $value2
     * @param $unitOut
     * @return DistanceValue
     */
    public static function addDistance(DistanceValue $value1, DistanceValue $value2, $unitOut): DistanceValue {

        $sum = round(self::convertToUnit($value1, $unitOut) + self::convertToUnit($value2, $unitOut), 2);

        return DistanceValue::factory()->make(['unit' => $unitOut, 'value' => $sum]);
    }


    private static function convertToUnit(DistanceValue $value, $unit): float {

        if ($value->unit === $unit) {
            return $value->value; // already in the desired unit
        }

        if (strcasecmp($unit, DistanceUnit::METERS) === 0) {
          return $value->value * DistanceUnit::YARD_RATIO;
        }

        if (strcasecmp($unit, DistanceUnit::YARDS) ===0 ) {
          return $value->value / DistanceUnit::YARD_RATIO;
        }

        throw new RuntimeException("Distance value has unknown unit: ". $value->unit);

    }

}
