<?php
/**
 * Created by PhpStorm.
 * User: stone
 * Date: 2019-11-26
 * Time: 12:08
 */

namespace App\Calculator;


use App\Calculator\Exceptions\NoOperandsException;

class Division implements IOperation
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
//        foreach ($this->_operands as $index => $operand) {
//            if ($index === 0) {
//                $result = $operand;
//                continue;
//            }
//            $result = $result / $operand;
//        }
//        return $result;

        return array_reduce(array_filter($this->_operands),function ($a, $b) {
            if ($a !== null && $b !== null) {
                return $a / $b;
            }
            return $b;
        }, null);


    }
}