<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          [
            'name' => 'Manager',
            'email' => 'root@root.com',
            'role' => '2',
            'role_type' => 'MAN',
            'password' => bcrypt('rootroot'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'name' => 'Chassier',
            'email' => 'kasir@gmail.com',
            'role' => '1',
            'role_type' => 'CAS',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ],
          [
            'name' => 'Costumer',
            'email' => 'costumer@gmail.com',
            'role' => '2',
            'role_type' => 'COS',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
          ]
      ]);
  }
}
