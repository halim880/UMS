<?php

namespace Database\Seeders;

use App\Models\Library\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::truncate();
        Book::factory(20)->create();
    }
}
