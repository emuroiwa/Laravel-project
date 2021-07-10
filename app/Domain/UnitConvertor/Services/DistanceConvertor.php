<?php

namespace App\Domain\UnitConvertor\Services;

use App\Domain\UnitConvertor\Contracts\UnitConvertorInterface;

/**
 * DistanceConvertor
 */
class DistanceConvertor implements UnitConvertorInterface
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

    /**
     * @param $unit
     * @return $float
     */
    public function convert(): float
    {
        return ($this->value * $this->getUnitValue($this->fromUnit)) / $this->getUnitValue($this->baseUnit);
    }

    /**
     * getUnitValue
     *
     * @param  string $unit
     * @return float
     * * @throws \Exception
     */
    public function getUnitValue(string $unit): float
    {
        if (!isset(config('enums.length_units')[strtoupper($unit)])) {
            throw new \Exception(sprintf('No conversion %s is defined', $unit));
        }

        return config('enums.length_units')[strtoupper($unit)];
    }
}
