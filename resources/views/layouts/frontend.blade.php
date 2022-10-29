<!doctype html>
<html lang="vi" xml:lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow" />
    <meta name="Language" content="vi" />
    <meta name="distribution" content="Global" />
    @yield('seo')
    @yield('styles')
    @include("frontend.container.css")
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-247594747-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-247594747-1');
    </script>
</head>

<body>

    <div id="preloader"></div>
    <div id="wrapper" class="wrapper">
        @include("frontend.container.header")

        @include("frontend.container.header2")
        @yield('content')
        @include("frontend.container.footer")

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

    </div>

    @include("frontend.container.javascripts")
    @yield('js')
</body>

</html>