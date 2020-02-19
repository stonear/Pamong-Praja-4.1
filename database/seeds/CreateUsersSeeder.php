<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = [
    		[
    			'name'=>'Admin',
    			'email'=>'admin@admin.com',
    			'role'=>'ADMIN',
    			'password'=> bcrypt('admin@admin.com'),

                'sex' => 'L',
                'nationality' => 'Indonesia',
                'id_type' => 'ADMIN',
                'id_number' => 'ADMIN',
                'date_of_birth' => Carbon::parse('1945-08-17'),
                'phone' => '0',
                'community_name' => 'ADMIN',
                'community_type' => 'ADMIN',
                't_shirt' => '-',

                'status' => 'confirmed',
    		],
    	];

    	foreach ($user as $key => $value)
    	{
    		User::create($value);
    	}
    }
}
