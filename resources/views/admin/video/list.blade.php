
@extends('layouts.admin')


    @section('title')

        GCMG - List of Created Video Media

    @endsection


        @section('content')

            @section('Top Bar title')
                <h4 class="page-title"> VIDEO MEDIA </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                    <li class="breadcrumb-item active">Video Media</li>
                    <li class="breadcrumb-item active">View All</li>
                </ol>
            @endsection


            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                    <h4 class="m-t-0 header-title"> LIST OF CREATED VIDEO MEDIA </h4>
                                    <p class="text-muted font-14 m-b-20">
                                        You can edit or delete your prefered Video list.
                                    </p>

                                    {{-- <table class="table datatable"> --}}
                                    <table id="datatable-buttons" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name of Video File</th>
                                                <th>Category</th>
                                                <th>Number of Media</th>
                                                <th>Description</th>
                                                <th>Action 1</th>
                                                <th>Action 2</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($videos as $video)    
                                        <tr>
                                            <td>{{$video->name}}</td>
                                            <td>{{$video->category->name}}</td>
                                            <td>{{$video->videosmedia->count()}}</td>
                                            <td>{{$video->description}}</td>
                                            <td>
                                                <a href="{{route('videos.edit',['video' => $video->id])}}" class="btn btn-success btn-rounded waves-light waves-effect">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('videos.destroy',['video'=>$video->id])}}"
                                                  method="POST" class="form-horizontal" 
                                                  onsubmit="return confirm('Are you sure you want to delete ({{$video->name}}) ?');">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    
                                                    <button type="submit" class="btn btn-danger btn-rounded waves-light waves-effect">
                                                        <i class="fa fa-trash-o"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    
                    </div> <!-- end Ist row -->


                </div> <!-- container -->

            </div> 
            <!-- End Page content -->

        @endsection

        @section('scripts')

        @endsection
