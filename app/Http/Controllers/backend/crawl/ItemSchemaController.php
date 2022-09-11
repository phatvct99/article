<?php

namespace App\Http\Controllers\backend\crawl;

use App\Models\ItemSchema;
use Illuminate\Http\Request;

class ItemSchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemSchema = ItemSchema::where('dlt_flg', 0)->orderBy('id', 'DESC')->paginate(10);

        return view('crawl.dashboard.item_schema.index')->withItemSchemas($itemSchema);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crawl.dashboard.item_schema.create');
    }

    public function add(Request $request)
    {
        $this -> InsertOrUpdate($request);
        return redirect()->route('backend.item-schema.index')->with('status', 'Thêm thành công!');
    }

    public function update(Request $request, $id)
    {
        $this -> InsertOrUpdate($request, $id);
        return redirect()->route('backend.item-schema.index')->with('status', 'Cập nhật thành công!');
    }

    public function InsertOrUpdate (Request $request, $id = '')
    {
        //Debugbar::disable();
        $code=1;
        try{
            $itemSchema = new ItemSchema();

            if ($id)
            {
                $itemSchema = ItemSchema::find($id);
            }
            $itemSchema->title = $request->title;

            if($request->is_full_url != null) {
    
                $itemSchema->is_full_url = 1;
            } else {
                $itemSchema->is_full_url = 0;
            }
    
            $itemSchema->css_expression = $request->css_expression;
    
            $itemSchema->full_content_selector = $request->full_content_selector;
             //dd($posts);
            $itemSchema -> save();
        }
        catch(Exception $exception)
        {
            return $code = 0;
        };
        return $code;
    }


    public function edit($id)
    {
        return view('crawl.dashboard.item_schema.edit')->withItemSchema(ItemSchema::find($id));
    }

    public function delete($id, Request $request)
    {
        $itemSchema = ItemSchema::find($id);

        if(!$itemSchema) return;

        $itemSchema->dlt_flg = 1 ;
        $itemSchema -> save();

        return redirect()->route('backend.item-schema.index')->with('status', 'Xóa thành công!');
    }
}
