@extends('admin.layouts.master')
@section('content')
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                @include('admin.layouts.partials.messages')
                <div class="container">
                    <h4 class="card-title"> نقش های  {{$user->name}}</h4>
                    <form method="POST" action="{{route('store.user.roles',$user->id)}}">
                        @csrf
                        @foreach($roles as $role)
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">{{$role->name}}</label>
                                <div class="col-sm-10">
                                    <input type="checkbox" @if($user->roles()->where('role_id',$role->id)->first()) checked  @endif class="form-check text-left" value="{{$role->id}}"  dir="rtl" name="roles[]">
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group row">
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="ti-check-box m-r-5"></i> ذخیره
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
