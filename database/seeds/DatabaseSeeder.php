<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $authors = factory(App\Author::class, 5)->create();
        $authors->each(function ($author) {
            $author->profile()
                ->save(factory(App\Profile::class)->make());

            $author->posts()
                ->saveMany(
                    factory(App\Post::class, mt_rand(20, 30))->make()
                );
        });
    }
}
