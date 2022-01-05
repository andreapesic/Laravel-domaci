<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Provider;
use \App\Models\Service;
use \App\Models\AppointmentRating;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Provider::truncate();
        Service::truncate();
        AppointmentRating::truncate();

        User::factory(5)->create();
        Provider::factory(10)->create();

        $user = User::create([
            'name' => 'Andrea',
            'email' => 'deapesic@gmail.com',
            'password' => Hash::make('andreaAdmin99.'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);

        $service1 = Service::create([
            'name' => 'Massage'
        ]);

        $service2 = Service::create([
            'name' => 'Face treatement'
        ]);

        $service3 = Service::create([
            'name' => 'Sauna'
        ]);

        $service4 = Service::create([
            'name' => 'Manicure'
        ]);

        $service5 = Service::create([
            'name' => 'Pedicure'
        ]);
        
        $appointementRating1 = AppointmentRating::create([
            'date_and_time' => now(),
            'user' => 1,
            'service' => 1,
            'provider' => 1,
            'rating' => 5,
            'note' => ' I very much enjoyed the attention to detail when adjusting various parts of the body and stretching or massaging based on what’s needed, and in a way that can actually help your pain points feel better. In comparison to a massage from a place like massage envy, my experience here felt way more therapeutic and would provide lasting results for the next few days.'
        ]);

        $appointementRating2 = AppointmentRating::create([
            'date_and_time' => now(),
            'user' => 2,
            'service' => 1,
            'provider' => 2,
            'rating' => 5,
            'note' => 'I am a performer so I need a very thorough massage. He knew how to fix my body without pain. My body felt fresh and reborn! Absolutely amazing!'
        ]);


    }
}
