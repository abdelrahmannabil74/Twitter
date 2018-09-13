<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->delete();
        User::create(

            [
             'name' =>'Abdelrahman',
             'email' => 'abdelrhman.nabil.ali@gmail.com',
             'username' =>'bolbol',
             'password' =>bcrypt('Abdelrahman'),
             'phone'  =>'01001388296'
            ]
        );
    }
}
