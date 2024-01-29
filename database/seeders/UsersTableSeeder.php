<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'locale'         => '',
                'songs'          => '',
            ],
        ];

        User::insert($users);

        User::factory(40)->create()->each(function($row){
            $row->songs = ['name' => fake(locale:'el_GR')->name(), 'title',fake()->words(3,true)];
            $row->save();
        });
    }
}
