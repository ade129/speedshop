<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory as Faker;
use App\Models\Categories;
use DB;

class Categorie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:categorie';

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
        $this->create();
    }
    public function create()
    {
        $faker = Faker::create('App\Models\Categories');
        $count = 0;
        for($i = 1 ; $i <= 100 ; $i++ ){
            DB::table('categories')->insert([
                'name' => $faker->name,
             
                
        	// 'created_at' => \Carbon\Carbon::now(),
        	// 'Updated_at' => \Carbon\Carbon::now(),
        ]);
        echo $count++ .'<br>';
        }

    }
}
