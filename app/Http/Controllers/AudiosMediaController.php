<?php

namespace App\Http\Controllers;

use App\AudiosMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AudiosMediaController extends Controller
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
        // $media = $request->file('file');
        // $destination_path = base_path() . '/public/uploads/audio/';
        // if(!File::exists($destination_path)) {
        //         File::makeDirectory($destination_path, $mode = 0777, true, true);
        //     }

        // $filename = date_timestamp_get(date_create()).'.' . $media->getClientOriginalExtension();

        // $media->move($destination_path, $filename);

        $params = $request->all();
        $media = $request->file('file');
        
        $params['file'] = save_file($media,'audio');
        $params['original_file'] = get_originalname($media);

        try {
             AudiosMedia::create($params);
            
        } catch (Exception $e) {
            // dd($e);
            return response()->json(['message' => 'Audio media not saved'], 500);

        }
        
        return response()->json(['message' => 'Audio media saved Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AudiosMedia  $audiosMedia
     * @return \Illuminate\Http\Response
     */
    public function show(AudiosMedia $audiosMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AudiosMedia  $audiosMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(AudiosMedia $audiosMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AudiosMedia  $audiosMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AudiosMedia $audiosMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AudiosMedia  $audiosMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(AudiosMedia $audio_aedium)
    {
        // dd($audio_aedium->toArray());  
            try {
                $audio_aedium->delete();
            } catch (Exception $e) {
                return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in used alredy.');
            }   
            
            return redirect()->back()->with('success_message','Media deleted successfully!!');
    }
}
