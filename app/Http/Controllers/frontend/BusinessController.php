<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BusinessController extends Controller
{
    public function index(){
        $company = Business::orderBy('date', 'DESC')->paginate(20);

        $viewData = [
            'company' => $company,
            // 'query' => $posts->query()
        ];
        //dd($slug);
        return view('frontend.company.index',$viewData);
    }

    public function detail($tax, $slug){

        $company = Business::where('tax', $tax)
                            ->where('slug', $slug)->first();
        $companyRelate = Business::orderBy('date', 'DESC')->take(20)->get();
        $viewData = [
            'company' => $company,
            'address' => urlencode($company->address),
            'companyRelate' => $companyRelate,
        ];
        // dd($companyRelate);
        return view('frontend.company.detail',$viewData);
    }

    public function search(Request $request){

        $search = $request->input('search');
        $business = Business::query()->where('tax','LIKE', "%{$search}%")
                    ->orWhere('name','LIKE', "%{$search}%")
                    ->orWhere('chairman','LIKE', "%{$search}%")->get();
        $viewData = [
            'company' => $business,
            // 'query' => $posts->query()
        ];
        //dd($business);
        return view('frontend.company.search',$viewData);

    }
}
