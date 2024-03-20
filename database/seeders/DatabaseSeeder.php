<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Themes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $userBirthDate = Carbon::create(1999, 10, 4);

        $user = User::factory()->create([
            'name' => 'Kristina Milentijevic Admin',
            'email' => 'kristina.milentijevic13@gmail.com',
            'role' => 'admin',
            'gender' => 'female',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>  $userBirthDate,
            'personal_number' => '0410999188932',
            'phone_number' => '06130000896',
            'picture' => asset('storage/profile_pictures/N0126ejhjrxZmhZCdMYnxVYmlEplFMgLh0ZpD0SE.jpg'),
        ]);

        $user = User::factory()->create([
            'name' => 'Kristina Milentijevic Moderator',
            'email' => 'kristina.milentijevic13@hotmail.com',
            'role' => 'moderator',
            'gender' => 'female',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>  $userBirthDate,
            'personal_number' => '0410999788932',
            'phone_number' => '0613000896',
            'picture' => asset('storage/profile_pictures/N0126ejhjrxZmhZCdMYnxVYmlEplFMgLh0ZpD0SE.jpg'),
        ]);

        $user = User::factory()->create([
            'name' => 'Kristina Milentijevic Korisnik',
            'email' => 'kristina.milentijevic13@323gmail.com',
            'role' => 'korisnik',
            'gender' => 'female',
            'place_of_birth' => 'Novi Pazar',
            'country' => 'Serbia',
            'birth_date' =>   $userBirthDate,
            'personal_number' => '0410999788932',
            'phone_number' => '0613000896',
            'picture' => asset('storage/profile_pictures/N0126ejhjrxZmhZCdMYnxVYmlEplFMgLh0ZpD0SE.jpg'),
        ]);

        // Courses::factory(6)->create([
        //     'user_id' => $user->id
        // ]);

        Themes::create([
            'title' => 'Laravel Senior Developer',
            'user_id'=> $user->id,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'image' => 'image'
        ]);

        Themes::create([
            'title' => 'Full-Stack Engineer',
            'user_id'=> $user->id,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'image' => 'image'
        ]);


    }
}
