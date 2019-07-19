<?php

namespace App\Http\Controllers;

use App\VideosMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideosMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "am here..";
        // $media = $request->file('file');
        // $destination_path = base_path() . '/public/uploads/video/';
        // if(!File::exists($destination_path)) {
        //         File::makeDirectory($destination_path, $mode = 0777, true, true);
        //     }

        // $filename = date_timestamp_get(date_create()).'.' . $media->getClientOriginalExtension();

        // $media->move($destination_path, $filename);

        $params = $request->all();  
        // $vam = array_get($params, 'file.filename');
        // dd($vam);
        // dd($params);
        $media = $request->file('file');
        // dd($media['filename']);
        $params['file'] = save_file($media,'video');
        $params['original_file'] = get_originalname($media);
        // dd($params);
        try {
             VideosMedia::create($params);
            
        } catch (Exception $e) {
            // dd($e);
            return response()->json(['message' => 'Video media not saved'], 500);

        }
        
        return response()->json(['message' => 'Video media saved Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideosMedia  $videosMedia
     * @return \Illuminate\Http\Response
     */
    public function show(VideosMedia $videosMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideosMedia  $videosMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(VideosMedia $videosMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideosMedia  $videosMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideosMedia $videosMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideosMedia  $videosMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideosMedia $videos_vedium)
    {
        // dd($videos_vedium->toArray());  
            try {
                $videos_vedium->delete();
            } catch (Exception $e) {
                return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in used alredy.');
            }   
            
            return redirect()->back()->with('success_message','Media deleted successfully!!');
    }
}


