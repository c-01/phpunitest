<?php
/**
 * Created by PhpStorm.
 * User: stone
 * Date: 2019-11-26
 * Time: 12:08
 */

namespace App\Calculator;


use App\Calculator\Exceptions\NoOperandsException;

class Addition implements IOperation
{

    private $_operands = [];

    public function setOperands(array $operands )
    {
        $this->_operands = $operands;
    }

    /**
     * @return float|int
     * @throws NoOperandsException
     */
    public function calculate()
    {
        if (count($this->_operands) === 0) {
            throw new NoOperandsException;
        }

//        $result = 0;
//
//        foreach ($this->_operands as $operand) {
//            $result += $operand;
//        }
//
//        return $result;


        return array_sum($this->_operands);
    }
}