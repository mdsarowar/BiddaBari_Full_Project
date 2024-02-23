@extends('frontend.master')

@section('body')
    <div class="courses-area-two section-bg pt-100 pb-70">
        <div class="container">
            <div class="col-md-12">
                <div class="text-center mb-5">
                    <a href="" class="btn border-main-color"><span class="fw-bolder fs-2">আমাদের কোর্সসমূহ</span></a>
                </div>
                <div>
                    <ul class="nav nav-pills all-course-page-nav-pills">
                        <li class="nav-item"><button type="button" class="nav-link active border-danger btn py-0 mx-2 text-dark" style="border: 1px solid #F18C53" data-bs-toggle="pill" data-bs-target="#allCourses" ><span class="f-s-35">All Courses</span></button></li>
                        @foreach($courseCategories as $index => $courseCategory)
                            <li class="nav-item"><button type="button" class="nav-link border-danger btn py-0 mx-2 text-dark" style="border: 1px solid #F18C53" data-bs-toggle="pill" data-bs-target="#{{ 'id'.$index }}"><span class="f-s-35">{{ $courseCategory->name }}</span></button></li>
                        @endforeach
                    </ul>
                    <div class="tab-content mt-5">
                        @foreach($courseCategories as $key => $courseCategory)
                            @if($key == 0)
                                <div class="tab-pane px-1 fade show active" id="allCourses">
                                    <div class="row">
                                        @foreach($courseCategories as $allIndex => $courseCategoryx)
                                            @foreach($courseCategoryx->courses as $course)
                                                @include('frontend.courses.include-courses-course', $course)
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <div class="tab-pane fade" id="{{ 'id'.$key }}">
                                <div class="row">
                                    @forelse($courseCategory->courses as $course)
                                        @include('frontend.courses.include-courses-course', $course)
                                    @empty
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <h2>কোনো কোর্স চালু হয়নি।  খুব দ্রুত কোর্স চালু হবে। </h2>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
