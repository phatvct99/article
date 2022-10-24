<?php

namespace App\Http\Controllers\backend\crawl;

use App\Models\Website;
use Illuminate\Http\Request;

class WebsitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $websites = Website::where('dlt_flg', 0)->orderBy('id', 'DESC')->paginate(10);

        return view('crawl.dashboard.website.index')->withWebsites($websites);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crawl.dashboard.website.create');
    }

    public function add(Request $request)
    {
        $this->InsertOrUpdate($request);
        return redirect()->route('backend.websites.index')->with('status', 'Thêm thành công!');
    }

    public function update(Request $request, $id)
    {
        $this->InsertOrUpdate($request, $id);
        return redirect()->route('backend.websites.index')->with('status', 'Cập nhật thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('crawl.dashboard.website.edit')->withWebsite(Website::find($id));
    }

    public function InsertOrUpdate(Request $request, $id = '')
    {
        //Debugbar::disable();
        $code = 1;
        try {
            $website = new Website();

            if ($id) {
                $website = Website::find($id);
            }
            $website->title = $request->title;

            $website->url = $request->url;
            $website->save();
        } catch (Exception $exception) {
            return $code = 0;
        };
        return $code;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $article = Website::find($id);

        if (!$article) return;

        $article->dlt_flg = 1;
        $article->save();
        return redirect()->route('backend.websites.index')->with('status', 'Xóa thành công!');
    }
}
