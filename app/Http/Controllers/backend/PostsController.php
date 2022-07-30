<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Http\Requests\RequestPosts;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Article::orderBy('id', 'DESC')->paginate(20);
        $viewData = [
            'posts' => $posts,
            // 'query' => $posts->query()
        ];
        //dd($posts);
        return view('backend.posts.index',$viewData)->withArticles($posts);
    }

    public function create()
    {
        return view('backend.posts.create');
    }

   
    public function store(RequestPosts $requestPost)
    {
        
        $this -> InsertOrUpdate($requestPost);
        return redirect()-> back()->with('status', 'Thêm thành công!');
    }

    public function update(RequestPosts $requestPost, $id)
    {
        $this -> InsertOrUpdate($requestPost, $id);
        return redirect()-> back()->with('status', 'Cập nhật thành công!');
    }

    public function edit($id)
    {
        $posts = Article::find($id);
        return view('backend.posts.update', compact('posts'));
    }

    public function InsertOrUpdate (RequestPosts $requestPost, $id = '')
    {
        $code=1;
        try{
            $posts = new Article();

            if ($id)
            {
                $posts = Article::find($id);
            }
            
            $posts -> name = $requestPost->name;
            $posts -> slug = $requestPost ->slug;
            $posts -> title = $requestPost->title? $requestPost->title : $requestPost->name;
            $posts -> keyword = $requestPost->keyword;
            $posts -> excerpt = $requestPost->excerpt;
            $posts -> content = $requestPost ->content;
            $posts -> image = $requestPost ->image;
            $posts -> category_id = $requestPost ->category_id;
            // $posts -> hot = $requestPost ->hot;
            // $posts -> status = $requestPost ->status;
            // $posts -> active = $requestPost ->active;
             dd($posts);
            $posts -> save();
        }
        catch(\Exception $exception)
        {
            return $code=0;
            dd($code);
            Log::error ("[Error insertOrUpdate news]".$exception->getMessage());
        };
        
        return $code;

    }
    public function action($action,$id)
    {
       if ($action)
       {
           $posts = Article::find($id);
           switch ($action)
           {
               case 'delete':
                $posts ->delete();
               break;
           }
       }
        return redirect( route('backend.posts.index'))->with('status','Xóa bài viết thành công');
    }
}
