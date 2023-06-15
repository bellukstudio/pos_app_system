<?php

namespace Database\Seeders;

use App\Models\MasterUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account = [
            [
                "fullName" => "SuperAdmin",
                "email" => "posapp@gmail.com",
                "password" => Hash::make("superadminposapp"),
                "rolesId" => 1
            ]
        ];

        foreach ($account as $value) {
            MasterUser::create($value);
        }
    }
}
