<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'Berita',
                'slug' => 'berita'
            ],
            [
                'name' => 'Techno',
                'slug' => 'techno'
            ]
            ];

            DB::table('tags')->insert($tags);
    }
}
