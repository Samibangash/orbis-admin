<?php

namespace Database\Seeders;

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
        DB::table('users')->delete();
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@orbis.com',
                'password' => '$2y$10$Jyt60MtBo3TxjsizCeLwFeTa1oDhg1WvM.uz20zP2QWtALghY2dh.', // admin@123
                'phone_number' => '03212781041',
                'role_id' => 1,
                'department_id' => 1,
                'status' => 1,
                'created_by' => 1
            ]
        ];
        DB::table('users')->insert($users);
    }
}
