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
        $user = \App\User::create([
            'name'      => 'POLEYA',
            'firstname' => 'Kévin',
            'login'     => 'Kev',
            'email'     => 'kevin.poleya@tessi.fr',
            'password'  => bcrypt('azerty')
        ]);

        $user = \App\User::create([
            'name'      => 'CORMIER',
            'firstname' => 'Maxence',
            'login'     => 'Max',
            'email'     => 'maxence.cormier@tessi.fr',
            'password'  => bcrypt('azerty')
        ]);
    }
}
