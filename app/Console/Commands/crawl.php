<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use App\Constant;
use App\Models\Company;
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
        'https://hosocongty.vn/nam-2000',
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
        //$client = new Client(HttpClient::create(['timeout' => 1]));
        try {
            foreach ($this->category as $category) {
                print ("lay cua danh muc " . $category) . "\n";
                for ($i = 1; $i < 1562; $i++) {
                    print ("--------------------------lay cua trang " . $i . "--------------------------") . "\n";
                    $crawler = $this->client->request('GET', 'https://hosocongty.vn/nam-2002/page-' . $i);
                    sleep(1);
                    $linkPost = $crawler->filter('h3 a')->each(function ($node) {
                        return $node->attr("href");
                    });
                    ///dump($linkPost);
                    foreach ($linkPost as $link) {
                        $l = "https://hosocongty.vn/" . $link;
                        self::crawlPost($l);
                    }
                }
            }
        } catch (\Exception $ex) {
            $this->status = $ex->getMessage();
        }
    }

    public function crawlPost($url)
    {
        $crawler = $this->client->request('GET', $url);

        $companyName = $crawler->filter('ul.hsdn li h1')->each(function ($node) {
            return $node->text();
        });
        if (isset($companyName[0])) {
            $companyName = $companyName[0];
        }

        $companyProfile = $crawler->filter('ul.hsdn li div')->each(function ($node) {
            return $node->text();
        });
        if (isset($companyProfile[0])) {
            $companyProfile = $companyProfile[0];
        }

        $companyDescription = $crawler->filter('ul.hsdn li')->eq(1)->each(function ($node) {
            return $node->text();
        });
        if (isset($companyDescription[0])) {
            $companyDescription = $companyDescription[0];
        }

        //business
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

        try{
            if(!empty($companyDescription)){
                $name = preg_match($patternName, $companyDescription, $nameCompany);
            }
            $tax = preg_match($patternTax, $companyProfile, $taxCompany);
            $address = preg_match($patternAddress, $companyProfile, $addressCompany);
            $name = preg_match($patternName, $companyDescription, $nameCompany);
            $dt = preg_match($patternDate, $companyDescription, $dateCompany);
            $phone = preg_match($patternPhone, $companyDescription, $phoneCompany);
            $business = preg_match($patternBusiness, $companyDescription, $nameBusiness);
            $status = preg_match($patternStatus, $companyDescription, $nameStatus);

            if (isset($nameBusiness[2])) {
                $nameBusiness = $nameBusiness[2];
            }else{
                $nameBusiness = NULL;
            }

            if (isset($nameStatus[2])) {
                $nameStatus = $nameStatus[2];
            }else{
                $nameStatus = NULL;
            }

            if (isset($nameCompany[2])) {
                $nameCompany = $nameCompany[2];
            }else{
                $nameCompany = NULL;
            }

            if (isset($addressCompany)) {
                $addressCompany = $addressCompany[2];
            }else{
                $addressCompany = NULL;
            }

            if (isset($taxCompany[0])) {
                $taxCompany = $taxCompany[0];
            }else{
                $taxCompany = NULL;
            }

            if (isset($phoneCompany[0])) {
                $phoneCompany = $phoneCompany[0];
            }else{
                $phoneCompany = NULL;
            }

            if (isset($dateCompany[0])) {
                $dateCompany = $dateCompany[0];
            }else{
                $dateCompany = NULL;
            }

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
        Company::create($data);
        print("Import database thanh cong!" . "\n");
        dump($taxCompany);
        // dump($addressCompany);
        // dump($nameCompany);
        // dump($nameBusiness);
        // dump($slug);
        // dump($nameStatus);
        }catch (\Exception $ex) {
            $this->status = $ex->getMessage();
        }
    }
}