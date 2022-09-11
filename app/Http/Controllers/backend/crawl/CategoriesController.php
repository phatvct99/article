<?php

namespace App\Http\Controllers\backend\crawl;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::where('dlt_flg', 0)->orderBy('id', 'DESC')->paginate(10);
        return view('crawl.dashboard.category.index')->withCategories($cats);
    }

    public function create()
    {
        return view('crawl.dashboard.category.create');
    }

    public function add(Request $request)
    {
        $this -> InsertOrUpdate($request);
        return redirect()->route('backend.categories.index')->with('status', 'Thêm thành công!');
    }

    public function update(Request $request, $id)
    {
        $this -> InsertOrUpdate($request, $id);
        return redirect()->route('backend.categories.index')->with('status', 'Cập nhật thành công!');
    }

    public function edit($id)
    {
        return view('crawl.dashboard.category.edit')->withCategory(Category::find($id));
    }


    public function InsertOrUpdate (Request $request, $id = '')
    {
        //Debugbar::disable();
        $code=1;
        try{
            $cat = new Category();

            if ($id)
            {
                $cat = Category::find($id);
            }
            $cat -> title = $request->title;
            $cat -> slug = Str::slug($request->title, '-');
             //dd($posts);
            $cat -> save();
        }
        catch(Exception $exception)
        {
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
    public function delete($id, Request $request)
    {
        $cat = Category::find($id);
        //dd($cat->id);
        if(!$cat) return;
        if($cat->id < 7) {
            return redirect()->route('backend.categories.index')->with('status', 'Không được xóa doanh mục này');
        }

        $cat->dlt_flg = 1 ;
        $cat -> save();

        return redirect()->route('backend.categories.index')->with('status', 'Xóa thành công!');
    }

}
