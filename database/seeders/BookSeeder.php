<?php

namespace Database\Seeders;
use App\Models\Books;
use App\Models\Author
;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Books::factory()->count(10)->create();
    }
}