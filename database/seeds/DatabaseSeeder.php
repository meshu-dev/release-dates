<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    // Disable mass assignment restrictions
	    Model::unguard();
	 
	 	$this->call(UsersTableSeeder::class);
	    $this->call(ReleasesTableSeeder::class);
	 
	    // Enable mass assignment restrictions
	    Model::reguard();
    }
}
