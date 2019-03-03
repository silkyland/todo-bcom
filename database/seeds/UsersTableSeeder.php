<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //INSERT INTO users (fullname, email, password) VALUES (..... )
        $user = new \App\User();
        $user->fullname = "Bundit Nuntates";
        $user->email = "silkyland@gmail.com";
        $user->password = bcrypt('1234');
        $user->save();
    }
}
