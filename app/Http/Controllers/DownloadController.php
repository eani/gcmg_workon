<?php

namespace App\Http\Controllers;

use App\Category;
use App\ApplicationsMedia;
use DB;
use App\Download;
use Illuminate\Http\Request;
use Exception;

class DownloadController extends Controller
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

    public function viewAll()
    {


        // $downlquery = DB::table('downloads')->Orderby('id', 'desc')->get();

        $downlquery = DB::table('downloads')
                             ->select(DB::raw('COUNT(file_name) AS no_of_downloads, file_name AS media_name, file_type AS media_type'))
                             ->groupBy('file_name', 'media_type')
                             ->Orderby('no_of_downloads', 'desc')
                             ->get();

        // dd($downlquery->toArray());

        return view('admin.download.list', compact('downlquery'));



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
    // public function store(Request $request)
    // {
    //     //
    // }

    public function store($file_type,$file_id,$file,$file_name)
    {
        //
        Download::create([
            "file_type"=> $file_type,
            "file_id"=> $file_id,
            "file_name"=> $file_name,

        ]);
        

        if ($file_type == 'application'){

            return redirect()->route('application_file', ['application'=>$file]);

        }

        if ($file_type == 'audio'){

            return redirect()->route('audio_file', ['audiomedia'=>$file]);

        }

        if ($file_type == 'book'){

            return redirect()->route('book_file', ['booksmedia'=>$file]);

        }

        if ($file_type == 'video'){

            return redirect()->route('video_file', ['videosmedia'=>$file]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy(Download $download)
    {
        //
    }
}
