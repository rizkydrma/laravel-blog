<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Berita',
                'slug' => 'berita'
            ],
            [
                'name' => 'Article',
                'slug' => 'article'
            ],
            [
                'name' => 'Technology',
                'slug' => 'technology'
            ]
            
        ];

        DB::table('category')->insert($category);
    }
}
