<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class TpuExtractor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extract:tpu {categorie}';

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
        $categorie = $this->argument('categorie');

        for($i = 0; $i < 10; $i++){

            $html  =  file_get_contents("https://www.tpu.ro/{$categorie}/{$i}/");
            $crawler = new Crawler($html);

            $nodeValues = $crawler->filter('span.breakWord')->each(function (Crawler $node, $i) {
                return $node->text();
            });

            dd($nodeValues);

        }
    }
}
