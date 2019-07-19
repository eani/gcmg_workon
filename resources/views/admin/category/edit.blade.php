
@extends('layouts.admin')


    @section('title')
        GCMG - Edit Category
    @endsection

        @section('content')

            @section('Top Bar title')
                <h4 class="page-title">EDIT CATEGORY FILE</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                    <li class="breadcrumb-item active">Category Creation</li>
                    <li class="breadcrumb-item active">Edit Category File</li>
                </ol>
            @endsection


            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0">Edit an existing Category File</h4>
                                <p class="text-muted font-14 m-b-20">
                                    This table is to help you edit an existing Category file in the Resource Content
                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-20">
                                            <form  action="{{route('categories.update',['category'=>$category->id])}}" class="form-horizontal" role="form" method="POST">
                                                <input name="_method" type="hidden" value="PUT">
                                                {{csrf_field()}}
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Name of Category<span class="text-danger"> *</span></label> 
                                                    <div class="col-10">    
                                                        <input  name="name" value="{{old('name')?old('name'):$category->name}}" class="form-control" placeholder="Category Name here..." type="text">

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                              <strong>{{ $errors->first('name') }}</strong>
                                                          </span>
                                                        @endif
                                                    </div>
                                                </div>                                               
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label">Category Type<span class="text-danger"> *</span></label>
                                                    <div class="col-10">
                                                        <select name="type" class="custom-select mt-0">
                                                            <option Value="{{$category->type}}">{{$category->type}} Type</option>
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
                                                        <textarea  name="description" value="{{old('description')}}" class="form-control" placeholder="Type your Descriptions here..." rows="5">{{old('description')?old('description'):$category->description}}</textarea>

                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                              <strong>{{ $errors->first('description') }}</strong>
                                                          </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                <button type="submit" class="btn-lg btn-rounded btn btn-block btn-primary waves-effect waves-light ">Submit </button>


                                            </form>
                                        </div>
                                    </div>

                                </div><!-- end row -->

                                
                                                                
                            </div>
                        </div>
                    
                    </div> <!-- end Ist row -->


                </div> <!-- container -->

            </div> 
            <!-- End Page content -->

        @endsection

        @section('scripts')
           
        @endsection