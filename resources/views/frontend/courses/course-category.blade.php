@extends('frontend.master')

@section('body')
    @if(!$courseCategory->courseCategories->isEmpty())
        <div class="categories-area pb-70">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <!--   <h2>কোর্স  <b>ক্যাটাগরি</b></h2>-->
                    <h2>কোর্স  <b>সমূহ</b></h2>
                    <hr class="w-25 mx-auto bg-danger"/>
                </div>
                <div class="row">
                    @foreach($courseCategory->courseCategories as $courseCategoryx)
                        <div class="col-md-3">
                            <div class="categories-item rounded-0" >
                                <a href="{{ route('front.category-courses', ['id' => $courseCategoryx->id, 'slug' => $courseCategoryx->slug]) }}">
                                    <img src="{{ asset(isset($courseCategoryx->image) ? $courseCategoryx->image : 'frontend/logo/biddabari-card-logo.jpg') }}" alt="Categories" class="w-100 border-0" style="height: 200px">
                                </a>
                                <div class="content">
                                    <a href="{{ route('front.category-courses', ['id' => $courseCategoryx->id, 'slug' => $courseCategoryx->slug]) }}">
                                        <i class="{{ $courseCategoryx->icon ?? 'flaticon-web-development' }}"></i>
                                        <h3>{{ $courseCategoryx->name ?? 'No Title' }}</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if(count($courseCategory->courses)>0)
        <div class="courses-area-two section-bg pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center mb-45">
                    <!--   <span>কোর্স সমূহ</span>-->
                    <h2>{{ $courseCategory->name }} কোর্স সমূহ</h2>
                    <hr class="w-25 mx-auto bg-danger">
                </div>
                <div class="row">
                    @foreach($courseCategory->courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div class="courses-item">
                                <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">
                                    <img src="{{ asset(isset($course->banner) ? $course->banner : 'frontend/logo/biddabari-card-logo.jpg') }}" alt="Courses" class="w-100" style="height: 230px"/>
                                </a>
                                <div class="content">
                                    <h3><a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}">{{ $course->title }}</a></h3>
                                    <ul class="course-list">
                                        {{--                                        <li><i class="ri-time-fill"></i> 06 hr</li>--}}
                                        <li><i class="ri-vidicon-fill"></i> {{ $course->total_note ?? 0 }} lectures</li>
                                        <li><i class="ri-file-pdf-line"></i> {{ $course->total_pdf ?? 0 }} PDF</li>
                                        <li><i class="ri-a-b"></i> {{ $course->total_exam ?? 0 }} Exam</li>
                                        <li><i class="ri-store-3-line"></i>{{ $course->total_live ?? 0 }} live class</li>
                                    </ul>
                                    <div class="bottom-content">
                                        <a href="{{ route('front.course-details', ['id' => $course->id, 'slug' => $course->slug]) }}" class="btn btn-warning">বিস্তারিত দেখুন</a>
                                        <div class="rating ">
                                            @if($course->order_status == 'false')
                                                <a href="{{ route('front.checkout', ['id' => $course->id, 'slug' => $course->slug]) }}" class="btn btn-warning">কোর্সটি কিনুন</a>
                                            @elseif($course->order_status == 'pending')
                                                <a href="javascript:void(0)" class="text-warning">Pending</a>
                                            @elseif($course->order_status == 'true')
                                                <a href="javascript:void(0)" class="">Active</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="courses-area-two section-bg pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <h2>কোনো কোর্স চালু হয়নি।  খুব দ্রুত কোর্স চালু হবে। </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
