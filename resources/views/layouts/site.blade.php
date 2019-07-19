<!DOCTYPE html>
<html lang="en">
    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Ani Offei">
        <meta name="description" content="A fully featured Resource System for Great Commision Movement Ghana - GCMG">
        <meta name="keywords" content="GCMG">

    <title>@yield('title','Welcome')</title>

    @include('includes.sites.links')
    

    </head>

    <body>

    <!-- ========== Start Yielding Content ========== -->
        
        @yield('content')

        <!-- End Content Yielding-->
        
        @include('includes.sites.footer') 
        
        @include('includes.sites.scripts')

    </body>

</html>
