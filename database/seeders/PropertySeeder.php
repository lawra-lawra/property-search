<?php

namespace Database\Seeders;

use App\Models\Property;

class PropertySeeder extends DatabaseSeeder
{
    public function run(): void
    {
        Property::factory()->count(30)->create();
    }
}