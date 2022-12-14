<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Exception;

class BusinessController extends Controller
{
    public function index()
    {

        try {
            $company = Business::select('chairman', 'tax', 'address', 'slug', 'name')->orderBy('id', 'DESC')->paginate(20);

            // SEO
            SEOMeta::setTitle('Tra cứu mã số thuế, thông tin công ty, doanh nghiệp toàn quốc | KinhteZ');
            SEOMeta::setDescription('Tra cứu mã số thuế của doanh nghiệp, hồ sơ công ty tra cứu mã số thuế cá nhân, tra cứu mã số thuế trên facebook, zalo. Tin tức về thuế, kế toán và doanh nghiệp.');
            SEOMeta::addKeyword('Tra cứu mã số thuế, Tra cứu thông tin doanh nghiệp, Tra cứu doanh nghiêp, Tra cứu công ty, Hồ Sơ công ty, MST công ty, KinhteZ');
            OpenGraph::setDescription('Tra cứu mã số thuế của doanh nghiệp, hồ sơ công ty tra cứu mã số thuế cá nhân, tra cứu mã số thuế trên facebook, zalo. Tin tức về thuế, kế toán và doanh nghiệp.');
            OpenGraph::setTitle('Tra cứu mã số thuế, thông tin công ty, doanh nghiệp toàn quốc | KinhteZ');
            OpenGraph::setUrl('https://kinhtez.com/tra-cuu-doanh-nghiep');

            $viewData = [
                'company' => $company,
                //'query' => $posts->query()
            ];
            return view('frontend.company.index', $viewData);
        } catch (Exception $e) {

            return response()->view('frontend.container.404', [], 404);
        }
    }

    public function detail($tax, $slug)
    {

        try {
            $company = Business::select('*')->where('tax', $tax)
                ->where('slug', $slug)->first();
            // SEO
            SEOMeta::setTitle('Mã số thuế ' . $company->tax . ' - ' . $company->name);
            SEOMeta::setDescription($company->tax . ', ' . $company->name . ', Địa chỉ ' . $company->address . ' chủ doanh nghiệp ' . $company->chairman . ', số điện thoại' . $company->phone);
            SEOMeta::addKeyword($company->tax . ', ' . $company->name . ', ' . $company->address . ', ' . $company->chairman . ', ' . $company->phone . ', tra cứu mã số thuế');
            OpenGraph::setDescription($company->tax . ', ' . $company->name . ', Địa chỉ ' . $company->address . ' chủ doanh nghiệp ' . $company->chairman . ', số điện thoại' . $company->phone);
            OpenGraph::setTitle('Mã số thuế ' . $company->tax . ' - ' . $company->name);
            OpenGraph::setUrl('https://kinhtez.com/tra-cuu-doanh-nghiep-' . $company->tax . '-' . $company->slug);

            $companyRelate = Business::orderBy('date', 'DESC')
                ->take(400)
                ->get()
                ->random(20);
            $viewData = [
                'company' => $company,
                'address' => urlencode($company->address),
                'companyRelate' => $companyRelate,
            ];

            return view('frontend.company.detail', $viewData);
        } catch (Exception $e) {

            return response()->view('frontend.container.404', [], 404);
        }
    }

    public function search(Request $request)
    {
        try {
            $search = $request->input('search');
            if (strlen($search) == 10 && is_numeric($search)) {
                $business = Business::select('chairman', 'tax', 'address', 'slug', 'name')->where('tax', $search)->get();
                SEOMeta::setTitle('Tra cứu mã số thuế ' . $search . ', thông tin công ty, doanh nghiệp toàn quốc | KinhteZ');
                OpenGraph::setTitle('Tra cứu mã số thuế ' . $search . ', thông tin công ty, doanh nghiệp toàn quốc | KinhteZ');
            } else {
                $business = Business::query()->select('chairman', 'tax', 'address', 'slug', 'name')
                    ->Where('name', 'LIKE', "{$search}%")
                    ->orWhere('chairman', 'LIKE', "{$search}%")->get();
                SEOMeta::setTitle('Tra cứu tên công ty của ' . $search . ', thông tin doanh nghiệp toàn quốc | KinhteZ');
                OpenGraph::setTitle('Tra cứu tên công ty của ' . $search . ', thông tin doanh nghiệp toàn quốc | KinhteZ');
            }

                // SEO
                SEOMeta::setDescription('Tra cứu mã số thuế ' . $search . ' của doanh nghiệp, hồ sơ công ty tra cứu mã số thuế cá nhân, tra cứu mã số thuế trên facebook, zalo. Tin tức về thuế, kế toán và doanh nghiệp.');
                SEOMeta::addKeyword('Tra cứu mã số thuế, tra cuu ma so thue, Tra cứu doanh nghiêp, Tra cứu công ty, tra cuu cong ty, MST công ty, KinhteZ');
                OpenGraph::setDescription('Tra cứu mã số thuế của doanh nghiệp, hồ sơ công ty tra cứu mã số thuế cá nhân, tra cứu mã số thuế trên facebook, zalo. Tin tức về thuế, kế toán và doanh nghiệp.');
                OpenGraph::setUrl('https://kinhtez.com/tra-cuu-doanh-nghiep?search=' . $search);

            $viewData = [
                'company' => $business,
                //'query' => $posts->query()
            ];
            //dd($business);
            return view('frontend.company.search', $viewData);
        } catch (Exception $e) {

            return response()->view('frontend.container.404', [], 404);
        }
    }
}
