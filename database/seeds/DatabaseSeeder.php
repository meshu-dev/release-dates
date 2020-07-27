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
	    // Disable all mass assignment restrictions
	    Model::unguard();
	 
	    $this->call(ReleasesTableSeeder::class);
	 
	    // Re enable all mass assignment restrictions
	    Model::reguard();
    }
}
