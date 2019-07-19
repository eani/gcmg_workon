<?php

namespace App\Http\Controllers;

use App\Application;
use App\ApplicationsMedia;
use App\Category;
use Illuminate\Http\Request;
use Exception;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        // return view('sites.apps.applications');  

        $categories= Category::where('type','Apps')->get();
        $applicationcode= getCode('App\ApplicationsMedia','code');
        // dd($categories->toArray());
        
        return view('sites.apps.applications', compact('categories'));
    }

    public function selectCategoryList(Category $category)
    {
        // dd($category->applications->toArray());
        return view('sites.apps.apps_cat_list', compact('category'));
    }

    public function getCategoryMedia(Category $category, Application $media )
    {
        // dd($media->toArray());
        return view('sites.apps.apps_cat_media', compact('media'));
    }


    public function viewAll()
    {
        $applications = Application::get();
        // dd($applications->toArray());

        return view('admin.apps.list', compact('applications'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types= Category::where('type','Apps')->get();
        $applicationcode= getCode('App\ApplicationsMedia','code');
        // dd($category_types);

        // dd($category_types->toArray());
        return view('admin.apps.create', compact('category_types','applicationcode'));

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
        // dd($params);

        try {

            //Insert the Acquired Values into the Application Database
        $appplication = Application::create($params); 
            // dd($appplication->id);
        $applicationsmedia = ApplicationsMedia::where('code', $params['code'])->update(["application_id"=>$appplication->id]);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Application record uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        // dd($application->toArray());


        //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types = Category::where('type','Apps')->get();
        $applicationcode = getCode('App\ApplicationsMedia','code');

        // dd($application->toArray());

        return view('admin.apps.edit', compact('category_types','application','applicationcode'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {   
        // dd($application->toArray());


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
            $appplication = $application->update($params);
            $applicationsmedia = ApplicationsMedia::where('code', $params['code'])->update(["application_id"=>$application->id]);
            // dd($applicationsmedia);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Editing of Application record is successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        // dd($application->toArray());
        try {
            $application->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in use, try deleting the media only.');
        }   
        
        return redirect()->back()->with('success_message','Record deleted successfully');
    }
}
