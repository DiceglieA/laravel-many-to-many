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
        $users = [
            [
                'name'      => 'paolo',
                'email'     => 'paolo@paolo.paolo',
                'password'  =>  Hash::make('paolo'),
            ],
            [
                'name'      => 'luca',
                'email'     => 'luca@luca.luca',
                'password'  =>  Hash::make('luca'),
            ],
            [
                'name'      => 'gianni',
                'email'     => 'gianni@gianni.gianni',
                'password'  =>  Hash::make('gianni'),
            ],
        ];

        foreach ($users as $user) {
            // Metodo 1
            // $objUser = new User;
            // $objUser->name      = $user['name'];
            // $objUser->email     = $user['email'];
            // $objUser->password  = $user['password'];
            // $objUser->save();

            // Metodo 2
            // $objUser = new User;
            // $objUser->fill($user);
            // $objUser->save();

            // Metodo 3
            User::create($user);
        }
    }
}
