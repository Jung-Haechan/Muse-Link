<?php

use App\Models\Exhibit;
use App\Models\Follow;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 300)->create();
        factory(Exhibit::class, 1000)->create();

        $users = User::all();
        foreach ($users as $user) {
            if ($user->exhibits()->first()) {
                $user->update([
                    'face_exhibit_id' => $user->exhibits->random()->id
                ]);
            }
        }
        factory(Follow::class, 1500)->create();
    }
}
