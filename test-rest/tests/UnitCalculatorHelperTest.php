<?php

use App\Data\DistanceUnit;
use App\Helpers\UnitCalculatorHelper;
use App\Models\DistanceValue;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UnitCalculatorHelperTest extends TestCase
{
    /**
     * Test meter unit additions
     *
     * @return void
     */
    public function testMeters(): void
    {

        $value1 = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 2]);
        $value2 = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 2]);


        $expect = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 4]);

        self::assertEquals($expect, UnitCalculatorHelper::addDistance($value1, $value2, DistanceUnit::METERS));
    }

    /**
     * Test yard unit additions
     *
     * @return void
     */
    public function testYards(): void
    {

        $unit = DistanceUnit::METERS;
        $value1 = DistanceValue::factory()->make(['unit' => DistanceUnit::YARDS, 'value' => 2]);
        $value2 = DistanceValue::factory()->make(['unit' => DistanceUnit::YARDS, 'value' => 2]);


        $expect = DistanceValue::factory()->make(['unit' => DistanceUnit::YARDS, 'value' => 4]);
        self::assertEquals($expect, UnitCalculatorHelper::addDistance($value1, $value2, DistanceUnit::YARDS));
    }

    /**
     * Test mixed unit additions
     *
     * @return void
     */
    public function testMixed(): void
    {

        $unit = DistanceUnit::METERS;
        $value1 = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 2]);
        $value2 = DistanceValue::factory()->make(['unit' => DistanceUnit::YARDS, 'value' => 2]);


        $expect = DistanceValue::factory()->make(['unit' => DistanceUnit::METERS, 'value' => 3.83]);
        self::assertEquals($expect, UnitCalculatorHelper::addDistance($value1, $value2, DistanceUnit::METERS));

        $expect = DistanceValue::factory()->make(['unit' => DistanceUnit::YARDS, 'value' => 4.19]);
        self::assertEquals($expect, UnitCalculatorHelper::addDistance($value1, $value2, DistanceUnit::YARDS));
    }
}
