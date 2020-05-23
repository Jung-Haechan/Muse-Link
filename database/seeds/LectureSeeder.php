<?php

use App\Models\Lecture;
use App\Models\LectureCategory;
use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LectureCategory::class, 10)->create();
        factory(Lecture::class, 200)->create();
    }
}
