<?php

use App\Data\DistanceUnit;
use App\Helpers\UnitConversionHelper;
use App\Models\DistanceValue;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DistanceConversionHelperTest extends TestCase
{
    /**
     * Test the unit conversion helper
     *
     * @return void
     */
    public function testHelper()
    {

        $unit = DistanceUnit::METERS;
        $value1 = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 2]);
        $value2 = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 2]);


        $output = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 4]);

        $this->assertEquals($output, UnitConversionHelper::addDistance($value1, $value2, $unit));
    }
}
