<?php

namespace Database\Seeders;

use App\Models\Autoevaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Seeder;

class AutoevaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Autoevaluation::factory(10)->create();
    }
}
