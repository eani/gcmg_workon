
@extends('layouts.admin')


    @section('title')
        GCMG - Edit Video File
    @endsection

        @section('content')

            @section('Top Bar title')
                <h4 class="page-title">EDIT VIDEO FILE</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                    <li class="breadcrumb-item active">Video Media</li>
                    <li class="breadcrumb-item active">Edit Video File</li>
                </ol>
            @endsection


            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0">Edit an existing Video File</h4>
                                <p class="text-muted font-14 m-b-20">
                                    This table is to help you edit an existing Video file in the Resource Content
                                </p>

                                <form id="form1" action="{{route('videos.update',['video'=>$video->id])}}" role="form"  method="POST">
                                    <input name="_method" type="hidden" value="PUT">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Name of the Video <span class="text-danger"> *</span></label>
                                        <input name="name" value="{{old('name')?old('name'):$video->name}}" parsley-trigger="change" placeholder="Book Name here..." class="form-control" id="userName" type="text">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <label>Category Type<span class="text-danger"> *</span></label>
                                            <select name="category_id" class="custom-select mt-0">
                                                <option Value="">Open this select menu to choose the Book type</option>
                                                    @foreach($category_types as $category_type)
                                                        <option 
                                                            @if(!empty(old('category_id')) and old('category_id') == $category_type->id)
                                                              selected="" 
                                                            @elseif($video->category_id == $category_type->id)
                                                              selected=""
                                                            @endif
                                                            value="{{$category_type->id}}">{{$category_type->name}}
                                                        </option>
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
                                                 <textarea name="description" class="form-control" placeholder="Type your Descriptions here..." rows="5">{{old('description')?old('description'):$video->description}}</textarea>
                                             </div>
                                     </div>
                                    <input type="hidden" id="app_code" value="{{$videocode}}" name="code">

                                </form>

                                @if($video->videosmedia->count() != "0")
                                     <h4 class="header-title m-t-0">Video Media <span class="text-danger"> </span></h4>
                                     <p class="text-info font-14 m-b-10">
                                         Use the delete button to remove your prefered attached media.
                                     </p>
                                     <div class="row">
                                         @foreach($video->videosmedia as $media)
                                             <div class="col-xl-2 ">
                                                 <div class="card-box widget-chart-two">
                                                     <img src="{{route('video.thumb')}}" style="width: 100px">
                                                     <p class="text-purple m-b-0 font-14">
                                                     {{$media->original_file}}<br>
                                                    ({{ $media->downloads->count() }} Downloads)
                                                     </p>
                                                     <form action="{{route('videos-media.destroy',['videos_vedium'=>$media->id])}}"
                                                       method="POST" class="form-horizontal"
                                                       onsubmit="return confirm('Are you sure you want to delete this Video media ({{$media->original_file}})?');"> 
                                                         <input name="_method" type="hidden" value="DELETE">
                                                         {{ csrf_field() }}
                                                         
                                                         <button type="submit" class="btn btn-danger btn-rounded waves-light waves-effect">
                                                             <i class="fa fa-trash-o"></i> Delete
                                                         </button>
                                                     </form>
                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                     @elseif($video->videosmedia->count() == "0")
                                         <h4 class="header-title m-t-0">video Media <span class="text-danger"> </span></h4>
                                         <p class="text-pink font-16 m-b-10">
                                             This record has no attached media.
                                         </p>
                                @endif

                                <h4 class="header-title m-t-0">Dropzone for the Video File Edit <span class="text-danger"> </span></h4>
                                <p class="text-muted font-14 m-b-10">
                                    NB: All Files uploaded here must be related to Videos only.
                                </p>

                                <form method="post" action="{{ route('videos-media.store') }}"
                                      enctype="multipart/form-data" class="dropzone" id="my-dropzone">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="app_code" value="{{$videocode}}" name="code">
                                    <div class="dz-message"> 
                                        <div class="col-xs-12">
                                            <div class="message">
                                                <p>Drop your Videos here or Click to Upload</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fallback">
                                        <input type="file" name="file" multiple/>
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

        @section('scripts')
           
        @endsection