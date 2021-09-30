<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->insertUser(
            'Muhammad Firriezky',
            '1',
            '088223738709',
            'firriezky@gmail.com',
            '/razky_samples/firriezky.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Raffey Cassidy',
            '3',
            '082113530900',
            'cassidy@gmail.com',
            '/razky_samples/cassidy.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Valezka',
            '3',
            '082113530901',
            'valezka@gmail.com',
            '/razky_samples/valezka.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Anya Taylor Joy',
            '3',
            '082113530902',
            'anya@gmail.com',
            '/razky_samples/anya.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Ismi Nur Hidayah',
            '3',
            '082113530903',
            'ismin@gmail.com',
            '/razky_samples/ismi.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Ahmad Zaky',
            '3',
            '088223738702',
            'ahmadzaky@gmail.com',
            '/razky_samples/ahmad_zaky.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Ade Londok",
            "3",
            '088223738703',
            'ade_londok@gmail.com',
            '/razky_samples/ade_londok.jpg',
            bcrypt('password')
        );

    }

    function insertUser(
        $name, $role, $contact, $email, $photo, $password
    )
    {
        $user = new User();
        $user->name = $name;
        $user->role = $role;
        $user->contact = $contact;
        $user->email = $email;
        $user->photo = $photo;
        $user->password = $password;
        $user->save();
    }
}
