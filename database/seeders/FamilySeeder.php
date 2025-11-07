<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Family::create([
            'name' => 'Hassam Family',
            'slug' => 'hassam-family',
            'access_code' => Str::uuid(),
        ]);
    }
}
