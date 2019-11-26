<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;

class AdditionTest extends TestCase
{
    /**
     * @test
     *
     * @throws \App\Calculator\Exceptions\NoOperandsException
     */
     public function adds_up_given_operands()
     {
        $addition = new Addition;
        $addition->setOperands([5,10]);

        $this->assertEquals(15, $addition->calculate());
     }

    /**
     * @test
     *
     * @throws \App\Calculator\Exceptions\NoOperandsException
     */
      public function no_operands_given_throws_exception_when_calculating()
      {
         $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);
         $addition = new Addition;
         $addition->calculate();
      }
}