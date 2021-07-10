<?php

namespace Tests\Unit\UnitConvertor;

use App\Domain\UnitConvertor\Services\DistanceConvertor;
use Illuminate\Foundation\Testing\TestCase;
use Exception;
use Tests\CreatesApplication;

class DistanceConvertorTest extends TestCase
{
    use CreatesApplication;

    public function test_converts_given_operands_with_units()
    {
        $converted = new DistanceConvertor(4, 'yard', 'metre');

        $this->assertEquals(4.374453193350831, $converted->convert());
    }

    public function test_wrong_units_are_given_throws_exception_when_calculating()
    {
        $this->expectException(Exception::class);
        $converted = new DistanceConvertor(4, 'yard', 'meter');
        $converted->convert();
    }
}
