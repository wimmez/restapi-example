<?php

namespace App\Http\Controllers;

use App\Data\DistanceUnit;
use App\Models\DistanceValue;
use App\Helpers\UnitCalculatorHelper;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DistanceCalculatorController extends Controller
{

    /**
     * @param Request $request
     * @return DistanceValue
     * @throws ValidationException
     */
    public function add(Request $request): DistanceValue {

        $this->validate($request, [
            'distance1' => 'required|Numeric',
            'unit1' => 'string',
            'distance2' => 'required|Numeric',
            'unit2' => 'string',
            'outputUnit' => 'required|string'
        ]);


        return UnitCalculatorHelper::addDistance(
            DistanceValue::factory()->make(['unit' => $request->get('unit1', DistanceUnit::METERS), 'value' => $request->get('distance1', 0)]),
            DistanceValue::factory()->make(['unit' => $request->get('unit2', DistanceUnit::METERS), 'value' => $request->get('distance2', 0)]),
            $request->get('outputUnit', DistanceUnit::METERS),
        );
    }
}
