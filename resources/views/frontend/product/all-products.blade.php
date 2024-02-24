@extends('frontend.master')

@section('body')
    <div class="courses-area-two section-bg ">
        <div class="container bg-white  pb-70 ps-3">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="text-center mb-5">
                        <a href="javascript:void(0)" class="btn border-main-color"><span class="fw-bolder fs-2">আমাদের বই সমূহ</span></a>
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-6">
                                <div class="blog-card">
                                    <div class="book-btn-sec">
                                        <a href="{{ route('front.product-details',['id'=>$product->id, 'slug'=>$product->slug]) }}" class="read-btn btn btn-warning">Read More</a>
                                        @php
                                            $stockStatus = false;
                                                if ($product->stock_amount > 0)
                                                {
                                                    $stockStatus = true;
                                                }
                                        @endphp
                                        <p></p>
                                        {{--                                    @if($stockStatus == true)--}}
                                        {{--                                        <p class="text-success f-s-19">In Stock</p>--}}
                                        {{--                                    @else--}}
                                        {{--                                        <p class="text-danger f-s-19">Out Of Stock</p>--}}
                                        {{--                                    @endif--}}
                                        @if(!empty(\Cart::get($product->id)))
                                            <a href="{{ route('front.view-cart') }}" class="default-btn ">এখনই কিনুন</a>
                                        @else
                                            @if($stockStatus == true)
                                                <form action="{{ route('front.add-to-cart') }}" method="post"  class="addSimpleCardFrom{{$product->id}}">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                                    <input type="hidden" name="price" value="{{ $product->has_discount_validity == 'true' ? $grandPrice : $product->price }}" />
                                                    {{--                                <button type="submit" class="default-btn">Add to cart</button>--}}
                                                    <a href="javascript:void(0)"  onclick="addSimpleProCard({{$product->id}})" class="read-btn btn btn-warning mt-1"> Add To Cart </a>
                                                </form>
                                            @endif
                                        @endif
                                        {{--                                    <a href="javascript:void(0)"  onclick="addSimpleProCard({{$product->id}})" class="read-btn btn btn-warning mt-1"> Add To Cart </a>--}}
                                    </div>
                                    <a href="{{ route('front.product-details',['id'=>$product->id, 'slug'=>$product->slug]) }}">
                                        <img src="{{ asset($product->image ?? 'frontend/logo/biddabari-card-logo.jpg') }}" alt="{{ $product->title }}">
                                    </a>
                                    <div class="content">
                                        <h3><a href="{{ route('front.product-details', ['id' => $product->id, 'slug' => $product->slug]) }}">{{ $product->title }}</a></h3>
                                        @if($stockStatus == true)
                                            <p class="text-success f-s-19">In Stock</p>
                                        @else
                                            <p class="text-danger f-s-19">Out Of Stock</p>
                                        @endif
                                        <h5>TK {{$product->price}} </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                        @forelse($products as $product)--}}
{{--                            <div class="col-md-3 col-sm-6 px-3 mt-3">--}}
{{--                                <a href="{{ route('front.product-details', ['id' => $product->id, 'slug' => $product->slug]) }}" class="w-100">--}}
{{--                                    <div class="courses-item pb-0">--}}
{{--                                        <img src="{{ !empty($product->image) ? asset($product->image) : asset('/frontend/logo/biddabari-card-logo.jpg') }}" alt="Batch Exams" class="w-100" style="height: 230px"/>--}}
{{--                                        <div class="px-3 pt-3">--}}
{{--                                            <h3 class="f-s-26">{{ $product->title }}</h3>--}}
{{--                                            <p class="f-s-20">Author: {{ $product->productAuthor->name }}</p>--}}
{{--                                        </div>--}}
{{--                                        <div class="px-3 pb-3">--}}
{{--                                            <p class="mb-0 text-center f-s-20">--}}
{{--                                                @if($product->has_discount_validity == 'true')--}}
{{--                                                    <span class="text-danger">৳ <del>{{ round($product->price) }}</del></span>--}}
{{--                                                @endif--}}
{{--                                                <span>৳ {{ $product->price - $product->discount_amount }}</span>--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        @empty--}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="text-center">--}}
{{--                                    <h2>কোনো বই চালু হয়নি।  খুব দ্রুত এক্সাম চালু হবে। </h2>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforelse--}}
                        @if(count($products) > 0)
                            <div class="col-md-12 mt-5">
                                <div class="text-center">
{{--                                    {{ $products->links() }}--}}
                                </div>
                            </div>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
@endpush

@section('js')
@endsection
