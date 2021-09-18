<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', "muhaiming2c@gmail.com")->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Muhaiminul Islam";
            $user->email = "muhaiming2c@gmail.com";
            $user->password = Hash::make('admin123');
            $user->save();
        }
    }
}
