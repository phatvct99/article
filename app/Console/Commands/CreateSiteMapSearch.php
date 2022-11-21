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

class CreateSiteMapSearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemapsearch:create';

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
        $sitemap = App::make('sitemap');
        // counters
        $counter = 0;
        $sitemapCounter = 0;

        $business = Business::distinct()->select('chairman')->whereNotNull('chairman')->get();
        // foreach ($business as $bus) {
        //     dump(urlencode($bus->chairman));
        // }
        foreach ($business as $bus) {
            if ($counter == 45000) {
                // generate new sitemap file
                $sitemap->store('xml', 'sitemap-search-' . $sitemapCounter);
                // add the file to the sitemaps array
                $sitemap->addSitemap(secure_url('sitemap-search-' . $sitemapCounter . '.xml'));
                // reset items array (clear memory)
                $sitemap->model->resetItems();
                // reset the counter
                $counter = 0;
                // count generated sitemap
                $sitemapCounter++;
            }

            $sitemap->add(URL::to('tra-cuu?search='. urlencode($bus->chairman)), '2022-11-17T08:00:52+00:00', 0.64);
            // count number of elements
            $counter++;
        }
        if (!empty($sitemap->model->getItems())) {
            // generate sitemap with last items
            $sitemap->store('xml', 'sitemap-search-' . $sitemapCounter);
            // add sitemap to sitemaps array
            $sitemap->addSitemap(secure_url('sitemap-search-' . $sitemapCounter . '.xml'));
            // reset items array
            $sitemap->model->resetItems();
        }

        $sitemap->store('sitemapindex', 'sitemap_search');
        //this will generate file mysitemap.xml to your public folder
        dump(count($business));
        dump("Create Sitemap Success");
    }
}
