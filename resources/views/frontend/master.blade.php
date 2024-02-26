<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {!! isset($siteSettings->default_seo_code_on_header) ? $siteSettings->default_seo_code_on_header : '' !!}
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/plugins.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/iconplugins.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/style.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/responsive.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/theme-dark.css">

    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/custom.css">
    <title>BiddaBari - The First Job Study Online Platform in Bangladesh</title>

    <!-- HELPER CSS -->
    <link href="{{ asset('/') }}backend/assets/css/helper.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('/') }}frontend/assets/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/news-tinker/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}frontend/assets/css/custom-my-mod.css">

    <style>
        .box-shadow {
            box-shadow: 1px 1px 10px 0px rgba(0,0,0,0.75);
            -webkit-box-shadow: 1px 1px 10px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 1px 1px 10px 0px rgba(0,0,0,0.75);
        }
    </style>
    <style>
        .student-panel-menu li a { color: white; font-size: 20px;}
        .student-panel-menu li:hover a { color: #85AF54!important;}
        .st-menu-active { color: #85AF54!important; }
        .content-shadow{box-shadow: 0px 0px 25px #D6D6D6;}
    </style>
    <style>
        /* width */
        ::-webkit-scrollbar {
          width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
          background: #f1f1f1;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
          background: #F18345;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
          background: black;
        }
    </style>
    @stack('style')
</head>
<body>

@include('frontend.includes.header')


@yield('body')

@include('frontend.includes.footer')

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>
<!-- Messenger Chat Plugin Code -->


<script src="{{ asset('/') }}frontend/assets/js/jquery.min.js"></script>

<!--<script src="{{ asset('/') }}frontend/assets/js/plugins.js"></script>-->

<script src="{{ asset('/') }}frontend/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/meanmenu.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/ajaxchimp.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/form-validator.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/contact-form-script.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/magnific-popup.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/aos.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/odometer.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/appear.min.js" type="text/javascript"></script>
<script src="{{ asset('/') }}frontend/assets/js/tweenMax.min.js" type="text/javascript"></script>



<script src="{{ asset('/') }}frontend/assets/js/custom.js"></script>


<script src="{{ asset('/') }}frontend/assets/news-tinker/acmeticker.js"></script>
<script src="{{ asset('/') }}frontend/assets/js/multi-countdown.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


@yield('js')

{{--custom js--}}
<script src="{{ asset('/') }}frontend/assets/js/my-custom-mod.js"></script>


<!-- Toastr Css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Sweet Alert -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet" />
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Sweet Alert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
@endif
@if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif
@if(Session::has('customError'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{{ Session::get('customError') }}",
            icon: 'error',
            confirmButtonText: 'Ok'
        })
    </script>
@endif

{{--fb messenger integrate start--}}
<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "1652435885033225");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v18.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
{{--fb messenger integrate end--}}


<script>
    let base_url = {!! json_encode(url('/')) !!}+'/';
</script>

<script>
    function addSimpleProCard(spid) {
        console.log(spid);
        var formcls = '.addSimpleCardFrom'+spid;
        var formurl = $(formcls).attr('action');
        var formurl = $(formcls).attr('action');
        // var cart= $('#cart_amount').text('sar');

        $.ajax({
            url : formurl,
            method : 'Post',
            data : $(formcls).serialize(),
            success : function(response){
                if(response.status == 'success'){
                    // console.log('success');
                    toastr.success(response.msg,'Success');
                    $('.cart_count').html(`<a href="{{ route('front.view-cart') }}" class="default-btn ">এখনই কিনুন</a>`);
                }else{
                    toastr.error(response.msg,'Failed');
                }
            }
        });
    }
</script>

@stack('script')
{!! isset($siteSettings) ? $siteSettings->default_seo_code_on_footer : '' !!}
</body>
</html>
