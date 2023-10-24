<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 初期ユーザーを作成(反映後は要編集)
        DB::table('users')->insert([
            'name' => '管理者',
            'email' => 'kadoya@kamoy4.com',
            'password' => Hash::make('P@ssw0rd'),
            'remember_token' => Str::random(10),
        ]);
    }
}
