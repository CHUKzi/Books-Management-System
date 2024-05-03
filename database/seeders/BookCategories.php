<?php

namespace Database\Seeders;

use App\Models\BookCate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book_categories = [
            'Childrens',
            'Fiction',
            'Novels',
            'Horror',
            'Love'
        ];

        foreach ($book_categories as $book_cat) {
            BookCate::create(['name' => $book_cat]);
        }
    }
}
