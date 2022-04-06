<?php

namespace App\Http\Controllers\regular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class userBlogController extends Controller
{
    public function latestBlogs($lang='fa')
    {
        $latestBlogs = Blog::take(5)->latest()->get();
        if(count($latestBlogs)>0){
            if($lang=='en'){
                // dd('add en');    
            }
            else{
                foreach($latestBlogs as $key => $latestBlog){
                    $blogs[$key]  = [
                        'id' => $latestBlog->id,
                        'title' => $latestBlog->title,
                        'abstract' => pagesController::makeAbstract($latestBlog->text),
                        'time' => $latestBlog->updated_at->format('Y-M'),
                    ];
                }
                return view('guest.fa.component.blogs.latest')->with('blogs',$blogs);
            }
        }
        else{
            return redirect('/')->with('error','بلاگی در سایت موجود نمی باشد');
        }
    }
    public function allBlogs($lang='fa')
    {
        $latestBlogs = Blog::latest()->get();
        if(count($latestBlogs)>0){
            if($lang=='en'){
                // dd('add en');
            }
            else{
                foreach($latestBlogs as $key => $latestBlog){
                    $blogs[$key]  = [
                        'id' => $latestBlog->id,
                        'title' => $latestBlog->title,
                        'time' => $latestBlog->updated_at->format('Y-M'),
                    ];
                }
                return view('guest.fa.component.blogs.all')->with('blogs',$blogs);
            }
        }
        else{
            return redirect('/')->with('error','بلاگی در سایت موجود نمی باشد');
        }
    }
    public function showblog(Blog $id)
    {
        return view('guest.fa.component.blogs.one')->with('blog',$id);
    }
}
