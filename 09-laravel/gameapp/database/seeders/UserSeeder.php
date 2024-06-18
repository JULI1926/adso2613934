<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Using ORM Eloquent
        $user = new User;
        $user->document = 1053849706;
        $user->fullname = 'John Wick';
        $user->gender = 'Male';
        $user->birthdate = '1988-10-07';
        $user->phone = '3100000001';
        $user->email = 'jhonwick@gmail.com';
        $user->password = bcrypt("micontraseña");
        $user->role = 'Administrator';
        $user->save();


        $user = new User;
        $user->document = 1053849707;
        $user->fullname = 'Oscar Aristizabal';
        $user->gender = 'Male';
        $user->birthdate = '1981-10-17';
        $user->phone = '3100000002';
        $user->email = 'jhonw@gmail.com';
        $user->password = bcrypt("12345");
        $user->role = 'Administrator';
        $user->save();

        //Usinf BB Array
        DB::table('users')->insert([
            'document' => 750000002,
            'fullname' => 'Alanis Morrisete',
            'gender' => 'Female',
            'birthdate' => '1970-05-10',
            'phone' => '3100000003',
            'email' => 'alanism@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'customer',
            'created_at' => now(),
            'updated_at' => now()

        ]);

    }
}
