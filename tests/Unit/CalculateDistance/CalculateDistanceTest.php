<?php

namespace Tests\Unit\CalculateDistanceTest;

use App\Calculator\Calculator;
use Illuminate\Http\Response;
use Tests\TestCase;

/**
 * CalculateDistanceTest
 */
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
    
    /**
     * test_response_when_there_is_a_successful_calculation
     *
     * @return void
     */
    public function test_response_when_there_is_a_successful_calculation()
    {
        $payload = [
            'value1' => 22,
            'value2' => 5,
            'unit1' => 'yard',
            'unit2' => 'metre',
            'return_unit' => 'inch',
        ];
        $this->json('post', 'api/v1/add-distance', $payload)
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                    'data' => [
                        'value',
                        'unit',
                    ]
                ]
            );
    }
    
    /**
     * test_response_when_there_is_an_error_in_calculation
     *
     * @return void
     */
    public function test_response_when_there_is_an_error_in_calculation()
    {
        $payload = [
            'value1' => 22,
            'value2' => 5,
            'unit1' => 'yard',
            'unit2' => 'm',
            'return_unit' => 'inch',
        ];
        $this->json('post', 'api/v1/add-distance', $payload)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
