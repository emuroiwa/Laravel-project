<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDistanceFormRequest;
use App\Domain\ProcessMeasurement\Services\ProcessDistanceAddition;
use App\Traits\RespondsWithHttpStatus;

/**
 * AddDistanceController
 */
class AddDistanceController extends Controller
{
    use RespondsWithHttpStatus;
    /**
     * addDistance
     *
     * @return void
     */
    public function addDistance(AddDistanceFormRequest $request, ProcessDistanceAddition $addDistance)
    {
        $result = $addDistance->process($request->all());
        return $this->success('Distance calculation success', $result);
    }
}
