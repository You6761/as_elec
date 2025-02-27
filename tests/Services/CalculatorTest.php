<?php

namespace App\Tests\Services;

use PHPUnit\Framework\TestCase;
use App\Service\Calculator;

class CalculatorTest extends TestCase
{
  public function testAddition()
  {
    $calculator = new Calculator();
    $this->assertEquals(4, $calculator->add(2, 2));
  }
}
