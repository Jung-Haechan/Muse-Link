<?php

use App\Models\Notice;
use App\Models\Qna;
use Illuminate\Database\Seeder;

class CsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Notice::class, 30)->create();
        factory(Qna::class, 15)->create();
    }
}
