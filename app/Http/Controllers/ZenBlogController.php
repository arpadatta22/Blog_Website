<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\BlogUser;
use DB;
use Session;
use function Symfony\Component\VarDumper\Cloner\seek;

class ZenBlogController extends Controller

{
    public function index(){

        $blogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.status',1)
            ->where('blog_type','trending')
            ->orderby('id','desc')
//            ->skip(1)
            ->take(3)
            ->get();

        return view('frontEnd.home.home',[
            'blogs'=> $blogs,
        ]);
    }
    public function blogDetail($slug){
        $blogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('slug',$slug)
            ->first();

        $catId=$blogs->category_id;
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('category_id',$catId)
            ->get();

//        return $categoryWiseBlogs;

        return view('frontEnd.blog.blog-detail',[
            'blogs'=> $blogs,
            'categoryWiseBlogs' => $categoryWiseBlogs
        ]);
    }
    public function aboutDetail(){
        return view('frontEnd.about.about-detail');
    }
    public function contact(){
        return view('frontEnd.contact.contact');
    }
    public function category($id){
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','categories.id')
            ->join('authors','blogs.author_id','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.category_id',$id)
            ->get();

        $category=Category::where('id',$id)->first();

        return view('frontEnd.categories.category',[
            'categoryWiseBlogs'=>$categoryWiseBlogs,
            'category'=>$category,

        ]);

    }

    public function userRegister(){
        return view('frontEnd.user.user-register');
    }
    public function saveUser(Request $request){
        BlogUser::saveUser($request);
        return back();
    }
    public function loginUser(){
        return view('frontEnd.user.user-login');
    }
    public function checkLogin(Request $request){
        $userInfo=BlogUser::where('email',$request->user_name)
            ->orWhere('phone',$request->user_name)
            ->first();
        if($userInfo){
            $existingPass = $userInfo->password;
            if (password_verify($request->password,$existingPass)){
                Session::put('userId',$userInfo->id);
                Session::put('userName',$userInfo->name);
                return redirect('/');
        }else{
            return back()->with('message','please use valid password');
        }
    }else{
       return back()->with('message','please use valid user name');
   }
}
public function logout(){
    Session::forget('userId');
    Session::forget('userName');
    return redirect('/');
  }
}
