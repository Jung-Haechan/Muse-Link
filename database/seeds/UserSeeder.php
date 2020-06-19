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
                        'singer_exhibit_id' => $user->exhibits()->listAll('singer')->get()->random()->id,
                        'singer_updated_at' => $user->exhibits()->listAll('singer')->first()->created_at,
                    ]);
                }
            }
            if($user->is_producer) {
                if ($user->exhibits()->listAll('producer')->first()) {
                    $user->update([
                        'producer_exhibit_id' => $user->exhibits()->listAll('producer')->get()->random()->id,
                        'producer_updated_at' => $user->exhibits()->listAll('producer')->first()->created_at,
                    ]);
                }
            }
        }
        factory(Follow::class, 1500)->create();
        factory(Message::class, 1500)->create();
    }
}
