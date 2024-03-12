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

//    case 4: return "Warehouse";
//    case 3: return "Staff";
//    case 2 : return "Commercial";
        $this->insertUser(
            'User Admin',
            '1',
            '088223738709',
            'admin@gmail.com',
            '/razky_samples/firriezky.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'User Commercial',
            '2',
            '082113530900',
            'commercial@gmail.com',
            '/razky_samples/cassidy.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'Customer',
            '3',
            '082113530901',
            'customer@gmail.com',
            '/razky_samples/valezka.jpg',
            bcrypt('password')
        );

        $this->insertUser(
            'User Warehouse',
            '4',
            '082113530902',
            'warehouse@gmail.com',
            '/razky_samples/anya.jpg',
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
