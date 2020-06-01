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
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(LectureSeeder::class);
        $this->call(ReactionSeeder::class);
        $this->call(CsSeeder::class);
    }
}
