<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use App\Models\Article;
use App\Http\Requests\RequestPosts;
use Illuminate\Support\Facades\DB;
use App\Constant;
use Exception;

class PostsController extends Controller
{

    public function index(Request $request)
    {
        $posts = DB::table('article')
            ->join('category', 'article.category_id', '=', 'category.id')
            ->select('article.name', 'article.status', 'article.hot', 'article.total_view', 'article.image', 'article.id', 'category.title', 'article.status')
            ->where('article.dlt_flg', 0)
            ->orderBy('article.updated_at', 'DESC')
            ->get();
        $viewData = [
            'posts' => $posts,
        ];
        return view('backend.posts.index', $viewData);
    }

    public function create()
    {
        $category = Category::where('dlt_flg', 0)->get();
        $viewData = [
            'category' => $category
        ];
        return view('backend.posts.create', $viewData);
    }


    public function add(RequestPosts $requestPost)
    {
        $this->InsertOrUpdate($requestPost);
        return redirect('/admin/posts')->with('status', 'Thêm thành công!');
    }

    public function update(RequestPosts $requestPost, $id)
    {
        $this->InsertOrUpdate($requestPost, $id);
        return redirect('/admin/posts')->with('status', 'Cập nhật thành công!');
    }

    public function edit($id)
    {
        $posts = Article::find($id);

        $content = SELF::replaceContent($posts);

        $category = Category::where('dlt_flg', 0)->get();

        $viewData = [
            'posts' => $posts,
            'category' => $category,
            'content' => $content
        ];
        return view('backend.posts.update', $viewData);
    }

    public function InsertOrUpdate(RequestPosts $requestPost, $id = '')
    {
        $code = 1;
        try {
            $posts = new Article();

            if ($id) {
                $posts = Article::find($id);
            }
            $posts->name = $requestPost->name;
            $posts->slug = $requestPost->slug;
            $posts->title = $requestPost->title ? $requestPost->title : $requestPost->name;
            $posts->keyword = $requestPost->keyword;
            $posts->excerpt = $requestPost->excerpt;
            $posts->content = $requestPost->content;
            $posts->image = $requestPost->image;
            $posts->category_id = $requestPost->category_id;
            $posts->hot = $requestPost->hot;
            $posts->status = $requestPost->status;
            $posts->save();
        } catch (Exception $exception) {
            return $code = 0;
        };

        return $code;
    }

    public function action($action, $id)
    {
        if ($action) {
            $posts = Article::find($id);
            switch ($action) {
                case 'delete':
                    $posts->dlt_flg = 1;
                    $posts->save();
                    break;
            }
        }
        return redirect(route('backend.posts.index'))->with('status', 'Xóa bài viết thành công');
    }


    public function diff($id)
    {
        $old = DB::table('article_log')
            ->select('*')
            ->where('article_id', $id)
            ->limit(1)->get();

        $new = DB::table('article')
            ->select('title', 'content')
            ->where('id', $id)->get();

        $viewData = [
            'old' => $old,
            'new' => $new,
        ];
        return view('backend.posts-history.hightlight', $viewData);
    }

    public function replaceContent($posts)
    {
        $patternScript = Constant::REGEX_SCRIPT;

        $patternStyle = Constant::REGEX_STYLE;

        $blank = '';

        if ($posts->content) {

            $replaceScript = preg_replace($patternScript, $blank, $posts->content);

            $replaceStyle = preg_replace($patternStyle, $blank, $replaceScript);
        } else {

            $replaceStyle = '<h2> No data.</h2>';
        }

        $result = $replaceStyle;
        return $result;
    }

    public function setStatus(Request $request)
    {
        if (!$request->status && !$request->link_id)
            return;
        $link = Article::find($request->link_id);

        $link->status = $request->status;

        $link->save();

        return response()->json(['msg' => 'Update successful']);
    }

    public function getHistory()
    {

        $posts = DB::table('article_log')
            ->select('*')
            ->orderBy('article_log.timestamp_log', 'DESC')
            ->get();
        $viewData = [
            'posts' => $posts,
        ];
        // dd($posts);
        return view('backend.posts-history.index', $viewData);
    }
}
