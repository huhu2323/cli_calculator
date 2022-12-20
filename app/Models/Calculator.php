<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    public $firstInput;
    public $operator;
    public $secondInput;
    public $answer;

    const ADDITION = '+';
    const SUBTRACTION = '-';
    const MULTIPLICATION = '*';
    const DIVISION = '/';
    const SQUARED = 'sqrt';

    public function __construct($firstInput, $operator, $secondInput = null)
    {
        $this->firstInput = $firstInput;
        $this->operator = $operator;
        $this->secondInput = $secondInput;


        switch ($operator) {
            case self::ADDITION:
                $this->handleAddition();
                break;
            case self::SUBTRACTION:
                $this->handleSubtraction();
                break;
            case self::MULTIPLICATION:
                $this->handleMultiplication();
                break;
            case self::DIVISION:
                $this->handleDivision();
                break;
            case self::SQUARED:
                $this->handleSqrt();
                break;
        }
    }

    /**
     *
     * Handles addition operation
     * @return void
     */
    public function handleAddition()
    {
        $this->answer = $this->firstInput + $this->secondInput;
    }

    /**
     *
     * Handles subtraction operation
     * @return void
     */
    public function handleSubtraction()
    {
        $this->answer = $this->firstInput - $this->secondInput;
    }

    /**
     *
     * Handles multiplication operation
     * @return void
     */
    public function handleMultiplication()
    {
        $this->answer = $this->firstInput * $this->secondInput;
    }

    /**
     *
     * Handles division operation
     * @return void
     */
    public function handleDivision()
    {
        $this->answer = $this->firstInput / $this->secondInput;
    }

    /**
     *
     * Handles square root operation
     * @return void
     */
    public function handleSqrt()
    {
        $this->answer = sqrt($this->firstInput);
    }

    /**
     *
     * Handles square root operation
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}
