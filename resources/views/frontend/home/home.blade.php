@extends('frontend.master')

@section('body')
<div class="hero-slider-area">
    <div class="hero-slider owl-carousel owl-theme">
        @foreach($homeSliderCourses as $homeSliderCourse)
        <div class="hero-item">
            <a href="{{ $homeSliderCourse->link }}" class="w-100">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 c-dnone">
                            <div class="hero-content ms-3">
                                <h1 style="font-size: 36px">{{ \Illuminate\Support\Str::words($homeSliderCourse->title,
                                    8, '....') }}</h1>
                                <p>
                                    {!! str()->words(strip_tags($homeSliderCourse->description), 25) !!}
                                </p>
                                <div class="banner-btn">
                                    {{-- <a
                                        href="{{ route('front.course-details', ['id' => $homeSliderCourse->id, 'slug' => $homeSliderCourse->slug]) }}"
                                        class="default-btn border-radius-50">Read More</a>--}}
                                    <button type="button" class="default-btn border-radius-50 text-dark f-s-22"
                                        style="background-color: #dedede!important;">ভর্তি হতে এখানে ক্লিক করুন</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="">
                                {{-- <a
                                    href="{{ route('front.course-details', ['id' => $homeSliderCourse->id, 'slug' => $homeSliderCourse->slug]) }}"><img
                                        src="{{ asset($homeSliderCourse->image) }}" class="w-100"
                                        alt="Home Slider" /></a>--}}
                                <img src="{{ asset($homeSliderCourse->image) }}" class="w-100" alt="Home Slider" />
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>


<div class="featured-area pt-2 pb-3">
    <div class="container">
        <div class="row align-items-center mb-45"></div>
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="{{ route('front.student.today-classes') }}" class="p-2">
                        <i class="flaticon-web-development"></i>
                        <h3>আজকের ক্লাস</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="{{ route('front.student.today-exams') }}" class="p-2">
                        <i class="flaticon-design"></i>
                        <h3>আজকের এক্সাম</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="javascript:void(0)" class="p-2">
                        <i class="flaticon-wellness"></i>
                        <h3>লাইভ এসাইনমেন্ট</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="{{ route('front.guideline') }}" class="p-2">
                        <i class="flaticon-heart-beat"></i>
                        <h3>গাইড লাইন</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="{{ route('front.instructors') }}" class="p-2">
                        <i class="flaticon-corporate"></i>
                        <h3>শিক্ষকবৃন্দ</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="javascript:void(0)" class="p-2">
                        <i class="flaticon-camera"></i>
                        <h3>শিক্ষার্থীর মন্তব্য</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="{{ route('front.all-gallery-images') }}" class="p-2">
                        <i class="flaticon-user"></i>
                        <h3>ফটো গ্যালারি</h3>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-6 col-m-6">
                <div class="featured-item-two">
                    <a href="{{ route('front.all-job-circulars') }}" class="p-2">
                        <i class="flaticon-folder"></i>
                        <h3>জব সার্কুলার</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@if(!empty($courseCategories))
<div class="categories-area section-bg py-5">
    <div class="container">
        <div class="section-title mb-45 text-center">
            <!--   <h2>কোর্স  <b>ক্যাটাগরি</b></h2>-->
            <h2>কোর্স <b>ক্যাটাগরি সমূহ</b></h2>
            <hr class="w-25 mx-auto bg-danger" />
        </div>

        <div class="row cat_mobile_res">
            @foreach($courseCategories as $courseCategory)
            <div class="col-md-3 col-m-6">
                <div class="categories-item">
                    <a
                        href="{{ route('front.category-courses', ['id' => $courseCategory->id, 'slug' => $courseCategory->slug]) }}">
                        <img src="{{ asset(isset($courseCategory->image) ? $courseCategory->image : 'frontend/logo/biddabari-card-logo.jpg') }}"
                            alt="Categories" class="w-100 border-0" style="height: 200px">
                    </a>
                    <div class="content">
                        <a
                            href="{{ route('front.category-courses', ['id' => $courseCategory->id, 'slug' => $courseCategory->slug]) }}">
                            <i class="{{ $courseCategory->icon ?? 'flaticon-web-development' }}"></i>
                            <h3>{{ $courseCategory->name ?? 'No Title' }}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if(!empty($courses))
