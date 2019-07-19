<?php

namespace App\Http\Controllers;

use App\Video;
use App\VideosMedia;
use App\Category;
use Illuminate\Http\Request;
use Exception;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('sites.video.videos');
        $categories= Category::where('type','Video')->get();
        $applicationcode= getCode('App\VideosMedia','code');
        // dd($categories->toArray());
        
        return view('sites.video.videos', compact('categories'));
    }

    public function selectCategoryListVideo(Category $category)
    {
        // dd($category->videos->toArray());
        return view('sites.video.videos_cat_list', compact('category'));
    }

    public function getCategoryMediaVideo(Category $category, Video $media )
    {
        // dd($media->toArray());
        return view('sites.video.videos_cat_media', compact('media'));
    }



    public function viewAll()
    {
        $videos = Video::get();
        // dd($applications->toArray());

        return view('admin.video.list', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //This Eloquent Query is to create an SQL query that will filter only Video Type from the Category table in our Database
        $category_types= Category::where('type','Video')->get();
        $videocode= getCode('App\VideosMedia','code');

        return view('admin.video.create', compact('category_types','videocode'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //Here we Validate the colums we want with regards to the Database Colums
        $this->validate($request, [
            'name'=>'required',
            'category_id'=>'required',
        ]);
        
        //all request is passed to the variable $params 
        $params = $request->all(); 

        try {

            //Insert the Acquired Values into the Video Database
            $video = Video::create($params); 
            $videosmedia = VideosMedia::where('code', $params['code'])->update(["video_id"=>$video->id]);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Video Upload is successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        // dd($video->toArray());

        //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types= Category::where('type','Video')->get();     
        $videocode= getCode('App\VideosMedia','code');
        

        // dd($category_types->toArray());
        return view('admin.video.edit', compact('category_types','video', 'videocode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {   
        // dd($video->toArray());
        // $videoname = $video->videosmedia->id;
        // dd($videoname);


        //Here we Validate the colums we want with regards to the Database Colums
        $this->validate($request, [
            'name'=>'required',
            'category_id'=>'required',
        ]);
        
        //all request is passed to the variable $params 
        $params = $request->all(); 
        // dd($params);

        try { 

            //Insert the Acquired Values into the Application Database
            $vvideo = $video->update($params);
            $videosmedia = VideosMedia::where('code', $params['code'])->update(["video_id"=>$video->id]);
            // dd($applicationsmedia);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Editing of Application is successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        // dd($video->toArray());
        try {
            $video->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in use, try deleting the media only.');
        }   
        
        return redirect()->back()->with('success_message','Record deleted successfully');
    }
}
