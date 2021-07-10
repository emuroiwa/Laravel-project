<?php

namespace Tests\Unit\CalculateDistanceTest;

use App\Calculator\Calculator;
use Tests\TestCase;

class CalculateDistanceTest extends TestCase
{

    /**
     * test_when_calculating_distance_some_fields_are_required
     *
     * @return void
     */
    public function test_when_calculating_distance_some_fields_are_required()
    {
        $response = $this->postJson(route('add-distance-v1'));
        $this->assertArrayHasKey('value1', $response->json()['errors']);
        $this->assertArrayHasKey('value2', $response->json()['errors']);
        $this->assertArrayHasKey('unit1', $response->json()['errors']);
        $this->assertArrayHasKey('unit2', $response->json()['errors']);
        $this->assertArrayHasKey('return_unit', $response->json()['errors']);
    }
}
