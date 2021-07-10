<?php

namespace App\Domain\Calculator\Services;

use App\Domain\Calculator\Contracts\OperationInterface;
/**
 * Addition
 */
class Addition implements OperationInterface
{
    /**
     * operands
     *
     * @var mixed
     */
    protected $operands;

    /**
     * setOperands
     *
     * @param  array $operands
     * @return void
     */
    public function setOperands(array $operands): void
    {
        $this->operands = $operands;
    }

    /**
     * calculate
     *
     * @return float
     * * @throws \Exception
     */
    public function calculate(): float
    {
        return array_sum($this->operands);
    }
}
