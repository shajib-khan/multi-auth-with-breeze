<?php


namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function viewPage(){
        $posts =Post::all();
        return view('view',compact('posts'));
    }
}
