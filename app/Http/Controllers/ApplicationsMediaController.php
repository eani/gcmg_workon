<?php

namespace App\Http\Controllers;

use App\ApplicationsMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApplicationsMediaController extends Controller
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
        $params = $request->all();
        $media = $request->file('file');

        $params['file'] = save_file($media,'application');
        $params['original_file'] = get_originalname($media);
        // dd($params);

        try {
             ApplicationsMedia::create($params);
            
        } catch (Exception $e) {
            // dd($e);
            return response()->json(['message' => 'Application media not saved'], 500);

        }
        
        return response()->json(['message' => 'Application media saved Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApplicationsMedia  $applicationsMedia
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationsMedia $applicationsMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplicationsMedia  $applicationsMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationsMedia $applicationsMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplicationsMedia  $applicationsMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationsMedia $applicationsMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationsMedia  $applicationsMedia
     * @return \Illuminate\Http\Response
     */


    // public function destroy($applicationsMedia)
    // {
    //     $media = ApplicationsMedia::where('id',$applicationsMedia)->first();
    //     dd($media->toArray());  
    //         try {
    //             $applicationsMedia->delete();
    //         } catch (Exception $e) {
    //             return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in used alredy.');
    //         }   
            
    //         return redirect()->back()->with('success_message','Form deleted successfully!!');
    // }

    public function destroy(ApplicationsMedia $applications_aedium)
    {
        // dd($applicationtions_aedium->toArray());  
            try {
                $applications_aedium->delete();
            } catch (Exception $e) {
                return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in used alredy.');
            }   
            
            return redirect()->back()->with('success_message','Media deleted successfully!!');
    }
}