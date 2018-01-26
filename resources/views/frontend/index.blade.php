@extends('frontend.layouts.app')

@section('content')
    <!-- ====== Preloader ======  -->
        <div class="loading">
            <div class="load-circle">
            </div>
        </div>
        <!-- ======End Preloader ======  -->

        <!-- ====== button-top ======  -->
        <div class="button-top" data-scroll-nav="0">
            <span>
                <i class="fa fa-angle-up" aria-hidden="true"></i>
            </span>
        </div>
        <!-- ======End button-top ======  -->

        <!-- ====== Navgition ======  -->
        <nav class="navbar navbar-default">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-icon-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <!-- logo -->
              <a href="#">
                <div class="logo">Jon Ander</div>
              </a>

            </div>

            <!-- Collect the nav links, and other content for toggling -->
            <div class="collapse navbar-collapse" id="nav-icon-collapse">
              
              <!-- links -->
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-scroll-nav="0" class="active">Home</a></li>
                <li><a href="#" data-scroll-nav="1">@lang('cv.menu.about')</a></li>
                <li><a href="#" data-scroll-nav="2">@lang('cv.menu.resume')</a></li>
                <li><a href="#" data-scroll-nav="3">@lang('cv.menu.works')</a></li>
                <li><a href="#" data-scroll-nav="4">@lang('cv.menu.contact')</a></li>
                <li>
                    <div class="dropdown">
                        <a class="dropbtn">@lang('menus.language-picker.language')</a>
                        <div class="dropdown-content">
                            <a href="/lang/en">@lang('menus.language-picker.langs.en')</a>
                            <a href="/lang/es">@lang('menus.language-picker.langs.es')</a>
                        </div>
                    </div>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>
        <!-- ====== End Navgition ======  -->

        <!-- ====== Header ======  -->
        <section id="home" class="header" data-scroll-index="0">
            <div class="container">
                <div class="row">
                    <div class="v-middle">
                        <div class="caption">
                            <h4>Hi,</h4>
                            <h1>I'm  Jon Ander</h1>
                            <div class="type">
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== End Header ======  -->

        @include('frontend.includes.about')

        @include('frontend.includes.resume')

        @include('frontend.includes.numbers')

        

        @include('frontend.includes.portfolio')

        @include('frontend.includes.contact')

        
       





       
        <!-- jQuery -->
        <script src="js/app.js"></script>
@endsection
