<?php

namespace Tests\Unit\calculator;

use App\Domain\Calculator\Services\Addition;
use PHPUnit\Framework\TestCase;

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
}
