<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
