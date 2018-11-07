<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = [
            ['name' => str_random(10), 'password' => bcrypt('123456789'), 'email'=> str_random(20)],
            
        ];
        // chay seed nay cho anh

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
