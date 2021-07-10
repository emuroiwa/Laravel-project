<?php

namespace App\Domain\ProcessMeasurement\Services;

use App\Domain\UnitConvertor\Services\DistanceConvertor;
use App\Domain\Calculator\Services\Addition;
use App\Domain\ProcessMeasurement\Contracts\ProcessMeasurementInterface;

/**
 * ProcessDistanceAddition
 */
class ProcessDistanceAddition implements ProcessMeasurementInterface
{

    /**
     * process
     *
     * @param  mixed $data
     * @return array
     */
    public function process(array $data): array
    {
        $units = [$data['unit1'], $data['unit2']];
        $values = [$data['value1'], $data['value2']];
        $returnUnit = $data['return_unit'];

        $results = array_map(null, $units, $values);

        //TODO refactor here
        $operands = [];
        foreach ($results as $result) {
            if ($returnUnit !== $result[0]) {
                $distanceConvertor = new DistanceConvertor($result[1], $returnUnit, $result[0]);
                $operands[] = $distanceConvertor->convert();
            } else {
                $operands[] = $result[1];
            }
        }

        $addition = new Addition;
        $addition->setOperands($operands);
        $value = number_format($addition->calculate(), 2);
        return ['value' => $value, 'unit' => $returnUnit];
    }
}
