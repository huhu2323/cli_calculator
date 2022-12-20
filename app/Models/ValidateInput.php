<?php

namespace App\Models;

use App\Console\Commands\Calculate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValidateInput extends Model
{

    public $splittedArguments;

    public function __construct($arguments)
    {
        $this->splittedArguments = $arguments;
    }

    /**
     *
     * This methods handles the argument checking
     *
     * @return bool
     */
    public function checkArguments()
    {
        if (!collect([2, 3])->contains($this->splittedArguments->count())) return false;

        if (!is_numeric($this->splittedArguments[0])) return false;

        if ($this->splittedArguments->get(2) && !is_numeric($this->splittedArguments->get(2))) return false;

        if (!collect([
            Calculator::ADDITION,
            Calculator::SUBTRACTION,
            Calculator::MULTIPLICATION,
            Calculator::DIVISION,
            Calculator::SQUARED])->contains($this->splittedArguments[1])) return false;

        if ($this->splittedArguments->get(1) == Calculator::SQUARED && $this->splittedArguments->get(2)) return false;

        if (collect([
            Calculator::ADDITION,
            Calculator::SUBTRACTION,
            Calculator::MULTIPLICATION,
            Calculator::DIVISION])->contains($this->splittedArguments[1]) && !$this->splittedArguments->get(2)) return false;

        return true;
    }
}
