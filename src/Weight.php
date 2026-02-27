<?php

namespace Ahmedde\UnitConversion;

class Weight
{
    public function __construct(protected Unit $unit){}

    public static function fromUnit(string $name, float $value): self
    {
        return new self(new Unit($name, $value));
    }

    public static function fromKilograms(float $kilograms): self
    {
        return self::fromUnit('kg', $kilograms);
    }

    /**
     * @throws \Exception
     */
    public function toUnit(string $name): float
    {
        if ($this->unit->name === $name) {
            return $this->unit->value;
        }
        return $this->unit->convert($name);
    }

    /**
     * @throws \Exception
     */
    public function toPounds(): float
    {
        return $this->toUnit('lbs');
    }
}
