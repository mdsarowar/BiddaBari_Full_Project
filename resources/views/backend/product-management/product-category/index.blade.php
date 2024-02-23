@extends('backend.master')

@section('title', 'Product Categories')

@section('body')
    <div class="row py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="float-start text-white">Product Categories</h4>
                    @can('create-product-category')
                        <button type="button" class="rounded-circle text-white border-5 text-light f-s-22 btn position-absolute end-0 me-4 product-category-modal-btn"><i class="fa-solid fa-circle-plus"></i></button>
                    @endcan
                </div>
                <div class="card-body">


                    <table class="table" id="file-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($productCategories))
                            @foreach($productCategories as $productCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $productCategory->name }}</td>
                                    <td>
                                        <img src="{{ asset($productCategory->image) }}" alt="" style="height: 70px" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="badge bg-primary">{{ $productCategory->status == 1 ? 'Published' : 'Unpublished' }}</a>
                                    </td>
                                    <td>
                                        @can('edit-product-category')
                                            <a href="" data-product-category-id="{{ $productCategory->id }}" class="btn btn-sm btn-warning product-category-edit-btn" title="Edit Blog Category">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete-product-category')
                                            <form class="d-inline" action="{{ route('product-categories.destroy', $productCategory->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger data-delete-form" title="Delete Category">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-div" id="blogCategoryModal" data-modal-parent="blogCategoryModal" data-bs-backdrop="static" >
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" id="">
                <form id="courseSectionForm" action="{{ route('product-categories.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Create Product Categories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="card card-body">
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    @csrf
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" required name="name" placeholder="Name" title="Name" />
                                    <span class="text-danger" id="name">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <label for="">Icon Code</label>
                                    <input type="text" class="form-control" name="icon_code" placeholder="Icon Code" title="Icon Code" />
                                </div>
                                <div class="col-sm-6 mt-3">
                                    @csrf
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" id="imagex" accept="image/*" name="image" placeholder="Image" title="Image" />
                                    <span class="text-danger" id="image">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <div>
                                        <img src="" id="imagePreview" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 mt-3">
                                    <label for="">Is Featured</label> <br>
                                    <div class="material-switch">
                                        <input id="featuredSwitchOptionInfo" name="is_featured" type="checkbox" checked="">
                                        <label for="featuredSwitchOptionInfo" class="label-info"></label>
                                    </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                    <label for="">Status</label> <br>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionInfo" name="status" type="checkbox" checked="">
                                        <label for="someSwitchOptionInfo" class="label-info"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary " value="save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <!-- DragNDrop Css -->
    {{--    <link href="{{ asset('/') }}backend/assets/css/dragNdrop.css" rel="stylesheet" type="text/css" />--}}
    <style>
        input[switch]+label {
            margin-bottom: 0px;
        }

    </style>
@endpush

@push('script')

    @include('backend.includes.assets.plugin-files.datatable')
    {{--    @include('backend.includes.assets.plugin-files.date-time-picker')--}}
    {{--    @include('backend.includes.assets.plugin-files.editor')--}}
    @if($errors->any())
        <script>
            $(function () {
                $('#blogCategoryModal').modal('show');
            })
        </script>
    @endif
    {{--    store course--}}
    <script>
        $(document).on('click', '.product-category-modal-btn', function () {
            event.preventDefault();
            // resetInputFields();
            if ($('input[name="_method"]').length)
            {
                $('input[name="_method"]').remove();
            }
            $('#courseSectionForm').attr('action', "{{ route('product-categories.store') }}");
            $('#blogCategoryModal').modal('show');
        })
    </script>
    <script>
        {{--$(document).on('click', '.submit-btn', function () {--}}
        {{--    event.preventDefault();--}}
        {{--    var form = $('#coursesForm')[0];--}}
        {{--    var formData = new FormData(form);--}}
        {{--    $.ajax({--}}
        {{--        url: "{{ route('course-routines.store') }}",--}}
        {{--        method: "POST",--}}
        {{--        data: formData,--}}
        {{--        dataType: "JSON",--}}
        {{--        contentType: false,--}}
        {{--        processData: false,--}}
        {{--        success: function (message) {--}}
        {{--            // console.log(message);--}}
        {{--            toastr.success(message);--}}
        {{--            $('#coursesModal').modal('hide');--}}
        {{--            resetInputFields();--}}
        {{--            window.location.reload();--}}
        {{--        }--}}
        {{--    })--}}
        {{--})--}}
    </script>

    {{--    edit course category--}}
    <script>
        $(document).on('click', '.product-category-edit-btn', function () {
            event.preventDefault();
            var productCategoryId = $(this).attr('data-product-category-id'); //change value
            $.ajax({
                url: base_url+"product-categories/"+productCategoryId+"/edit",
                method: "GET",
                // dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    $('input[name="name"]').val(data.name);
                    $('#imagePreview').attr('src', data.image).css({height: '150px'});
                    if (data.status == 1)
                    {
                        $('input[name="status"]').attr('checked', true);
                    } else {
                        $('input[name="status"]').attr('checked', false);
                    }
                    $('#courseSectionForm').attr('action', base_url+"product-categories/"+data.id).append('<input type="hidden" name="_method" value="put">');
                    $('#blogCategoryModal').modal('show');
                }
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#imagex').change(function() {
                var imgURL = URL.createObjectURL(event.target.files[0]);
                $('#imagePreview').attr('src', imgURL).css({
                    height: 150+'px',
                    width: 150+'px',
                    marginTop: '5px'
                });
            });
        });
    </script>


@endpush
