<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'name' => 'Muhammad Firriezky',
            'role' => '1', //1 : admin , 2: staff , 3: user
            'contact' => '088223738709',
            'email' => 'firriezky@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Raffey Cassidy',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '082113530900',
            'email' => 'cassidy@gmail.com',
            "photo" => '/razky_samples/cassidy.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Valezka',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '082113530901',
            'email' => 'valezka@gmail.com',
            "photo" => '/razky_samples/valezka.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Anya Taylor Joy',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '082113530902',
            'email' => 'anya@gmail.com',
            "photo" => '/razky_samples/anya.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Ismi Nur Hidayah',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '082113530903',
            'email' => 'ismin@gmail.com',
            "photo" => '/razky_samples/ade_londok.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Setya Novanto',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '088223738700',
            'email' => 'novanto@gmail.com',
            "photo" => '/razky_samples/setya.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Roma Hurmuzy',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '088223738701',
            'email' => 'romy@gmail.com',
            "photo" => '/razky_samples/ade_londok.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Ahmad Zaky',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '088223738702',
            'email' => 'ahmadzaky@gmail.com',
            "photo" => '/razky_samples/ahmad_zaky.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Ade Londok',
            'role' => '3', //1 : admin , 2: staff , 3: user
            'contact' => '088223738703',
            'email' => 'ade_londok@gmail.com',
            "photo" => '/razky_samples/ade_londok.jpg',
            'password' => bcrypt('password'),
            'created_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->timezone('Asia/Bangkok')->format('Y-m-d H:i:s')
        ]);


    }
}
