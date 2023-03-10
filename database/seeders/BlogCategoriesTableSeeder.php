<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        $categories = [];

        $categoryName = 'Without category';

        $categories[] = [
            'title' => $categoryName,
            'slug' => Str::slug($categoryName),
            'parent_id' => 0,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $categoryName = 'Category #' . $i;
            $parentId = ($i > 4) ? random_int(1, 4) : 1;

            $categories[] = [
                'title' => $categoryName,
                'slug' => Str::slug($categoryName),
                'parent_id' => $parentId,
            ];
        }

        DB::table('blog_categories')->insert($categories);
    }
}
