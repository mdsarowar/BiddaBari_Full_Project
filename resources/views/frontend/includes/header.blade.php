<header class="top-header">
    <div class="container-fluid">
        <div class="custome_col_4">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 mobile_res">
                    <div class="header-left">
                        <ul>
                            <li>
                                <i class="ri-phone-fill"></i>
                                <a href="">+8801896060809</a>
                            </li>
                            <li>
                                <i class="ri-mail-fill"></i>
                                <a href=""><span class="__cf_email__">info@biddabari.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-4 acme-news-ticker">
                    <div class="acme-news-ticker-box">
                        <ul class="my-news-ticker">
                            @if(!empty($scrollingNotices))
                            @forelse($scrollingNotices as $scrollingNotice)
                            <li><a href="" class="text-white">{!! strip_tags($scrollingNotice->body) !!}</a></li>
                            @empty
                            <li><a href="">এখনো কোন নোটিশ পাবলিশ করা হয় নি</a></li>
                            @endforelse
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- </div> -->
                <div class="col-lg-1 col-md-4 mobile_res">
                    <div class="header-right">
                        <ul class="social-list">
                            <li>
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
{{--                            <li>--}}
{{--                                <a href="https://www.pinterest.com/" target="_blank">--}}
{{--                                    <i class="ri-instagram-line"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li>
                                <a href="https://drive.usercontent.google.com/download?id=10iEnOUjjjhQyc6lM6rv6P1QKAX81Zo_W&export=download&authuser=0" target="_blank">
                                    <i class="ri-android-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="navbar-area">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{ route('front.home') }}">
                        <img src="{{ asset(isset($siteSettings) ? $siteSettings->logo : 'frontend/assets/images/logos/logo-small.png') }}"
                            class="logo-one" alt="logo">
                        <img src="{{ asset(isset($siteSettings) ? $siteSettings->logo : 'frontend/assets/images/logos/logo-small-white.png') }}"
                            class="logo-two" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav nav-area">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="{{ route('front.home') }}">
                    <img src="{{ asset(isset($siteSettings) ? $siteSettings->logo : 'frontend/assets/images/logos/logo.png') }}"
                        class="logo-one" alt="Logo">
                    <img src="{{ asset(isset($siteSettings) ? $siteSettings->logo : 'frontend/assets/images/logos/logo-2.png') }}"
                        class="logo-two" alt="Logo">
                </a>
                <div class="nav-widget-form custom_search_res">
                    <form class="search-form search-form-bg" action="{{ route('search-content-home') }}" method="post">
                        @csrf
                        <input type="search" class="form-control" name="search_content" placeholder="Search courses">
                        <button type="submit">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ route('front.home') }}"
                                class="nav-link {{ request()->is('/') ? 'active' : '' }}"> হোম</a> </li>
                        <li class="nav-item"><a href="{{ route('front.all-courses') }}"
                                class="nav-link {{ request()->is('all-courses') ? 'active' : '' }}"> কোর্সসমূহ</a> </li>
                        <li class="nav-item"><a href="{{ route('front.all-exams') }}"
                                class="nav-link {{ request()->is('all-exams') ? 'active' : '' }}">পরীক্ষাসমূহ</a></li>
                        <li class="nav-item"><a href="{{ route('front.free-courses') }}"
                                class="nav-link {{ request()->is('free-courses') ? 'active' : '' }}">ফ্রি সার্ভিস</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('front.notices') }}"
                                class="nav-link {{ request()->is('all-notices') ? 'active' : '' }}">নোটিশ </a></li>
                        <li class="nav-item"><a href="{{ route('front.all-blogs') }}"
                                class="nav-link {{ request()->is('all-blogs') || request()->is('blog-details/*') ? 'active' : '' }}">ব্লগ</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('front.all-products') }}"
                                class="nav-link {{ request()->is('all-products') || request()->is('product-details/*') ? 'active' : '' }}">বই</a>
                        </li>

                    </ul>
                    <div class="others-options d-flex align-items-center">
                        <div class="optional-item dropdown">

                            @if(auth()->check())
                            <a href="" class="default-btn two dropdown-toggle border-radius-50"
                                data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                            <div class="dropdown-menu">
                                <div class="dropdown-item"><a href="{{ route('front.student.dashboard') }}"
                                        class="text-dark f-s-20">Dashboard</a></div>
                                <div class="dropdown-item"><a href="{{ route('front.all-job-circulars') }}"
                                        class="text-dark f-s-20">Job Circulars</a></div>
                                <div class="dropdown-item"><a href="{{ route('front.student.view-profile') }}"
                                        class="text-dark f-s-20">Profile</a></div>
                                <div class="dropdown-item"
                                    onclick="event.preventDefault(); document.getElementById('logoutForm').submit()">
                                    <a href="" class="text-dark f-s-20">Logout</a>
                                    <form action="{{ route('logout') }}" method="post" id="logoutForm">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                            @else
                            <a href="{{ route('login') }}" {{--data-bs-toggle="modal" data-bs-target="#authModal" --}}
                                class="default-btn two border-radius-50">Sign In</a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>


    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="side-item">
                    <a href="{{ route('login') }}" class=""><i class="ri-user-2-fill"></i></a>
                </div>
                <!-- <div class="circle-inner">
                    <div class="ri-search-line"></div>
                </div> -->
            </div>
            <!-- <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-item">
                            <form class="search-form" action="{{ route('search-content-home') }}" method="post">
                                @csrf
                                <input type="search" class="form-control" name="search_content" placeholder="Search courses">
                                <button type="submit">
                                    <i class="ri-search-line"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
