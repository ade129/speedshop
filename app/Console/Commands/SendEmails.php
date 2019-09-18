<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Models\Address;
use DB;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:address';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
         * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
    public function create()
    {
        $faker = Faker::create('App\Models\Address');
        $count = 0;
        for($i = 1 ; $i <= 100 ; $i++ ){
            DB::table('address')->insert([
                'name' => $faker->name,
                'alamat' => $faker->address,
                'nomortelepon' => $faker->tollFreePhoneNumber,
                'kodepos' => $faker->tollFreePhoneNumber,
                'kelurahan' => $faker->company,
                'kecamatan' => $faker->company,
                'kota' => $faker->company,
            
        	// 'created_at' => \Carbon\Carbon::now(),
        	// 'Updated_at' => \Carbon\Carbon::now(),
        ]);
        echo $count++ .'<br>';
        }
    }

}
