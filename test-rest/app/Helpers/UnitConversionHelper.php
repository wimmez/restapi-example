<?php


namespace App\Helpers;


use App\Data\DistanceUnit;
use App\Models\DistanceValue;

class UnitConversionHelper {

    public static function addDistance(DistanceValue $value1, DistanceValue $value2, $unitOut): DistanceValue {
        return DistanceValue::factory()->make();
    }

}
