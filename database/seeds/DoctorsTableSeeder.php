<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'name' => 'mustafa',
            'email' => 'doctor@doctor.com',
            'password' => Hash::make('12341234'),
        ]);
    }
}
