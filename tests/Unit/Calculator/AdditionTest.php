<?php

namespace Tests\Unit\calculator;

use App\Domain\Calculator\Services\Addition;
use PHPUnit\Framework\TestCase;
use Exception;

/**
 * AdditionTest
 */
class AdditionTest extends TestCase
{
    
    /**
     * test_adds_up_given_operands
     *
     * @return void
     */
    public function test_adds_up_given_operands()
    {
        $addition = new Addition;
        $addition->setOperands([5, 10, 2]);

        $this->assertEquals(17, $addition->calculate());
    }
    
    /**
     * test_no_given_operands_throws_exception_when_calculating
     *
     * @return void
     */
    public function test_no_given_operands_throws_exception_when_calculating()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('No operands supplied');
        $addition = new Addition;
        $addition->setOperands([]);
        $addition->calculate();
    }
}
