<?php

use App\Models\Exhibit;
use App\Models\Follow;
use App\Models\Message;
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
            if($user->is_singer) {
                if ($user->exhibits()->listAll('singer')->first()) {
                    $user->update([
                        'singer_exhibit_id' => $user->exhibits()->listAll('singer')->get()->random()->id
                    ]);
                }
            }
            if($user->is_producer) {
                if ($user->exhibits()->listAll('producer')->first()) {
                    $user->update([
                        'producer_exhibit_id' => $user->exhibits()->listAll('producer')->get()->random()->id
                    ]);
                }
            }
        }
        factory(Follow::class, 1500)->create();
        factory(Message::class, 1500)->create();
    }
}
