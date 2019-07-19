<?php

namespace App\Http\Controllers;

use App\Book;
use App\BooksMedia;
use App\Category;
use Illuminate\Http\Request;
use Exception;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('sites.book.books');
        $categories= Category::where('type','Book')->get();
        $bookcode= getCode('App\BooksMedia','code');
        // dd($categories->toArray());
        
        return view('sites.book.books', compact('categories'));
    }

    public function selectCategoryListBook(Category $category)
    {
        // dd($category->books->toArray());
        return view('sites.book.books_cat_list', compact('category'));
    }

    public function getCategoryMediaBook(Category $category, book $media )
    {
        // dd($media->toArray());
        return view('sites.book.books_cat_media', compact('media'));
    }


    public function viewAll()
    {
        $books = Book::get();
        // dd($applications->toArray());

        return view('admin.book.list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types= Category::where('type','Book')->get();
        $bookcode= getCode('App\BooksMedia','code');


        return view('admin.book.create', compact('category_types','bookcode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $reques
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

            //Insert the Acquired Values into the Book Database
            $book = Book::create($params); 
            $booksmedia = BooksMedia::where('code', $params['code'])->update(["book_id"=>$book->id]);

        } catch (Exception $e) {
            //dd($e);

            //Display the Following info if there's a problem with the Inserting of the Data 
            return redirect()->back()->with('error_message','Sorry!!! Change a few things up and try submitting again.');
        }

        //On succefull insert of Data display the following Data
        return redirect()->back()->with('success_message','Book Upload is successfully');

        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // dd($book->toArray());

        //This Eloquent Query is to create an SQL query that will filter only Apps Type from the Category table in our Database
        $category_types= Category::where('type','Book')->get();
        $bookcode= getCode('App\BooksMedia','code');     

        // dd($category_types->toArray());
        return view('admin.book.edit', compact('category_types','book', 'bookcode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // dd($book->toArray());


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
            $bbook = $book->update($params);
            $booksmedia = BooksMedia::where('code', $params['code'])->update(["book_id"=>$book->id]);
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
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // dd($book->toArray());
        try {
            $book->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error_message','Sorry, Unable to delete Record. This Record may be in use, try deleting the media only.');
        }   
        
        return redirect()->back()->with('success_message','Record deleted successfully');
    }
}
