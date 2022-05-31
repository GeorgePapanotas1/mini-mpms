<?php

namespace App\Console\Commands\Setup;

use App\Models\Employee;
use App\Models\Field;
use App\Models\Practice;
use Database\Factories\EmployeeFactory;
use Database\Factories\FieldFactory;
use Database\Factories\PracticeFactory;
use Illuminate\Console\Command;

class FactoryFill extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factories:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fills the database with dummy data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Field::factory()->count(30)->create();
        Practice::factory()->count(20)->create();
        Employee::factory()->count(200)->create();
    }
}
