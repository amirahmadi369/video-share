<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;


class VideoController extends Controller
{
   public function index()
   {
    $videos = Video::all();
    dd($videos);
   }
   public function create(){
     return view('videos.create');
   }
   public function store(StoreVideoRequest $request){
   
   Video::create($request->all());
   return redirect()->route('index')->with('alert' , __('messages.success'));  

      
   }
   public function show(Request $request, Video  $video)
   {
 
    return view('videos.show' , compact('video'));
   }
   public function edit(Video $video)
   {
    return view('videos.edit', compact('video'));                         
   }
   public function update(Request $request , Video $video){
    $video->update($request->all());
    return redirect()->route('videos.show' , $video->slug)->with('alert', __('massages.video_edited'));
   } 
}
