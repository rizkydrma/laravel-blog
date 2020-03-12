<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            [
                'judul' => 'First Post',
                'category_id' => 2,
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam aliquid ut ducimus non repellat provident nam minima, dolorum doloremque nihil quae tempora quasi rem repudiandae ad. Architecto vero illo asperiores!',
                'gambar' => 'post1'
            ],
            [
                'judul' => 'First Post',
                'category_id' => 2,
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam aliquid ut ducimus non repellat provident nam minima, dolorum doloremque nihil quae tempora quasi rem repudiandae ad. Architecto vero illo asperiores!',
                'gambar' => 'post1'
            ]
            ];

            DB::table('posts')->insert($post);
    }
}
