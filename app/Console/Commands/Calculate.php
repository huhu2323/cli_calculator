<?php

namespace App\Console\Commands;

use App\Models\Calculator;
use App\Models\ValidateInput;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class Calculate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The main entry point for calculation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get inputs
        $argument = $this->ask('Enter arithmetic problem');
        $splittedArgument = Str::of($argument)->explode(' ');

        // Validate inputs
        $validateInput = new ValidateInput($splittedArgument);

        // Conditions
        if ($validateInput->checkArguments()) {
            $calculator = new Calculator($splittedArgument->get(0), $splittedArgument->get(1), $splittedArgument->get(2));
            $this->info($calculator->getAnswer());
        }
        else {
            $this->error('Error Arguments');
        }

        return Command::SUCCESS;
    }
}
