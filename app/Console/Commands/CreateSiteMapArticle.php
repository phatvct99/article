<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\APP;
use App\Models\Business;
use App\Models\Article;
use App\Models\News;
use Goutte;
use App\Constant;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Str;

class CreateSiteMapArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:article';

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
    public function __construct(Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    protected $client;
    public $results = [];

    public $savedItems = 0;

    public $status = 1;


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // create new sitemap object
        $sitemap = App::make('sitemap');
        // counters
        $counter = 0;
        $sitemapCounter = 0;

        try {

            print ("Start ") . "\n";

            $crawler = $this->client->request('GET', 'https://www.kinhtez.com/muc-luc-tin-tuc');
            sleep(0.3);
            $linkPost = $crawler->filter('a')->each(function ($node) {
                return $node->attr("href");
            });

            // dump($linkPost);
            foreach ($linkPost as $link) {
                dump($link);
                if ($counter == 50000) {
                    // generate new sitemap file
                    $sitemap->store('xml', 'sitemap-article-' . $sitemapCounter);
                    // add the file to the sitemaps array
                    $sitemap->addSitemap(secure_url('sitemap-article-' . $sitemapCounter . '.xml'));
                    // reset items array (clear memory)
                    $sitemap->model->resetItems();
                    // reset the counter
                    $counter = 0;
                    // count generated sitemap
                    $sitemapCounter++;
                }
    
                $sitemap->add($link, '2022-11-20T08:00:52+00:00', 0.9);
                // count number of elements
                $counter++;

            }

            if (!empty($sitemap->model->getItems())) {
                // generate sitemap with last items
                $sitemap->store('xml', 'sitemap-article-' . $sitemapCounter);
                // add sitemap to sitemaps array
                $sitemap->addSitemap(secure_url('sitemap-article-' . $sitemapCounter . '.xml'));
                // reset items array
                $sitemap->model->resetItems();
            }
    
            $sitemap->store('xml', 'sitemap_article');
            //this will generate file mysitemap.xml to your public folder
            dump("Create Sitemap Success");

            // self::arrayMerge();
        } catch (\Exception $ex) {
            $this->status = $ex->getMessage();
        }
    }
}
