<?php

namespace App\Http\Controllers;

use App\Category;
use App\Download;
use DB;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
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
        $categories = Category::get();
        // dd($applications->toArray());

        return view('admin.category.list', compact('categories'));
    }

    public function viewdash()
    {
        $categories = Category::get();
        $catlimit = DB::table('categories')->Orderby('id', 'desc')->limit(5)->get();
        $category_typesApp = Category::where('type','Apps')->get();
        $category_typesAudio = Category::where('type','Audio')->get();
        $category_typesbooks = Category::where('type','Book')->get();
        $category_typesVideo = Category::where('type','Video')->get();

        // dd($categories->toArray());
        // dd($category_typesVideo->toArray());

        $downloads = Download::get();
        $downlimit = DB::table('downloads')->Orderby('id', 'desc')->limit(5)->get();
        $downloads_typesApp = Download::where('file_type','application')->get();
        $downloads_typesAudio = Download::where('file_type','audio')->get();
        $downloads_typesbooks = Download::where('file_type','book')->get();
        $downloads_typesVideo = Download::where('file_type','video')->get();

        $mostdownload = DB::table('downloads')
                             ->select(DB::raw('COUNT(file_name) AS no_of_downloads, file_name AS media_name, file_type AS media_type'))
                             ->groupBy('file_name', 'media_type')
                             ->Orderby('no_of_downloads', 'desc')
                             ->limit(6)
                             ->get();

        // $amchartdata = DB::table('downloads')
        //                      ->select(DB::raw('COUNT(file_type) AS number, file_type AS media_type, DATE_FORMAT(created_at,"%Y-%m-%d") AS date'))
        //                      ->groupBy('created_at', 'file_type')
        //                      ->Orderby('created_at', 'ASC')
        //                      ->get();


        $amchartdata = DB::table('downloads')
                             ->select(DB::raw('application_type AS app_name, COUNT(application_type) AS app_count, audio_type AS audio_name, COUNT(audio_type) AS audio_count, book_type AS book_name, COUNT(book_type) AS book_count, video_type AS video_name , COUNT(video_type) as video_count, created_at AS date'))
                             ->groupBy('created_at', 'application_type','audio_type', 'book_type', 'video_type')
                             ->Orderby('created_at', 'ASC')
                             ->get();
        // dd($downloads->toArray());
        // dd($mostdownload->toArray());
        // dd($amchartdata->toArray());
        // dd($downloads_typesVideo->toArray());



        return view('home', compact('downloads','downloads_typesApp','downloads_typesAudio','downloads_typesbooks', 'downloads_typesVideo','downlimit', 'categories','category_typesApp','category_typesAudio','category_typesbooks', 'category_typesVideo','catlimit','mostdownload','amchartdata'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'type'=>'required|string',
        ]);
        $params = $request->all();

       
        try {
             $ccategory = Category::create($params);
            
        } catch (Exception $e) {
            // dd($e);
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }
        return redirect()->back()->with('success_message','Category created successfully');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // dd($category->toArray());

        //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types = Category::where('type')->get();     

        // dd($category_types->toArray());
        return view('admin.category.edit', compact('category_types','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($category->toArray());

        //Here we Validate the colums we want with regards to the Database Colums    

        $this->validate($request, [
            'name'=>'required|string',
            'type'=>'required|string',
        ]);

        //all request is passed to the variable $params 
        $params = $request->all(); 
        // dd($params);

        try { 

            //Insert the Acquired Values into the Application Database
            $ccategory = $category->update($params);
            // $applicationsmedia = ApplicationsMedia::where('code', $params['code'])->update(["application_id"=>$category->id]);
            // dd($applicationsmedia);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Record edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
            try {
                $catid =$category->id;
                // DB::table('categories')->where('id', $catid)->delete();
                $category_dele= Category::where('id', $catid)->delete();
                // $category_typ->delete();    
            } catch (Exception $e) {
                // dd($e);
                return redirect()->back()->with('error_message','Sorry, Unable to delete Record. Other applications are using this, try deleting all of its associate.');
            }
            
            return redirect()->back()->with('success_message','Record deleted successfully');
    
    }
}
