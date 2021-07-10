<?php

namespace App\Domain\UnitConvertor\Services;

/**
 * DistanceConvertor
 */
class DistanceConvertor
{

    /**
     * value
     *
     * @var mixed
     */
    protected $value;

    /**
     * baseUnit
     *
     * @var mixed
     */
    protected $baseUnit;

    /**
     * fromUnit
     *
     * @var mixed
     */
    protected $fromUnit;

    /**
     * __construct
     *
     * @param  mixed $value
     * @param  mixed $toUnit
     * @param  mixed $fromUnit
     * @return void
     */
    public function __construct(float $value, string $toUnit, string $fromUnit)
    {
        $this->value = $value;
        $this->baseUnit = $toUnit;
        $this->fromUnit = $fromUnit;
    }
}
