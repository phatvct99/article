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

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

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
     * @return int
     */
    public function handle()
    {
        // create new sitemap object
        // create new sitemap object
        $sitemap = App::make('sitemap');

        // get all products from db (or wherever you store them)
        $article = Article::all();

        //dd($products);
        // counters
        $counter = 0;
        $sitemapCounter = 0;

        // add every product to multiple sitemaps with one sitemap index
        foreach ($article as $p) {
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

            // add product to items array
            $sitemap->add(URL::to('tin-tuc-'.$p ->slug), $p->updated_at, 0.8, 'daily');
            // count number of elements
            $counter++;
        }
        // you need to check for unused items
        if (!empty($sitemap->model->getItems())) {
            // generate sitemap with last items
            $sitemap->store('xml', 'sitemap-article-' . $sitemapCounter);
            // add sitemap to sitemaps array
            $sitemap->addSitemap(secure_url('sitemap-article-' . $sitemapCounter . '.xml'));
            // reset items array
            $sitemap->model->resetItems();
        }

        $business = Business::all();
        foreach ($business as $bus) {
            if ($counter == 50000) {
                // generate new sitemap file
                $sitemap->store('xml', 'sitemap-business-' . $sitemapCounter);
                // add the file to the sitemaps array
                $sitemap->addSitemap(secure_url('sitemap-business-' . $sitemapCounter . '.xml'));
                // reset items array (clear memory)
                $sitemap->model->resetItems();
                // reset the counter
                $counter = 0;
                // count generated sitemap
                $sitemapCounter++;
            }

            // add product to items array
            $sitemap->add(URL::to('tra-cuu-doanh-nghiep-'.$bus ->tax.'-'.$bus ->slug), $p->updated_at, 0.8, 'daily');
            // count number of elements
            $counter++;
        }
        // you need to check for unused items
        if (!empty($sitemap->model->getItems())) {
            // generate sitemap with last items
            $sitemap->store('xml', 'sitemap-business-' . $sitemapCounter);
            // add sitemap to sitemaps array
            $sitemap->addSitemap(secure_url('sitemap-business-' . $sitemapCounter . '.xml'));
            // reset items array
            $sitemap->model->resetItems();
        } 
        $sitemap->store('sitemapindex', 'sitemap');
        // this will generate file mysitemap.xml to your public folder
        dump("Create Sitemap Success");
    }
}