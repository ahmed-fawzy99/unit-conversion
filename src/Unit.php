<?php

namespace Ahmedde\UnitConversion;

class Unit
{

    public function __construct(public string $name, public float $value){}

    private array $conversions = [
        'kg' => [
            'lbs' => 2.20462,
            'grams' => 1000,
            'mg' => 1e+6,
            'tonnes' => 0.001,
        ]
    ];

    /**
     * @throws \Exception
     */
    public function conversionRate(string $targetUnitName): float
    {
        return $this->conversions[$this->name][$targetUnitName] ?? throw new \InvalidArgumentException("Conversion from $this->name to $targetUnitName not defined.");
    }

    /**
     * @throws \Exception
     */
    public function convert(string $targetUnitName): float
    {
        $rate = $this->conversionRate($targetUnitName);
        return $this->value * $rate;
    }
}
