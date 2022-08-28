<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Finance79</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        @yield('seo')
        @yield('styles')
        @include("frontend.container.css")
    </head>

    <body>
        <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an 
        <strong>outdated</strong> browser. Please 
        <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
    </p>
    <![endif]-->
        <!-- Add your site or application content here -->
        <!-- Preloader Start Here -->
        <div id="preloader"></div>
        <!-- Preloader End Here -->
        <div id="wrapper" class="wrapper">
            <!-- Header Area Start Here -->
            @include("frontend.container.header")
            <!-- Header Area End Here -->
            <!-- News Feed Area Start Here -->
            @include("frontend.container.header2")
            <!-- News Feed Area End Here -->
            <!-- News Slider Area Start Here -->
              
            <!-- News Slider Area End Here -->
            @yield('content')
            <!-- Footer Area Start Here -->
            @include("frontend.container.footer")
            <!-- Footer Area End Here -->
            <!-- Modal Start-->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="title-login-form">Login</div>
                        </div>
                        <div class="modal-body">
                            <div class="login-form">
                                <form>
                                    <label>Username or email address *</label>
                                    <input type="text" placeholder="Name or E-mail" />
                                    <label>Password *</label>
                                    <input type="password" placeholder="Password" />
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox" type="checkbox" checked>
                                        <label for="checkbox">Remember Me</label>
                                    </div>
                                    <button type="submit" value="Login">Login</button>
                                    <button class="form-cancel" type="submit" value="">Cancel</button>
                                    <label class="lost-password">
                                        <a href="#">Lost your password?</a>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End-->
            <!-- Offcanvas Menu Start -->
            <div id="offcanvas-body-wrapper" class="offcanvas-body-wrapper">
                <div id="offcanvas-nav-close" class="offcanvas-nav-close offcanvas-menu-btn">
                    <a href="#" class="menu-times re-point">
                        <span></span>
                        <span></span>
                    </a>
                </div>
                <div class="offcanvas-main-body">
                    <ul id="accordion" class="offcanvas-nav panel-group">
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="fa fa-home" aria-hidden="true"></i>Home Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseOne" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="index.html">Home 1</a>
                                        </li>
                                        <li>
                                            <a href="index2.html">Home 2</a>
                                        </li>
                                        <li>
                                            <a href="index3.html">Home 3</a>
                                        </li>
                                        <li>
                                            <a href="index4.html">Home 4</a>
                                        </li>
                                        <li>
                                            <a href="index5.html">Home 5</a>
                                        </li>
                                        <li>
                                            <a href="index6.html">Home 6</a>
                                        </li>
                                        <li>
                                            <a href="index7.html">Home 7</a>
                                        </li>
                                        <li>
                                            <a href="index8.html">Home 8</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="author-post.html">
                                <i class="fa fa-user" aria-hidden="true"></i>Author Post Page</a>
                        </li>
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>Post Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseTwo" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="post-style-1.html">Post Style 1</a>
                                        </li>
                                        <li>
                                            <a href="post-style-2.html">Post Style 2</a>
                                        </li>
                                        <li>
                                            <a href="post-style-3.html">Post Style 3</a>
                                        </li>
                                        <li>
                                            <a href="post-style-4.html">Post Style 4</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>News Details Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseThree" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="single-news-1.html">News Details 1</a>
                                        </li>
                                        <li>
                                            <a href="single-news-2.html">News Details 2</a>
                                        </li>
                                        <li>
                                            <a href="single-news-3.html">News Details 3</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="archive.html">
                                <i class="fa fa-archive" aria-hidden="true"></i>Archive Page</a>
                        </li>
                        <li class="panel panel-default">
                            <div class="panel-heading">
                                <a aria-expanded="false" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    <i class="fa fa-picture-o" aria-hidden="true"></i>Gallery Pages</a>
                            </div>
                            <div aria-expanded="false" id="collapseFour" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="offcanvas-sub-nav">
                                        <li>
                                            <a href="gallery-style-1.html">Gallery Style 1</a>
                                        </li>
                                        <li>
                                            <a href="gallery-style-2.html">Gallery Style 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="404.html">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>404 Error Page</a>
                        </li>
                        <li>
                            <a href="contact.html">
                                <i class="fa fa-phone" aria-hidden="true"></i>Contact Page</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Offcanvas Menu End -->
        </div>
        <!-- Wrapper End -->
        @include("frontend.container.javascripts")
        @yield('js')
    </body>

</html>