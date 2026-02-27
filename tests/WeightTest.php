<?php

namespace Ahmedde\UnitConversion\Tests;

use Ahmedde\UnitConversion\Weight;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class WeightTest extends TestCase
{
    /** @test */
    public function it_converts_supported_units()
    {
        $weight = Weight::fromKilograms(100);
        $this->assertEquals(220.462, $weight->toPounds());
        $this->assertEquals(100000, $weight->toUnit('grams'));
    }

    /** @test */
    public function it_returns_same_value_for_same_unit()
    {
        $weight = Weight::fromKilograms(100);
        $this->assertEquals(100, $weight->toUnit('kg'));
    }

    /** @test */
    public function it_rejects_unsupported_units()
    {
        $this->expectException(InvalidArgumentException::class);

        $weight = Weight::fromKilograms(100);
        $weight->toUnit('miles');
    }
}