<div class="courses-area-two py-5">
    <div class="container">
        <div class="section-title text-center mb-45">
            <!--   <span>কোর্স সমূহ</span>-->
            <h2>চলমান কোর্স সমূহ</h2>
            <h5>ভর্তি চলছে ... !!!</h5>
            <hr class="w-25 mx-auto bg-danger" />
        </div>
        <div class="row cat_mobile_res">
            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="courses-item">
                    <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">
                        <img src="{{ asset($course->banner ?? 'frontend/logo/biddabari-card-logo.jpg') }}" alt="Courses"
                            class="w-100 p-2" style="height: 230px" />
                    </a>
                    <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">
                        <div class="content">
                            <h3 class="py-2"><a
                                    href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">{{
                                    $course->title }}</a></h3>





                            <ul class="course-list">
                                {{-- <li><i class="ri-time-fill"></i> 06 hr</li>--}}
                                <li><i class="ri-vidicon-fill"></i> {{ $course->total_note ?? 0 }} lectures</li>
                                <li><i class="ri-file-pdf-line"></i> {{ $course->total_pdf ?? 0 }} PDF</li>
                                <li><i class="ri-a-b"></i> {{ $course->total_exam ?? 0 }} Exam</li>
                                <li><i class="ri-store-3-line"></i>{{ $course->total_live ?? 0 }} live class</li>
                                <div class="dis-course-price">
                                    @if($course->discount_type == 1 || $course->discount_type == 2)
                                    <span class="course-price"> ৳ <del>{{ $course->price }} </del> </span>
                                    <span class="dis-course-amount">৳ {{ $course->price-$course->discount_amount
                                        }}</span>
                                    @else
                                    <span class="dis-course-amount"> ৳ {{ $course->price }} </span>
                                    @endif
                                </div>
                            </ul>


                            
                            <div class="custome_dis_course_price">
                                @if($course->discount_type == 1 || $course->discount_type == 2)
                                <span class="course-price"> ৳ <del>{{ $course->price }} </del> </span>
                                <span class="dis-course-amount">৳ {{ $course->price-$course->discount_amount }}</span>
                                @else
                                <span class="dis-course-amount"> ৳ {{ $course->price }} </span>
                                @endif
                            </div>



                            <div class="bottom-content">
                                @if($course->order_status != 'true')
                                <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}"
                                    class="btn btn-warning">বিস্তারিত দেখুন</a>
                                @else
                                <a href="javascript:void(0)" class=""></a>
                                @endif
                                <div class="rating ">
                                    @if($course->order_status == 'true')
                                    <a href="javascript:void(0)" class="btn text-success">Active</a>
                                    @elseif($course->order_status == 'pending')
                                    <a href="javascript:void(0)" class="btn text-success">Pending</a>
                                    @else
                                    <a href="{{ route('front.checkout', ['id' => $course->id, 'slug' => $course->slug]) }}"
                                        class="btn btn-warning">কোর্সটি কিনুন</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@if(!empty($products))
