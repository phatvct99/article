<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use App\Constant;
use App\Models\Company;
use App\Models\Business;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Carbon\Carbon;
use Illuminate\Support\Str;

class crawl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $category = [
        'https://hosocongty.vn/nam-2004',
    ];
    protected $client;
    public $results = [];

    public $savedItems = 0;

    public $status = 1;

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

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            foreach ($this->category as $category) {
                print ("lay cua danh muc " . $category) . "\n";
                for ($i = 1000; $i < 2000; $i++) {
                    print ("--------------------------lay cua trang " . $i . "--------------------------") . "\n";
                    $crawler = $this->client->request('GET', 'https://hosocongty.vn/nam-2016/page-' . $i);
                    sleep(0.3);
                    $linkPost = $crawler->filter('h3 a')->each(function ($node) {
                        return $node->attr("href");
                    });

                    // dump($linkPost);
                    foreach ($linkPost as $link) {
                        dump($link);
                        $l = "https://hosocongty.vn/" . $link;
                        self::crawlPost($l);
                    }
                }
            }
            // self::arrayMerge();
        } catch (\Exception $ex) {
            $this->status = $ex->getMessage();
        }
    }

    public function crawlPost($url)
    {
        $crawler = $this->client->request('GET', $url);

        $companyName = $crawler->filter('ul.hsct li h1')->each(function ($node) {
            return $node->text();
        });
        if (isset($companyName[0])) {
            $companyName = $companyName[0];
        }
        // dump($companyName);

        $companyProfile = $crawler->filter('ul.hsct')->eq(1)->each(function ($node) {
            return $node->text();
        });
        if (isset($companyProfile[0])) {
            $companyProfile = $companyProfile[0];
        }
        // dump($companyProfile);

        //Mã số thuế
        $mst = $crawler->filter('ul.hsct li')->eq(2)->each(function ($node) {
            return $node->text();
        });
        $mst = isset($mst[0]) ? $mst[0] : NULL;
        // dump($mst);

        //Đại diện pháp luật
        $ddpl = $crawler->filter('ul.hsct li')->eq(4)->each(function ($node) {
            return $node->text();
        });
        $ddpl = isset($ddpl[0]) ? $ddpl[0] : NULL;
        // dump($ddpl);

        $companyDescription = $crawler->filter('ul.hsct')->eq(2)->each(function ($node) {
            return $node->text();
        });
        $companyDescription = isset($companyDescription[0]) ? $companyDescription[0] : NULL;
        // dump($companyDescription);


        // //business
        $business = $crawler->filter('ul.nnkd')->each(function ($node) {
            return $node->text();
        });
        if (isset($business[0])) {
            $business = $business[0];
        }

        $patternTax = Constant::REGEX_TAX;
        $patternAddress = Constant::REGEX_ADDRESS_COMPANY;
        $patternName = Constant::REGEX_NAME_COMPANY;
        $patternDate = Constant::REGEX_DATE;
        $patternPhone = Constant::REGEX_PHONE;
        $patternBusiness = Constant::REGEX_NAME_BUSINESS;
        $patternStatus = Constant::REGEX_NAME_STATUS;

        try {
            if (!empty($companyDescription)) {
                $name = preg_match($patternName, $companyDescription, $nameCompany);
            }
            if (!empty($companyProfile)) {
                $tax = preg_match($patternTax, $companyProfile, $taxCompany);
            }
            $address = preg_match($patternAddress, $companyProfile, $addressCompany);
            $name = preg_match($patternName, $companyDescription, $nameCompany);
            $dt = preg_match($patternDate, $companyDescription, $dateCompany);
            $phone = preg_match($patternPhone, $companyDescription, $phoneCompany);
            $business = preg_match($patternBusiness, $companyDescription, $nameBusiness);
            $status = preg_match($patternStatus, $companyDescription, $nameStatus);

            $nameBusiness = isset($nameBusiness[2]) ? $nameBusiness[2] : NULL;
            $nameStatus = isset($nameStatus[2]) ? $nameStatus[2] : NULL;
            $nameCompany = isset($nameCompany[2]) ? $nameCompany[2] : NULL;
            $addressCompany = isset($addressCompany[2]) ? $addressCompany[2] : NULL;
            $taxCompany = isset($taxCompany[0]) ? $taxCompany[0] : '1234567890';
            $phoneCompany = isset($phoneCompany[2]) ? $phoneCompany[2] : NULL;
            $dateCompany = isset($dateCompany[0]) ? $dateCompany[0] : NULL;

            //isset($data['excerpt'][$k]) ? $data['excerpt'][$k] : "";

            $date = str_replace('/', '-', $dateCompany);
            $slug = Str::slug($companyName, '-');
            $data = [
                'slug' => $slug,
                'name' => $companyName,
                'tax' => $taxCompany,
                'chairman' => $nameCompany,
                'address' => $addressCompany,
                'phone' => $phoneCompany,
                'date' => date('Y-m-d', strtotime($date)),
                'business' => $nameBusiness,
                'status' => $nameStatus,
            ];
            // Business::create($data);

            print("Import database thanh cong!" . "\n");
            dump($companyName);
            dump($taxCompany);
            dump($nameCompany);
            dump($addressCompany);
            dump($phoneCompany);
            dump($nameBusiness);
            dump($nameStatus);
            dump($date);
        } catch (\Exception $ex) {
            $this->status = $ex->getMessage();
        }
    }
}
