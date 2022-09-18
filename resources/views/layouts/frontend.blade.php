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
            <div class="modal fade" id="showModalAds" role="dialog">
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
                                    <input type="password" placeholder="Password" />
                                    <input type="password" placeholder="Password" />
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

        </div>
        <!-- Wrapper End -->
        @include("frontend.container.javascripts")
        @yield('js')
    </body>

</html>