<?php

use Illuminate\Database\Seeder;
use App\Event;

class CreateEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = [
    		[
    			'name' => 'Seminar Nasional',
    			'price' => 300000,
    		],
    		[
    			'name' => 'Malam Inaugurasi Pamong Praja',
    			'price' => 150000,
    		],
    		[
    			'name' => 'Fun Run',
    			'price' => 200000,
    		],
    		[
    			'name' => 'Seminar Nasional dan Malam Inaugurasi Pamong Praja',
    			'price' => 400000,
    		],
    		[
    			'name' => 'Seminar Nasional dan Fun Run',
    			'price' => 450000,
    		],
    		[
    			'name' => 'Malam Inaugurasi Pamong Praja dan Fun Run',
    			'price' => 325000,
    		],
    		[
    			'name' => 'Paket Lengkap',
    			'price' => 550000,
    		],
    	];

    	foreach ($event as $key => $value)
    	{
    		Event::create($value);
    	}
    }
}
