
@extends('layouts.site')

@section('title')
WELCOME TO GCMG - DIGITAL MINISTRY
@endsection
    
    <!-- App favicon -->
    <link rel="icon" href="{{asset('sites_assets/img/assets/favicon.png')}}" type="image/png">  
    <!-- Main CSS --> 
    <link href="{{asset('sites_assets/css/plugins.css')}}" rel="stylesheet" type="text/css" media="all"> 
    <!-- Themify Icon -->  
    <link href="{{asset('sites_assets/css/theme.css')}}" rel="stylesheet" type="text/css" media="all">  
    <!-- Simple line Icon -->
    <link href="{{asset('sites_assets/css/icon-fonts.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- Custom CSS -->
    <link href="{{asset('sites_assets/css/custom.css')}}" rel="stylesheet" type="text/css" media="all">  
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300%7CMontserrat:400,700%7CRaleway:400,200,300' rel='stylesheet' type='text/css'> 


    <script type="text/javascript">
    if(top != self) {
        window.open(self.location.href, '_top');
    }
    </script>


    @include('includes.sites.header')
       
    @include('includes.sites.slider')

@section('content')

        <!-- Site Wrapper -->
        <div class="site-wrapper">  
            <!-- Team Section -->
            <section class="pt130 pb100"> 
                <div class="container">    
                    <div class="row text-center">  
                        
                        <div class="col-md-12 text-center section-heading mb50">  
                            <h5>Browse Categories</h5>
                            <h3 class="underline-center">Christian Based Resources</h3> 
                            <p>Enjoy the wide range of Christian based resources that have been carefully selected to help your spiritual growth in CHRIST.<br>As you grow in CHRIST please share with others so they also grow aswell</p>
                        </div>

                        <div class="col-md-3 col-sm-6 team-col">
                            <div class="team-member">
                                <div class="team-member-image">
                                    <img src="{{asset('sites_assets/img/team/music-list.jpg')}}" class="img-responsive" alt="" />
                                    <div class="team-member-detail hover-bottom">  
                                        <h4>Music / Audio Resources</h4>
                                        <p>Enjoy more Here.</p>
                                        <a href="/audio" class="btn btn-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="member-info text-left">
                                <h4>Music / Audio Resources
                                    <small>Resources for your Upliftment</small>
                                </h4>   
                                <p>This section includes the audio versions of Preachings, Teachings, Words of encouragement and etc. Moreover explore this section to enrich your spiritual Life.</p>
                            </div>
                        </div> 

                        <div class="col-md-3 col-sm-6 team-col">
                            <div class="team-member">
                                <div class="team-member-image">
                                    <img src="{{asset('sites_assets/img/team/eBook-List.jpg')}}" class="img-responsive" alt="" />
                                    <div class="team-member-detail hover-bottom">  
                                        <h4>Videos Resources</h4>
                                        <p>Enjoy more Here.</p>
                                        <a href="/videos" class="btn btn-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="member-info text-left">
                                <h4>Videos Resources
                                    <small>Motivated And Inspired Videos</small>
                                </h4>  
                                <p>This Section includes the video versions of Preachings, Teachings, Words of encouragement and etc. Moreover explore this section to enrich your spiritual Life.</p>
                            </div>
                        </div> 

                        <div class="col-md-3 col-sm-6 team-col">
                            <div class="team-member">
                                <div class="team-member-image">
                                    <img src="{{asset('sites_assets/img/team/video-list.jpg')}}" class="img-responsive" alt="" />
                                    <div class="team-member-detail hover-bottom">  
                                        <h4>Electronic Books Resources</h4>
                                        <p>Enjoy more Here.</p>                                       
                                        <a href="/books" class="btn btn-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="member-info text-left">
                                <h4>Electronic Books Resources
                                    <small>Well stuctured And Documented eBooks</small>
                                </h4>   
                                <p>This section includes the electronic Books versions which span across the category of Preachings, Prayer life, Spiritual growth  and etc. Moreover explore this section to enrich your spiritual Life.</p>
                            </div>
                        </div>    
                            
                        <div class="col-md-3 col-sm-6 team-col">
                            <div class="team-member">
                                <div class="team-member-image">
                                    <img src="{{asset('sites_assets/img/team/app-list.jpg')}}" class="img-responsive" alt="" />
                                    <div class="team-member-detail hover-bottom">  
                                        <h4>Mobile Apps Resources</h4>
                                        <p>Enjoy more Here.</p>                                        
                                        <a href="/applications" class="btn btn-primary">View Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="member-info text-left">
                                <h4>Mobile Apps Resources
                                    <small>Apps that changes your Spiritual Life</small>
                                </h4>  
                                <p>This section includes the Applications that will help you embark on the journey of  Evangelism, Discipleship and more.... Moreover explore this section to enrich your spiritual Life.</p>
                            </div>
                        </div>
                        
                          
                        
                    </div>  
                </div>
            </section>
            <!-- End Team Section -->
            
            <!-- Get Connected -->
            <section id="get-connected" class="pt140 pb110 parallax bg-img-3 bg-overlay"> 
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12 text-center section-heading">
                            <h5 class="white">Kickstart your Spiritual Growth</h5>
                            <h1 class="white">Get Connected</h1>
                        </div>  
                            
                        <div class="col-md-12">
                            <ul class="connected-icons social-icons light">
                                
                                <li class="connected-icon">
                                    <a target="email" href="mailto:nationaloffice@gcmgh.org">
                                        <i class="ion-email-unread"></i> 
                                    </a>
                                </li> 

                                <li class="connected-icon">
                                    <a target="_blank" href="https://www.gcmghana.org/">
                                        <i class="ion-earth"></i> 
                                    </a>
                                </li> 
                                
                                
                               <!--  <li class="connected-icon">
                                    <a target="_blank" href="#">
                                        <i class="ion-social-youtube"></i> 
                                    </a>
                                </li> -->

                                <li class="connected-icon">
                                    <a target="_blank" href="https://www.facebook.com/ghanagcm/">
                                        <i class="ion-social-facebook"></i> 
                                    </a>
                                </li>

                                <li class="connected-icon">
                                    <a target="_blank" href="https://twitter.com/GcmGhana">
                                        <i class="ion-social-twitter"></i>  
                                    </a>
                                </li>

                                <!-- <li class="connected-icon">
                                    <a target="_blank" href="#">
                                        <i class="ion-social-instagram"></i> 
                                    </a>
                                </li>  --> 

                                                                                               
                            </ul>        
                        </div>  
                        
                    </div>
                </div>
            </section>
            <!-- End Get Connected -->      			
                        
        </div>
        <!-- End Site Wrapper -->

    </body>
</html>

@endsection