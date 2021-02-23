<?php


namespace App\Helpers;


use App\Data\DistanceUnit;
use App\Models\DistanceValue;


class UnitCalculatorHelper {

    public static function addDistance(DistanceValue $value1, DistanceValue $value2, $unitOut): DistanceValue {

        $value = null;
        switch ($unitOut) {
            case DistanceUnit::YARDS:
                // convert all values to yards and return sum



                break;

            case DistanceUnit::METERS:
                // convert all values to meters and return sum
                break;
            default:
                throw new ValidationException("Unknown distance");
        }


        return DistanceValue::factory()->make(['unit' => $unitOut, 'value' => $value]);
    }


    private function convertToUnit(DistanceValue $value, $unit): float {
        if ($value->unit === $unit) {
            return $value->value;
        }
    }

}