<div class="section-bg py-5">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="section-title mt-rs-20">
                    <h2 class="text-center">বইসমূহ</h2>
                    <hr class="w-25 mx-auto bg-danger" />
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-6">
                <div class="blog-card">
                    <div class="book-btn-sec">
                        <a href="{{ route('front.product-details',['id'=>$product->id, 'slug'=>$product->slug]) }}"
                            class="read-btn btn btn-warning">Read More</a>
                        <a href="javascript:void(0)" class="read-btn btn btn-warning mt-1"> Add To Cart </a>
                    </div>
                    <a href="{{ route('front.product-details',['id'=>$product->id, 'slug'=>$product->slug]) }}">
                        <img src="{{ asset($product->image ?? 'frontend/logo/biddabari-card-logo.jpg') }}"
                            alt="{{ $product->title }}">
                    </a>
                    <div class="content">
                        <h3><a
                                href="{{ route('front.product-details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{
                                $product->title }}</a></h3>
                        <h5>TK {{$product->price}} </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<div class="counter-area pt-5 pb-4" style="background-color: #F18345 !important;">
    <div class="container">
        <div class="row">
            @foreach($numberCounters as $numberCounter)
            <div class="col-lg-3 col-6 col-md-3">
                <div class="counter-content">
                    <i class="{{ $numberCounter->icon_code ?? 'flaticon-online-course' }}"></i>
                    <h3><span class="odometer" data-count="{{ $numberCounter->total_number }}">00000</span>+</h3>
                    <p>{{ $numberCounter->label }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>


<div class="py-5 section-bg">
    <div class="container">
        <div class="row pb-4">
            <div class="col-12 mb-4">
                <div class="section-title text-center">
                    <h2 class="">আমাদের কথা</h2>
                    <hr class="w-25 mx-auto bg-danger" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card video content-shadow">

                    @php
                    if (!empty($siteSettings->our_speech_video_url))
                    {
                    $urlString = explode('https://www.youtube.com/watch?v=', $siteSettings->our_speech_video_url)[1];
                    } else {
                    $urlString = 'NAruHv8Wf3k';
                    }
                    @endphp
                    <iframe style="width: 100%!important;" height="350" id=""
                        src="https://www.youtube.com/embed/{{ $urlString }}" title="" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                </div>
                <!--    <iframe src="{{ asset('/') }}frontend/assets/video/BiddabariApps.mp4" frameborder="0"></iframe>-->
            </div>
            <div class="col-lg-6">
                <div class="card card-body rounded-0 our-speech content-shadow">

                    {!! $siteSettings->our_speech_text !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row align-items-center mb-3">
            <div class="col">
                <div class="section-title mt-rs-20">
                    <h2 class="text-center">আমাদের সেবা সমূহ</h2>
                    <hr class="w-25 mx-auto bg-danger" />
                </div>
            </div>
        </div>
        <div class="row facility">
            @foreach($ourServices as $key => $ourService)
            @if($key == 0 || $key == 2 || $key == 4 || $key == 6)
            <div class="col-12 col-m-6">
                <div class="card mb-4 border-0 content-shadow">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset($ourService->image) ?? 'frontend/assets/images/our-speak/1.png' }}"
                                class="img-fluid rounded-start h-100 py-2 ps-2" alt="..." />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body text-end">
                                <h2 class="card-title mb-2">{{ $ourService->title }}</h2>
                                <p class="card-text text-muted">
                                    {!! $ourService->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($key == 1 || $key == 3 || $key == 5 || $key == 7)
            <div class="col-12 col-m-6">
                <div class="card mb-3 border-0 content-shadow">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body text-start">
                                <h2 class="card-title mb-2">{{ $ourService->title }}</h2>
                                <p class="card-text text-muted">
                                    {!! $ourService->content !!}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <img src="{{ asset($ourService->image) ?? 'frontend/assets/images/our-speak/1.png' }}"
                                class="img-fluid rounded-start h-100 py-2 pe-2" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</div>


<div class="courses-area-two py-5">
    <div class="container">
        <div class="section-title text-center mb-3">
            <h2>শ্রদ্ধেয় শিক্ষকদের কথা</h2>
            <hr class="w-25 mx-auto bg-danger" />
        </div>
        <div class="course-slider-two owl-carousel owl-theme">
            @foreach($ourTeams as $ourTeam)
            <div class="courses-item">
                <div>
                    @php
                    if (!empty($ourTeam->video_link))
                    {
                    $urlStringx = explode('https://www.youtube.com/watch?v=', $ourTeam->video_link)[1];
                    } else {
                    $urlStringx = 'NAruHv8Wf3k';
                    }
                    @endphp
                    <iframe style="width: 100%!important;" height="240" id=""
                        src="https://www.youtube.com/embed/{{ $urlStringx }}" title="" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"></iframe>
                </div>
                <div class="content teacher-name">
                    <h3><a href="#">{{ $ourTeam->name }}</a></h3>
                    <span> {{ $ourTeam->designation }}</span>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

<div class="testimonials-area bg-light py-5">
    <div class="container">
        <div class="section-title text-center">
            <h2>শিক্ষার্থীদের মতামত</h2>
            <hr class="w-25 mx-auto bg-danger" />
            <div class="offset-md-3 col-md-6 stu-tab mt-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">সফল শিক্ষার্থীদের মতামত</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                            aria-selected="false">চলমান শিক্ষার্থীদের মতামত</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    <div class="testimonials-slider-two owl-carousel owl-theme">
                        @foreach($studentOpinions as $successStudentOpinion)
                        @if($successStudentOpinion->show_type == 'all_students')
                        <div class="testimonials-card-two">
                            {!! $successStudentOpinion->comment !!}
                            <div class="content">
                                <img src="{{ asset($successStudentOpinion->image) ?? 'frontend/assets/images/testimonials/s-1.jpg' }}"
                                    alt="testimonials" />
                                <h3>{{ $successStudentOpinion->name }}</h3>
                                <span>Student</span>
                            </div>
                            <div class="quote"> <i class="flaticon-quote"></i></div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div class="testimonials-slider-two owl-carousel owl-theme">
                        @foreach($studentOpinions as $runningStudentOpinion)
                        @if($runningStudentOpinion->show_type == 'running_student')
                        <div class="testimonials-card-two">
                            {!! $runningStudentOpinion->comment !!}
                            <div class="content">
                                <img src="{{ asset($runningStudentOpinion->image) ?? 'frontend/assets/images/testimonials/s-1.jpg' }}"
                                    alt="testimonials" />
                                <h3>{{ $runningStudentOpinion->name }}</h3>
                                <span>Student</span>
                            </div>
                            <div class="quote"> <i class="flaticon-quote"></i></div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<style>
    .hero-slider-area {
        padding: 25px 0 !important;
        /*background-color: rgba(241, 131, 69, .5)*/
        background-color: #ebe9f1
    }

    .featured-item-two a h3 {
        font-size: 23px
    }
</style>
<style>
    @media screen and (max-width: 426px) {
        .col-m-6 {
            width: 50% !important;
        }
    }
</style>
@endpush