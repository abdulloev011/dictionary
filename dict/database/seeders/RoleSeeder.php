<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ['role' => 'Администратор'],
            ['role' => 'Пользователь'],
        ];
        foreach ($role as $r){
            DB::table('roles')->insert($r);
        }
    }
}
