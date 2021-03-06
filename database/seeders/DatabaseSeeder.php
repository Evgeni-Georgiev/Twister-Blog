<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Plans;
use App\Models\Post;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        $category = Category::factory()->create([ // Create fake data for everything, except name, which is 'John Doe'
            'name' => 'Anime'
        ]);

        Plans::factory()->create([
            "title" => 'Basic Plan',
            "amount" => 20,
            "identifier" => "basic_plan",
            "stripe_id" => "price_1Jpd42Dcurwhr0A0urlEG5Vc"
        ]);

//        $user = User::factory()->create([ // Create fake data for everything, except name, which is 'John Doe'
//            'name' => 'John Doe'
//        ]);

        Post::factory(15)->create([
            'category_id' => $category->id
        ]);

//        Post::factory(15)->create([
//            'user_id' => $user->id
//        ]);

        // After writing all the code, in command: php artisan db:seed
        // php artisan migrate:fresh --seed
    }
}
