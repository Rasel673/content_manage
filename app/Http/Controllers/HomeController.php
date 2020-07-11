<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentModel;
use DB;

class HomeController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        ///for  video section top post------------
        $video=ContentModel::orderBY('id','desc')->where(['content_visibility'=>'1','content_section'=>'1'])->first();
        ///for  image section top post------------
        $image=ContentModel::orderBY('id','desc')->where(['content_visibility'=>'1','content_section'=>'2'])->first();
        ///all video content------------
        $contentVideo=ContentModel::where(['content_visibility'=>'1','content_type'=>'video'])->get();
        ///all image content------------
         $contentImage=ContentModel::orderBY('id','desc')->where(['content_visibility'=>'1','content_type'=>'image'])->get();

        return view('landing',compact('video','image','contentVideo','contentImage'));
    }

    public function single($id)
    {
        $single=ContentModel::where('id','=',$id)->first();
       
       
        return view('singlePost',compact('single'));
    }
}
