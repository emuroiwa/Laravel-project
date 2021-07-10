<?php

namespace App\Domain\UnitConvertor\Contracts;

interface UnitConvertorInterface
{
    /**
     * convert
     *
     * @return float
     */
    public function convert(): float;

    /**
     * getUnitValue
     *
     * @param  mixed $unit
     * @return float
     */
    public function getUnitValue(string $unit): float;
}
