<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use TPerformant\API\HTTP\Affiliate;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports products from the 2performant network';

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

        $me = new Affiliate('bogdan.izdrail@gmail.com', 'garcelino87#'); // fill in with your own credentials

        //affiliate product feed id
        $productFeeds = $me->getProductFeeds();

        $products = collect([]);

        foreach ($productFeeds as $feed){

            foreach ($feed->products() as $product){

                $products->push($product);

            }


        }

        dd($products);


    }
}
