<?php

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class ReactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Like::class, 3000)->create();
        factory(Reply::class, 1000)->create();
    }
}
