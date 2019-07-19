
@extends('layouts.site')


@section('title')
WELCOME TO GCMG - DIGITAL MINISTRY
@endsection

@section('content')

<!-- SLIDER -->
    <section class="slider d-flex align-items-center">
        {{-- <img src="sites_assets/images/slider.jpg" class="img-fluid" alt="#"> --}}
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap">
                                    <h1>Enrich your Christian Life with Great Christian Materials</h1>
                                    {{-- <h4>Let's discover great materials for your Christian Life.</h4> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-left">
                            <div class="col-md-12">
                                <form class="form-wrap mt-4">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <div class="col-md-2"> </div> {{-- Used to create the space --}}
                                        <input type="text" placeholder="What are your looking for?" class="btn-group1">                                    
                                        {{-- <div class="btn-group1">
                                            <div class="detail-filter">
                                                <form class="filter-dropdown">
                                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                                                      <option selected>Select Category</option>
                                                      <option value="1">Audios</option>
                                                      <option value="2">Books</option>
                                                      <option value="3">Mobile Apps</option>
                                                      <option value="3">Videos</option>
                                                    </select>
                                                </form>
                                                <div class="map-responsive-wrap">
                                                    <a class="map-icon" href="#"><span class="icon-location-pin"></span></a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>SEARCH<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>
                                <div class="slider-link">
                                    <a href="#">Browse Popular</a><span>or</span> <a href="#">Recently Added</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// SLIDER -->


    <!--============================= Browse Categories =============================-->
    <section class="main-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Browse Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <figure class="effect-ruby">
                                <a href="/audio">
                                    <img src="sites_assets/images/audio-list.jpg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Music / Audio Files </h5>
                                            <p>3998 Files for your Upliftment</p>
                                        </figcaption>
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <figure class="effect-ruby">
                                <a href="/books">
                                    <img src="sites_assets/images/eBook-List.jpg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Electronic Books </h5>
                                            <p>Well stuctured And Documented eBooks</p>
                                        </figcaption>
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <figure class="effect-ruby">
                                <a href="/videos">
                                    <img src="sites_assets/images/video-list.jpg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Videos </h5>
                                            <p>Motivated And Inspired Videos</p>
                                        </figcaption>
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="find-place-img_wrap">
                        <div class="grid">
                            <figure class="effect-ruby">
                                <a href="/applications">
                                    <img src="sites_assets/images/app-list.jpg" class="img-fluid" alt="img13" />
                                        <figcaption>
                                            <h5>Mobile Apps </h5>
                                            <p>Apps that changes your Spiritual Life</p>
                                        </figcaption>
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> 

@endsection