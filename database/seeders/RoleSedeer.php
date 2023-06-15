<?php

namespace Database\Seeders;

use App\Models\MasterRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                'id' => 1,
                "rolesName" => "SuperAdmin",
            ]
        ];

        foreach ($role as $value) {
            MasterRoles::create($value);
        }
    }
}
