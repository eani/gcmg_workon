<?php

namespace App\Http\Controllers;

use App\Audio;
use App\AudiosMedia;
use App\Category;
use Illuminate\Http\Request;
use Exception;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('sites.audio.audio');
        $categories= Category::where('type','Audio')->get();
        $audiocode= getCode('App\AudiosMedia','code');
        // dd($categories->toArray());
        
        return view('sites.audio.audio', compact('categories'));
    }

    public function selectCategoryListAudio(Category $category)
    {
        // dd($category->audios->toArray());
        return view('sites.audio.audio_cat_list', compact('category'));
    }

    public function getCategoryMediaAudio(Category $category, Audio $media )
    {
        // dd($media->toArray());
        return view('sites.audio.audio_cat_media', compact('media'));
    }

    

    public function viewAll()
    {
        $audios = Audio::get();
        // dd($applications->toArray());

        return view('admin.audio.list', compact('audios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types= Category::where('type','Audio')->get();
        $audiocode= getCode('App\AudiosMedia','code');


        return view('admin.audio.create', compact('category_types','audiocode'));
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

            //Insert the Acquired Values into the Audio Database
            $audio = Audio::create($params); 
            $audiosmedia = AudiosMedia::where('code', $params['code'])->update(["audio_id"=>$audio->id]);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Audio Upload is successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function show(Audio $audio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function edit(Audio $audio)
    {

        // dd($audio->toArray());

        //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types= Category::where('type','Audio')->get();
        $audiocode= getCode('App\AudiosMedia','code');

        // dd($category_types->toArray());
        return view('admin.audio.edit', compact('category_types','audio','audiocode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audio $audio)
    {
        // dd($audio->toArray());


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
            $aaudio = $audio->update($params);
            $audiosmedia = AudiosMedia::where('code', $params['code'])->update(["audio_id"=>$audio->id]);
            // dd($applicationsmedia);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Editing of Audio record is successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audio  $audio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audio $audio)
    {
        // dd($audio->toArray());
        try {
            $audio->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in use, try deleting the media only.');
        }   
        
        return redirect()->back()->with('success_message','Record deleted successfully');
    }
}
