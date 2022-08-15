<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Http\Requests\RequestPosts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Article::orderBy('id', 'DESC')->paginate(10);
        $viewData = [
            'posts' => $posts,
            // 'query' => $posts->query()
        ];
        //dd($posts);
        return view('backend.posts.index',$viewData)->withArticles($posts);
    }

    public function create()
    {
        $category = Category::get();
        $viewData = [
            'category' => $category
        ];
        return view('backend.posts.create',$viewData);
    }

   
    public function add(RequestPosts $requestPost)
    {
        $this -> InsertOrUpdate($requestPost);
        return redirect('/admin/posts')->with('status', 'Thêm thành công!');
    }

    public function update(RequestPosts $requestPost, $id)
    {
        $this -> InsertOrUpdate($requestPost, $id);
        return redirect('/admin/posts')->with('status', 'Cập nhật thành công!');
    }

    public function edit($id)
    {
        $posts = Article::find($id);
        $category = Category::get();
        $viewData = [
            'posts' => $posts,
            'category' => $category
        ];
        //dd($category);
        return view('backend.posts.update',$viewData);
    }

    public function InsertOrUpdate (RequestPosts $requestPost, $id = '')
    {
        //Debugbar::disable();
        $code=1;
        try{
            $posts = new Article();

            if ($id)
            {
                $posts = Article::find($id);
            }
            $posts -> name = $requestPost->name;
            $posts -> slug = $requestPost->slug;
            $posts -> title = $requestPost->title? $requestPost->title : $requestPost->name;
            $posts -> keyword = $requestPost->keyword;
            $posts -> excerpt = $requestPost->excerpt;
            $posts -> content = $requestPost ->content;
            $posts -> image = $requestPost ->image;
            $posts -> category_id = $requestPost ->category_id;
            $posts -> hot = $requestPost ->hot;
            $posts -> status = $requestPost ->status;
            ///$posts -> active = $requestPost ->active;
             //dd($posts);
            $posts -> save();
        }
        catch(Exception $exception)
        {
            Debugbar::addThrowable($exception);
            return $code = 0;
            //Debugbar::addThrowable($exception);
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
    public function diff($id){

        $old = DB::table('article_log')
                ->select('*')
                ->where('article_id',$id)
                ->limit(1)->get();
        $new = DB::table('article')
            ->select('title','content')
            ->where('id',$id)->get();
        $a = json_encode($old, JSON_UNESCAPED_UNICODE);
        $viewData = [
            'old' => $old,
            'new' => $new,
            'vip' => $a
        ];
        //dd($a);
        //dd($obj->{'old_row_data'});
        return view('backend.posts-history.hightlight', $viewData);
    }
}
