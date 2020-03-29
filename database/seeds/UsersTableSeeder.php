<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>'123456','first_name'=>'admin', 'last_name' => 'Sela', 'address'=>'Hà Nội','phone'=>'039595444','level'=>1],
            ['id'=>2,'email'=>'sales@gmail.com','password'=>'123456','first_name'=>'Huy', 'last_name' => 'Nguyễn Văn','address'=>'Hà Nội','phone'=>'039595444','level'=>2]
        ]);
    }
}
