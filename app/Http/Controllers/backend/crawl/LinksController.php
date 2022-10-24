<?php

namespace App\Http\Controllers\backend\crawl;

use App\Models\Category;
use App\Models\ItemSchema;
use App\Lib\Scraper;
use App\Models\Link;
use App\Models\Website;
use Illuminate\Http\Request;
use Goutte\Client;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::where('dlt_flg', 0)->orderBy('id', 'DESC')->paginate(100);

        $itemSchemas = ItemSchema::where('dlt_flg', 0)->get();

        return view('crawl.dashboard.link.index')->withLinks($links)->withItemSchemas($itemSchemas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('dlt_flg', 0)->get();
        $websites = Website::where('dlt_flg', 0)->get();

        return view('crawl.dashboard.link.create')->withCategories($categories)->withWebsites($websites);
    }

    public function add(Request $request)
    {
        $this->InsertOrUpdate($request);
        return redirect()->route('backend.links.index')->with('status', 'Thêm thành công!');
    }

    public function update(Request $request, $id)
    {
        $this->InsertOrUpdate($request, $id);
        return redirect()->route('backend.links.index')->with('status', 'Cập nhật thành công!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
            'main_filter_selector' => 'required',
            'website_id' => 'required',
            'category_id' => 'required'
        ]);

        $link = new Link;

        $link->url = $request->input('url');

        $link->main_filter_selector = $request->input('main_filter_selector');

        $link->website_id = $request->input('website_id');

        $link->category_id = $request->input('category_id');

        $link->save();

        return redirect()->route('links.index');
    }

    public function InsertOrUpdate(Request $request, $id = '')
    {
        $code = 1;
        try {
            $link = new Link();

            if ($id) {
                $link = Link::find($id);
            }
            $link->url = $request->url;

            $link->main_filter_selector = $request->main_filter_selector;

            $link->website_id = $request->website_id;

            $link->category_id = $request->category_id;
            // dd($link);
            $link->save();
        } catch (Exception $exception) {
            return $code = 0;
        };
        return $code;
    }


    public function edit($id)
    {
        $categories = Category::where('dlt_flg', 0)->get();
        $websites = Website::where('dlt_flg', 0)->get();
        return view('crawl.dashboard.link.edit')->withLink(Link::find($id))->withCategories($categories)->withWebsites($websites);
    }


    public function delete($id, Request $request)
    {
        $cat = Link::find($id);

        if (!$cat) return;

        $cat->dlt_flg = 1;
        $cat->save();

        return redirect()->route('backend.links.index')->with('status', 'Xóa thành công!');
    }


    /**
     * @param Request $request
     */
    public function setItemSchema(Request $request)
    {
        if (!$request->item_schema_id && !$request->link_id)
            return;

        $link = Link::find($request->link_id);

        $link->item_schema_id = $request->item_schema_id;

        $link->save();

        return response()->json(['msg' => 'Link updated!']);
    }


    /**
     * scrape specific link
     *
     * @param Request $request
     */
    public function scrape(Request $request)
    {
        if (!$request->link_id)
            return;

        $link = Link::find($request->link_id);

        if (empty($link->main_filter_selector) && (empty($link->item_schema_id) || $link->item_schema_id == 0)) {
            return;
        }

        $scraper = new Scraper(new Client());

        $scraper->handle($link);

        if ($scraper->status == 1) {
            return response()->json(['status' => 1, 'msg' => 'Scraping done']);
        } else {
            return response()->json(['status' => 2, 'msg' => $scraper->status]);
        }
    }
}
