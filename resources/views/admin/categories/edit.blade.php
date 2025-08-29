@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                @include('admin.layouts.partials.errors')
                <div class="container">
                    <h4 class="card-title">ویرایش دسته بندی</h4>
                    <form method="POST" action="{{route('categories.update',$category->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">نام دسته بندی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control text-left"  dir="rtl" name="title" value="{{$category->title}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">دسته بندی پدر</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control">
                                    <option value="0">دسته بندی اصلی</option>
                                    @foreach($categories as $key=>$value)
                                        @if($category->parent_id == $key)
                                            <option selected value="{{$key}}">{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ویرایش
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
