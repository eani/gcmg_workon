
@extends('layouts.admin')


    @section('title')

        GCMG - List of Downloaded Media

    @endsection


        @section('content')

            @section('Top Bar title')
                <h4 class="page-title"> DOWNLOADED MEIDA </h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin">HOME</a></li>
                    <li class="breadcrumb-item active">Downloads</li>
                </ol>
            @endsection


            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                    <h4 class="m-t-0 header-title"> LIST OF DOWNLOADED MEDIA </h4>
                                    <p class="text-muted font-14 m-b-20">
                                        View list of all Downloaed Media List.
                                    </p>

                                    {{-- <table class="table datatable"> --}}
                                    <table id="datatable-buttons" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name of Media</th>
                                                <th>Media Type</th>
                                                <th>Number of Downloads</th>
                                                <th>Date of Download</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($downlquery as $download)    
                                        <tr>
                                            <td>{{$download->media_name}}</td>
                                            <td>{{$download->media_type}}</td>
                                            <td>{{$download->no_of_downloads}}</td>
                                            <td>{{$download->date}}</td>
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
