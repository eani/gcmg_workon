
@extends('layouts.admin')


    @section('title')
        GCMG - Audio Creation
    @endsection


        @section('content')

            @section('Top Bar title')
                <h4 class="page-title">AUDIO MEDIA</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                    <li class="breadcrumb-item active">Audio Media</li>
                    <li class="breadcrumb-item active">Create New</li>
                </ol>
            @endsection

            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0">Create new Audio file</h4>
                                <p class="text-muted font-14 m-b-20">
                                    This table is to help you add new Audio files to the Resource Contents..
                                </p>

                                <form id="form1" action="{{route('audio.store')}}" role="form" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Name of Audio File<span class="text-danger"> *</span></label>
                                        <input name="name" value="{{old('name')}}" parsley-trigger="change" placeholder="Audio File Name here..." class="form-control" id="userName" type="text">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Category Type<span class="text-danger"> *</span></label>
                                            <select name="category_id" class="custom-select mt-0">
                                                <option Value="">Open this select menu to choose the Audio type</option>
                                                    @foreach($category_types as $category_type)
                                                        <option @if(old('category_id') == $category_type->id) selected @endif
                                                        value="{{$category_type->id}}">{{$category_type->name}}</option>
                                                    @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="help-block">
                                                  <strong>{{ $errors->first('category_id') }}</strong>
                                              </span>
                                            @endif
                                    </div>

                                    <div class="form-group row">
                                         <label class="col-2 col-form-label">Description</label>
                                             <div class="col-12">
                                                 <textarea name="description" class="form-control" placeholder="Type your Descriptions here..." rows="5">{{old('description')}}</textarea>
                                             </div>
                                    </div>
                                    <input type="hidden" id="app_code" value="{{$audiocode}}" name="code">
                                </form>
                                <h4 class="header-title m-t-0">Dropzone for the Audio File Uploads <span class="text-danger"> </span></h4>
                                <p class="text-muted font-14 m-b-10">
                                    NB: All Files uploaded here must be related to Audios only.
                                </p>

                                <form method="post" action="{{ route('audio-media.store') }}"
                                      enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="app_code" value="{{$audiocode}}" name="code">
                                    <div class="dz-message">
                                        <div class="col-xs-12">
                                            <div class="message">
                                                <p>Drop your Audio here or Click to Upload</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fallback">
                                        <input type="file" name="file" multiple>
                                    </div>
                                </form>

                                <div>
                                    <button type="submit" class="btn-lg btn-rounded btn btn-block btn-primary waves-effect waves-light" id="submit-all" onclick="submitform()"><span class="accept"></span>Submit</button>
                                </div>

                            </div>
                        </div>
                    
                    </div> <!-- end Ist row -->

                </div> <!-- container -->

            </div> 
            <!-- End Page content -->

        @endsection