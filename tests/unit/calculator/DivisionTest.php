<?php

use PHPUnit\Framework\TestCase;
use App\Calculator\Division;

class DivisionTest extends TestCase
{
    /**
     * @test
     *
     * @throws \App\Calculator\Exceptions\NoOperandsException
     */
     public function divs_up_given_operands()
     {
         $addition = new \App\Calculator\Division();
         $addition->setOperands([150,10]);

         $this->assertEquals(15, $addition->calculate());
     }


    /**
     * @test
     *
     * @throws \App\Calculator\Exceptions\NoOperandsException
     */
    public function adds_up_given_operands_div_zero()
    {
        $addition = new \App\Calculator\Division();
        $addition->setOperands([150,0,0,10]);

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
         $addition = new Division;
         $addition->calculate();
      }
}