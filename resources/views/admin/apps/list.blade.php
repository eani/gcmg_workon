
@extends('layouts.admin')


    @section('title')

        GCMG - List of Created Application Media

    @endsection


        @section('content')

            @section('Top Bar title')
                <h4 class="page-title"> APPLICATIONS MEDIA </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                    <li class="breadcrumb-item active">Applications Media</li>
                    <li class="breadcrumb-item active">View All</li>
                </ol>
            @endsection


            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="m-t-0 header-title"> LIST OF CREATED APPLICATIONS MEDIA </h4>
                                <p class="text-muted font-14 m-b-20">
                                    You can edit or delete your prefered Applications list.
                                </p>

                            <table id="datatable-buttons" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
                                    {{-- <table id="datatable" class="table datatable table-striped table-bordered" cellspacing="0" width="100%"> --}}
                                    <thead>
                                        <tr>
                                            <th>Name of Application</th>
                                            <th>Category</th>
                                            <th>Number of Media</th>
                                            <th>Description</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($applications as $application)    
                                            <tr>
                                                <td>{{$application->name}}</td>
                                                <td>{{$application->category->name}}</td>
                                                <td>{{$application->applicationsmedia->count()}}</td>
                                                <td>{{$application->description}}</td>
                                                <td>
                                                    <a href="{{route('applications.edit',['application' => $application->id])}}" class="btn btn-success btn-rounded waves-light waves-effect">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{route('applications.destroy',['application'=>$application->id])}}"
                                                      method="POST" class="form-horizontal"
                                                      onsubmit="return confirm('Are you sure you want to delete ({{$application->name}}) ?');">
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
