<?php

namespace App\Domain\ProcessMeasurement\Contracts;

interface ProcessMeasurementInterface
{    
    /**
     * process
     *
     * @param  mixed $data
     * @return array
     */
    public function process(array $data): array;
}
