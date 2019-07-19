<?php

namespace App\Http\Controllers;

use App\BooksMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BooksMediaController extends Controller
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
        // $destination_path = base_path() . '/public/uploads/book/';
        // if(!File::exists($destination_path)) {
        //         File::makeDirectory($destination_path, $mode = 0777, true, true);
        //     }

        // $filename = date_timestamp_get(date_create()).'.' . $media->getClientOriginalExtension();

        // $media->move($destination_path, $filename);

        $params = $request->all();
        $media = $request->file('file');
        
        $params['file'] = save_file($media,'book');
        $params['original_file'] = get_originalname($media);

        try {
             BooksMedia::create($params);
            
        } catch (Exception $e) {
            // dd($e);
            return response()->json(['message' => 'Book media not saved'], 500);

        }
        
        return response()->json(['message' => 'Book media saved Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BooksMedia  $booksMedia
     * @return \Illuminate\Http\Response
     */
    public function show(BooksMedia $booksMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BooksMedia  $booksMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(BooksMedia $booksMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BooksMedia  $booksMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BooksMedia $booksMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BooksMedia  $booksMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(BooksMedia $books_bedium)
    {
        // dd($books_bedium->toArray());  
            try {
                $books_bedium->delete();
            } catch (Exception $e) {
                return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in used alredy.');
            }   
            
            return redirect()->back()->with('success_message','Media deleted successfully!!');
    }
}
