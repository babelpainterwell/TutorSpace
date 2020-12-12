<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TutorRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutor_requests')->insert([
            'tutor_id' => '2',
            'student_id' => '1',
            'course_id' => '1',
            'session_time_start' => Carbon::now()->addMinutes(20),
            'session_time_end' => Carbon::now()->addMinutes(80),
        ]);

        DB::table('tutor_requests')->insert([
            'tutor_id' => '2',
            'student_id' => '1',
            'course_id' => '5',
            'session_time_start' => Carbon::now()->addHours(2)->addMinutes(20),
            'session_time_end' => Carbon::now()->addHours(3)->addMinutes(40),
        ]);

        DB::table('tutor_requests')->insert([
            'tutor_id' => '2',
            'student_id' => '1',
            'course_id' => '7',
            'session_time_start' => Carbon::now()->addHours(5)->addMinutes(20),
            'session_time_end' => Carbon::now()->addHours(7)->addMinutes(80),
        ]);

        DB::table('tutor_requests')->insert([
            'tutor_id' => '2',
            'student_id' => '1',
            'course_id' => '10',
            'session_time_start' => Carbon::now(),
            'session_time_end' => Carbon::now()->addHours(7)->addMinutes(15),
        ]);
    }
}