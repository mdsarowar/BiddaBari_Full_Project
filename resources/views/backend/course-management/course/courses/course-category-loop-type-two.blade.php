@foreach($courseCategory->courseCategories as $index => $subCategory)

    <option value="{{ $subCategory->id }}" {{ isset($_GET['category_id']) && $_GET['category_id'] == $subCategory->id ? 'selected' : '' }} >
        @for($i = 0; $i <= $child; $i++)
            {{ '>' }}
        @endfor
        {{ $subCategory->name }}
    </option>
    @if(!empty($courseCategory))
        @if(count($courseCategory->courseCategories) > 0)
            @include('backend.course-management.course.courses.course-category-loop', ['courseCategory' => $subCategory, 'child' => $child + $child, 'course' => $course ?? ''])
        @endif
    @endif
@endforeach






{{--@foreach($courseCategory->courseCategories as $index => $subCategory)--}}
{{--    <div class="card card-body m-l-{{ $child }} bg-transparent shadow-0 d-none childDiv{{ $courseCategory->id }} mb-2 p-1" id="childDiv">--}}
{{--        <ul class="nav">--}}
{{--            @if(count($subCategory->courseCategories) > 0)--}}
{{--                <li data-id="{{ $subCategory->id }}" style="cursor: pointer" class="drop-icon f-s-15"><i class="fa-solid fa-circle-arrow-down"></i></li>--}}
{{--            @else--}}
{{--                <li class="ms-3"></li>--}}
{{--            @endif--}}
{{--            <li><label class="ms-2 mb-0 f-s-15"><input type="checkbox" class="check" @if(isset($course) && count($course->courseCategories) > 0)  @foreach($course->courseCategories as $courseSelectedCategory) {{ $courseCategory->id == $courseSelectedCategory->id ? 'checked' : '' }} @endforeach @endif value="{{ $subCategory->id }}">{{ $subCategory->name }}</label></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    @if(!empty($subCategory))--}}
{{--        @if(count($subCategory->courseCategories) > 0)--}}
{{--            @include('backend.course-management.course.courses.course-category-loop', ['courseCategory' => $subCategory, 'child' => $child + $child ?? ''])--}}
{{--        @endif--}}
{{--    @endif--}}
{{--@endforeach--}}
