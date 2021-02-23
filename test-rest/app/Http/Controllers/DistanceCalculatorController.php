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
            'distance' => 'required|float',
            'unit' => 'string',
            'outputUnit' => 'required|string'
        ]);


        return UnitCalculatorHelper::addDistance(
            $request->get("distance1"),
            $request->get("unit1", DistanceUnit::METERS),
            $request->get("distance2"),
            $request->get("unit2", DistanceUnit::METERS),
            $request->get('outputUnit', DistanceUnit::METERS),
        );
    }
}
