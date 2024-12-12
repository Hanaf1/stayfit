<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ActivityUser;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\DetailsUser;
use App\Models\Post;
use App\Models\nutrisi;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // factory data dumpy

        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'hanafi',
            'username' => 'nafi',
            'email' => 'starnafi4@gmail.com',
            'password' => bcrypt('Riverver57'),
            'role' => 0,
        ]);
        User::create([
            'name' => 'rivert',
            'username' => 'river',
            'email' => 'agata@gmail.com',
            'password' => bcrypt('75818598'),
            'role' => 1,
        ]);

        User::create([
            'name' => 'lee',
            'username' => 'leee',
            'email' => 'lee@gmail.com',
            'password' => bcrypt('lee90999'),
            'role' => 2,
        ]);

        User::factory()->count(5)->create(); // Creates 5 random users

        User::factory()->state(['role' => 1])->count(5)->create(); // Creates 5 random doctors

        Category::create([
            'name' => 'lifestyle',
            'slug' => 'life-style',
        ]);

        Category::create([
            'name' => 'Sport',
            'slug' => 'sport',
        ]);

        Category::create([
            'name' => 'Food',
            'slug' => 'food',
        ]);


        Post::factory(20)->create();
        DetailsUser::factory(13)->create();
        nutrisi::factory(14)->create();
        ActivityUser::factory(13)->create();
       
        Post::create([
            'title' => 'judul pertama',
            'slug' => 'judul-pertama',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio veritatis omnis tempora fuga iure sunt totam ab ipsam quas eos architecto quia, iste maiores? Pariatur sed reprehenderit perferendis, officia totam quaerat qui eius. Eaque perferendis fuga necessitatibus! Blanditiis necessitatibus pariatur impedit quidem delectus debitis illo esse id nisi laboriosam suscipit nulla excepturi rerum dicta dolorum minima quas magnam quaerat, animi dignissimos, modi saepe alias nihil! Reiciendis, delectus provident. Quisquam distinctio, sequi fugit dolorem a accusantium hic eaque impedit at beatae possimus dolore nulla ipsum voluptatum autem nihil rem eveniet magnam perspiciatis minima? Natus fugit quae modi hic laborum magnam labore!',
            'category_id' => 2,
            'user_id' => 1,
        ]);
        Post::create([
            'title' => 'judul kedua',
            'slug' => 'judul-kedua',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio veritatis omnis tempora fuga iure sunt totam ab ipsam quas eos architecto quia, iste maiores? Pariatur sed reprehenderit perferendis, officia totam quaerat qui eius. Eaque perferendis fuga necessitatibus! Blanditiis necessitatibus pariatur impedit quidem delectus debitis illo esse id nisi laboriosam suscipit nulla excepturi rerum dicta dolorum minima quas magnam quaerat, animi dignissimos, modi saepe alias nihil! Reiciendis, delectus provident. Quisquam distinctio, sequi fugit dolorem a accusantium hic eaque impedit at beatae possimus dolore nulla ipsum voluptatum autem nihil rem eveniet magnam perspiciatis minima? Natus fugit quae modi hic laborum magnam labore!',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        Post::create([
            'title' => 'judul ketiga',
            'slug' => 'judul-ketiga',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio veritatis omnis tempora fuga iure sunt totam ab ipsam quas eos architecto quia, iste maiores? Pariatur sed reprehenderit perferendis, officia totam quaerat qui eius. Eaque perferendis fuga necessitatibus! Blanditiis necessitatibus pariatur impedit quidem delectus debitis illo esse id nisi laboriosam suscipit nulla excepturi rerum dicta dolorum minima quas magnam quaerat, animi dignissimos, modi saepe alias nihil! Reiciendis, delectus provident. Quisquam distinctio, sequi fugit dolorem a accusantium hic eaque impedit at beatae possimus dolore nulla ipsum voluptatum autem nihil rem eveniet magnam perspiciatis minima? Natus fugit quae modi hic laborum magnam labore!',
            'category_id' => 2,
            'user_id' => 3,
        ]);


    }
}
