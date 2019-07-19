
@extends('layouts.admin')


    @section('title')

        GCMG - List of Created Audio Media

    @endsection


        @section('content')

            @section('Top Bar title')
                <h4 class="page-title"> AUDIO MEDIA </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                    <li class="breadcrumb-item active">Audio Media</li>
                    <li class="breadcrumb-item active">View All</li>
                </ol>
            @endsection


            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                    <h4 class="m-t-0 header-title"> LIST OF CREATED AUDIO MEDIA </h4>
                                    <p class="text-muted font-14 m-b-20">
                                        You can edit or delete your prefered Audio list.
                                    </p>

                                    {{-- <table class="table datatable"> --}}
                                    <table id="datatable-buttons" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name of Audio File</th>
                                                <th>Category</th>
                                                <th>Number of Media</th>
                                                <th>Description</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($audios as $audio)    
                                        <tr>
                                            <td>{{$audio->name}}</td>
                                            <td>{{$audio->category->name}}</td>
                                            <td>{{$audio->audiosmedia->count()}}</td>
                                            <td>{{$audio->description}}</td>
                                            <td>
                                                <a href="{{route('audio.edit',['audio' => $audio->id])}}" class="btn btn-success btn-rounded waves-light waves-effect">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('audio.destroy',['audio'=>$audio->id])}}"
                                                  method="POST" class="form-horizontal" 
                                                  onsubmit="return confirm('Are you sure you want to delete ({{$audio->name}}) ?');">
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
