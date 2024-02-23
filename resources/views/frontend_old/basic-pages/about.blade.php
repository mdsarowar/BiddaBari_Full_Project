@extends('frontend.master')

@section('body')

    <div class="inner-banner" style="background-image: url({{ asset('frontend') }}/assets/images/biddabari-about.jpg);  background-position: center top; background-attachment: fixed;" >
        <div class="container">
            <div class="inner-title text-center">
                <h3>About Us</h3>
                <ul>
                    <li>
                        <a href="{{ route('front.home') }}">Home</a>
                    </li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="enrolled-area-two py-3" style="background-color: #F0F0F0">
        <div class="container">
            <div class="row align-items-center card-body ab">
                <div class="col-lg-4 ">
                    <div class="card ab-shadow ab-img">
                        <div class="enrolled-img-three m-t-30 text-center">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/j6RzLRZwuCNyx61iljyofCu4LVHk5t7X.jpg" alt="Enrolled">
                            <div>
                                <h3 class="f-s-32 mb-0">M I Prodhan Mukul</h3>
                                <p class="f-s-20">BCS Cadre & Career Specialist. Founder, Biddabari</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card ab-shadow ab-content">
                        <div class="enrolled-content m-t-10 m-b-8 m-r-30 m-l-30 ">
                            <div class="section-title">
                                <span class="f-s-35 mb-0">WHO WE ARE</span>
                                <p class="pt-0">BCS Preparation or Other JOB preparation or any sort of Competitive Exam facing is not an easier task now a days. Hundreds and thousands of brilliant Candidates are now fighting to achieve their goals with one another.</p>
                                <p class="p-t-10">"Biddabari App" is such a different and unique online platform where you can rely yourself. You just keep your faith on Biddabari, believe it, it will do the rest. Biddabari App will give you all you need to be successful. Through Biddabari's selective books, notes, assignments, quality lecture class, Live classes with all respected experienced teachers along with Biddabari's BCS Cadre Mentor's special tips will surely fulfil your desire.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="instructors-area py-3" >
        <div class="container">
            <div class="section-title text-center mb-45">
                <h2>Meet our Team</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/j6RzLRZwuCNyx61iljyofCu4LVHk5t7X.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">M I Prodhan Mukul</a></h3>
                            <span>BCS Cadre & Career Specialist. Founder, Biddabari</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/pxl1RjegF9AJ3Xv2VqS07NKsopE0GzDnKt14GVSm.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Md. Anwar Hossain Tamim</a></h3>
                            <span>GM Biddabari</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/QseeWuKN7MfWiQuLBqdKDjJuk66AyBFUo1NInXfu.png" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Monjurul Islam</a></h3>
                            <span>Manager</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="instructors-card ab-shadow">
                        <a href="instructors-details.html">
                            <img src="{{ asset('/') }}frontend/assets/images/courses/ik62fWZmfzW5pKLNIAfqwD3PwAB2JeGOpy6NpHI6.jpg" alt="Team Images">
                        </a>
                        <div class="content py-1">
                            <ul class="instructors-social">
                                <li class="share-btn"><i class="ri-add-line"></i></li>
                                <li>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <i class="ri-instagram-line"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank">
                                        <i class="ri-twitter-fill"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/" target="_blank">
                                        <i class="ri-linkedin-box-line"></i>
                                    </a>
                                </li>
                            </ul>
                            <h3><a href="instructors-details.html">Mizanur Rahman</a></h3>
                            <span>Software Engineer & IT Officer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
