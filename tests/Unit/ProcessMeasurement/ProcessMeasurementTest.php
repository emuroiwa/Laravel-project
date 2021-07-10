<?php

namespace Tests\Unit\ProcessMeasurement;

use Tests\TestCase;

class ProcessMeasurementTest extends TestCase
{

    public function test_calculate_distance_when_units_are_the_same()
    {
        $processDistance = new ProcessDistanceAddition;
        $units = ['unit1' => 'yard', 'unit2' => 'yard'];
        $values = ['value1' => 10, 'value2' => 2];
        $returnUnit = ['return_unit' => 'metre'];
        $data = array_merge($units, $values, $returnUnit);
        $this->assertEquals(10.97, $processDistance->process($data)['value']);
    }
}
