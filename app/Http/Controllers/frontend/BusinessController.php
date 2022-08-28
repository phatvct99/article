<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BusinessController extends Controller
{
    public function index(){
        $company = Company::orderBy('date', 'DESC')->paginate(20);

        $viewData = [
            'company' => $company,
            // 'query' => $posts->query()
        ];
        //dd($slug);
        return view('frontend.company.index',$viewData);
    }

    public function detail($tax, $slug){

        $company = Company::where('tax', $tax)
                            ->where('slug', $slug)->first();
        $companyRelate = Company::orderBy('date', 'DESC')->take(10)->get();
        $viewData = [
            'company' => $company,
            'companyRelate' => $companyRelate,
        ];
        // dd($companyRelate);
        return view('frontend.company.detail',$viewData);
    }
}
