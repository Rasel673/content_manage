<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentModel;
use DB;

class ContentController extends Controller
{
//Admin panel home data------------
  public function home(){
     $content=ContentModel::all()->count(); 
      $video=ContentModel::where('content_type','=','video')->count(); 
      $image=ContentModel::where('content_type','=','image')->count(); 
      return view('admin.home',compact('video','image','content'));
      }

  //all content datatable show------------
    public function contentIndex(){
      $content=ContentModel::all(); 
      return view('admin.allContent',compact('content'));
      }
 
    ///delete content data---------------------
       public function contentDelete($id){
        $delete=DB::table('contents')
        ->where('id',$id)
        ->first();
 $photo=$delete->content_img;
 unlink($photo);
 $dlt=DB::table('contents')
          ->where('id',$id)
          ->delete();
 if ($dlt) {
         $notification=array(
         'messege'=>'Successfully Content Deleted ',
         'alert-type'=>'success'
          );
        return Redirect()->back()->with($notification);                      
     }else{
      $notification=array(
         'messege'=>'error ',
         'alert-type'=>'error'
          );
         return Redirect()->back()->with($notification);
}     
        
      }
  
    
     ///ADD content data-------------------------------------------
     public function contentAdd(Request $request ){
   
      $request->validate([
        'content_title' => 'required|unique:contents',
        'content_body'=> 'required',
        'content_type' => 'required',
        'content_section' => 'required',
        'content_visibility' => 'required',
    ]);
    
  
       $content_title=$request->input('content_title');
        $content_body=$request->input('content_body');
        $content_type=$request->input('content_type');
        $content_section=$request->input('content_section');
        $content_visibility=$request->input('content_visibility');
        $embaded_link=$request->input('embaded_link');
        $image=$request->file('content_img');
        if ($image) {
            $image_name=time();
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/Contents/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $add=ContentModel::insert([
                  'content_title'=>$content_title,
                  'content_body'=>$content_body,
                  'content_type'=>$content_type,
                  'content_section'=>$content_section,
                  'content_visibility'=>$content_visibility,
                  'embaded_link'=>$embaded_link,
                  'content_img'=>$image_url
                ]);

              if ($add) {
                 $notification=array(
                 'messege'=>'Successfully Content Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
             } 
             
             ///notification end
                
            }else{
              $notification=array(
                'messege'=>'Image upload failed ',
                'alert-type'=>'error'
                 );

              return Redirect()->back()->with($notification);
                
            }

            ///photo insert end
        }else{
          $notification=array(
            'messege'=>'Something went wrong',
            'alert-type'=>'error'
             );
              return Redirect()->back()->with($notification);
        }

        /// data insert to the table end
     
     }




}
