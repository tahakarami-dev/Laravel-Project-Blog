@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <div class="table overflow-auto" tabindex="8">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl">
                        </div>
                    </div>
                    @include('admin.layouts.partials.messages')
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th class="text-center align-middle text-primary">ردیف</th>
                            <th class="text-center align-middle text-primary">نام دسته بندی</th>
                            <th class="text-center align-middle text-primary">دسته پدر</th>
                            <th class="text-center align-middle text-primary">ویرایش</th>
                            <th class="text-center align-middle text-primary">حذف</th>
                            <th class="text-center align-middle text-primary">حذف ایجکسی</th>
                            <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $index => $category)
                            <tr>
                                <td class="text-center align-middle">{{$categories->firstItem() + $index}}</td>
                                <td class="text-center align-middle">{{$category->title}}</td>
                                <td class="text-center align-middle">{{$category->parentCategory->title}}</td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-info" href="{{route('categories.edit',$category->id)}}">
                                        ویرایش
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger">حذف</button>
                                    </form>
                                </td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-info" onclick="deleteCategory({{$category->id}})" href="#">
                                        حذف ایجکسی
                                    </a>
                                </td>
                                <td class="text-center align-middle">{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->format('%B %d، %Y')}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function deleteCategory($id){
                Swal.fire({
                    title: "آیا از حذف مطمئن هستید",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "بله",
                    cancelButtonText: "خیر",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'http://127.0.0.1:8000/admin/categories/' + $id,
                            type: 'DELETE',
                            dataType: 'json',
                            success: function (data) {
                                Swal.fire({
                                    title: "دسته بندی حذف شد!",
                                    text: data.success,
                                    icon: "success"
                                });
                                location.reload();
                            }
                        });

                    }
                });
            }
    </script>
@endpush
