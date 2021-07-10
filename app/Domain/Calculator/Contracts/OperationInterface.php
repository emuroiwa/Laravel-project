<?php

namespace App\Domain\Calculator\Contracts;

interface OperationInterface
{    
    /**
     * calculate
     *
     * @return float
     */
    public function setOperands(array $operands): void;
    public function calculate(): float;
}
