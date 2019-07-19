    
@extends('layouts.admin')


    @section('title')
        GCMG - Creat New Category
    @endsection



        @section('content')

            @section('Top Bar title')
               <h4 class="page-title">CATEGORY CREATION</h4>
               <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                   <li class="breadcrumb-item active"> Category Creation </li>
                   <li class="breadcrumb-item active">Create New</li>
               </ol>
            @endsection

            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title">Create a New Category</h4>
                                <p class="text-muted m-b-30 font-14">
                                    This table is to help you create a new Category. For your resource uploads.
                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <form  action="{{route('categories.store')}}" class="form-horizontal" role="form" method="POST">
                                                {{csrf_field()}}
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Name of Category<span class="text-danger"> *</span></label>
                                                    <div class="col-10">
                                                        <input  name="name" value="{{old('name')}}" class="form-control" placeholder="Category Name here..." type="text">

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                              <strong>{{ $errors->first('name') }}</strong>
                                                          </span>
                                                        @endif
                                                    </div>
                                                </div>                                               
                                                <div class="form-group row"">
                                                    <label class="col-2 col-form-label">Category Type<span class="text-danger"> *</span></label>
                                                    <div class="col-10">
                                                        <select name="type" class="custom-select mt-0">
                                                            <option  Value="">Open this select menu to choose Category type</option>
                                                            <option @if(old('type') == "Audio") selected @endif value="Audio">Audio Type</option>
                                                            <option @if(old('type') == "Apps") selected @endif value="Apps">Application Type</option>
                                                            <option @if(old('type') == "Book") selected @endif value="Book">Book Type</option>
                                                            <option @if(old('type') == "Video") selected @endif value="Video">Video Type</option>
                                                        </select>
                                                        @if ($errors->has('type'))
                                                            <span class="help-block">
                                                              <strong>{{ $errors->first('type') }}</strong>
                                                          </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Description</label>
                                                    <div class="col-10">
                                                        <textarea  name="description" value="{{old('description')}}" class="form-control" placeholder="Type your Descriptions here..." rows="5">{{old('description')}}</textarea>

                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                              <strong>{{ $errors->first('description') }}</strong>
                                                          </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                {{-- <button type="submit" class="btn-lg btn btn-primary">Submit</button> --}}

                                                <button type="submit" class="btn-lg btn-rounded btn btn-block btn-primary waves-effect waves-light ">Submit </button>


                                            </form>
                                        </div>
                                    </div>

                                </div><!-- end row -->

                            </div> <!-- end card-box -->

                        </div><!-- end col -->

                    </div><!-- end row -->

                </div> <!-- container -->

            </div> 
            <!-- End Page content -->

        @endsection
