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
            '2',
            '088223738702',
            'ahmadzaky@gmail.com',
            '/razky_samples/ahmad_zaky.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Kiko Mizuhara",
            "2",
            '088223738703',
            'kiko@gmail.com',
            '/razky_samples/kiko_mizu.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Sandhika Galih",
            "2",
            '088223738704',
            'sandhika@gmail.com',
            '/razky_samples/sandhika.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Eko Khannedy",
            "2",
            '088223738705',
            'khannedy@gmail.com',
            '/razky_samples/ek_khannedy.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Shantika Sandyakala",
            "2",
            '088223738706',
            'shantika@gmail.com',
            '/razky_samples/santhika.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Clarissa Divya",
            "2",
            '088223738707',
            'clarissa@gmail.com',
            '/razky_samples/santhika.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Marta Klyrova",
            "2",
            '088223738708',
            'marta@gmail.com',
            '/razky_samples/marta_klyrova.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Yua Sakura",
            "2",
            '088223738709',
            'yua_sakura@gmail.com',
            '/razky_samples/yua_sakura.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            "Manyunyu",
            "3",
            '088223738709',
            'manyunyu@gmail.com',
            '/razky_samples/manyunyu.jpg',
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
