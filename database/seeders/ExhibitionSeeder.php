<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExhibitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an exhibition entry for the authenticated user
        \App\Models\Exhibition::create([
            'exhibition' => 'Annual Art Exhibition',
            'year' => 2024,
        ]);
    }
}
