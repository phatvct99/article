<!-- jquery-->
<script src="{{ asset('frontend/js/jquery-2.2.4.min.js')}} " type="text/javascript"></script>
<!-- Plugins js -->
<script src="{{ asset('frontend/js/plugins.js')}} " type="text/javascript"></script>
<!-- Popper js -->
<script src="{{ asset('frontend/js/popper.js')}} " type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="{{ asset('frontend/js/bootstrap.min.js')}} " type="text/javascript"></script>
<!-- WOW JS -->
<script src="{{ asset('frontend/js/wow.min.js')}} "></script>
<!-- Owl Cauosel JS -->
<script src="{{ asset('frontend/vendor/OwlCarousel/owl.carousel.min.js')}} " type="text/javascript"></script>
<!-- Meanmenu Js -->
<script src="{{ asset('frontend/js/jquery.meanmenu.min.js')}} " type="text/javascript"></script>
<!-- Srollup js -->
<script src="{{ asset('frontend/js/jquery.scrollUp.min.js')}} " type="text/javascript"></script>
<!-- jquery.counterup js -->
<script src="{{ asset('frontend/js/jquery.counterup.min.js')}} "></script>
<script src="{{ asset('frontend/js/waypoints.min.js')}} "></script>
<!-- Isotope js -->
<script src="{{ asset('frontend/js/isotope.pkgd.min.js')}} " type="text/javascript"></script>
<!-- Magnific Popup -->
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js')}} "></script>
<!-- Ticker Js -->
<script src="{{ asset('frontend/js/ticker.js')}} " type="text/javascript"></script>
<!-- Custom Js -->
<script src="{{ asset('frontend/js/main.js?v=10')}}" type="text/javascript"></script>

<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);

    function loadMore() {
        page++;
        infinteLoadMore(page);
    };

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "/?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show();
                }
            })
            .done(function(response) {
                if (response.length == 0) {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                $("#data-wrapper").append(response);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
