<?php

namespace Database\Seeders;

use App\Models\Coevaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoevaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coevaluation::factory(10)->create();
    }
}
