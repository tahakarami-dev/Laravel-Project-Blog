<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            @if(auth()->user()->hasRole('مدیر کل'))
                <li data-toggle="tooltip" title="کاربران">
                    <a href="#users" title=" کاربران">
                        <i class="icon ti-user"></i>
                    </a>
                </li>
            @endif

            @if(auth()->user()->hasRole('مدیر کل') || auth()->user()->hasRole('مدیر مقالات'))
                <li data-toggle="tooltip" title="وبلاگ">
                    <a href="#blog" title=" وبلاگ">
                        <i class="icon ti-book"></i>
                    </a>
                </li>
            @endif
        </ul>
        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-md text-white text-center w-100">
                        <i class="icon ti-power-off w-100"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{route('users.create')}}">ایجاد کاربر</a></li>
                    <li><a href="{{route('users.index')}}">لیست کاربران</a></li>
                </ul>
            </li>
            <li>
                <a href="#">نقش ها</a>
                <ul>
                    <li><a href="{{route('roles.create')}}">ایجاد نقش</a></li>
                    <li><a href="{{route('roles.index')}}">لیست نقش ها</a></li>
                </ul>
            </li>
        </ul>
        <ul id="blog">
            <li>
                <a href="#">دسته بندی ها</a>
                <ul>
                    <li><a href="{{route('categories.create')}}">ایجاد دسته بندی</a></li>
                    <li><a href="{{route('categories.index')}}">لیست دسته بندی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">مقاله ها</a>
                <ul>
                    @if(auth()->user()->hasRole('مدیر کل') || auth()->user()->hasRole('نویسنده'))
                        <li><a href="{{route('articles.create')}}">ایجاد مقاله</a></li>
                    @endif
                        <li><a href="{{route('articles.index')}}">لیست مقاله ها</a></li>
                        <li><a href="{{route('users.comments')}}">نظرات</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
