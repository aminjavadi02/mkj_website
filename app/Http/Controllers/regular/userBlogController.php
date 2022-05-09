<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class userBlogController extends Controller
{
    public function latestBlogs($lang='fa')
    {
        if($lang=='en' || $lang=='fa'){
            $latestBlogs = Blog::take(5)->latest()->get();
            if(count($latestBlogs)>0){
                foreach($latestBlogs as $key => $latestBlog){
                    $blogs[$key]  = [
                        'id' => $latestBlog->id,
                        'title' => $latestBlog->title,
                        'abstract' => pagesController::makeAbstract($latestBlog->text),
                        'time' => $latestBlog->updated_at->format('Y-M'),
                    ];
                }
                return view('guest.'.$lang.'.component.blogs.latest')->with('blogs',$blogs);
            }else{
                return redirect('/')->with('error','error');
            }
        }else{
            abort(404);
        }
    }
    public function allBlogs($lang='fa')
    {
        if($lang=='en' || $lang=='fa'){
            $allBlogs = Blog::take(5)->latest()->get();
            if(count($allBlogs)>0){
                foreach($allBlogs as $key => $oneBlog){
                    $blogs[$key]  = [
                        'id' => $oneBlog->id,
                        'title' => $oneBlog->title,
                        'time' => $oneBlog->updated_at->format('Y-M'),
                    ];
                }
                return view('guest.'.$lang.'.component.blogs.all')->with('blogs',$blogs);
            }else{
                return redirect('/')->with('error','error');
            }
        }else{
            abort(404);
        }
    }
    public function showblog(Blog $id,$lang='fa')
    {
        if($lang=='en'||$lang=='fa'){
            return view('guest.'.$lang.'.component.blogs.one')->with('blog',$id);
        }
    }
}
