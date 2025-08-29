@extends('frontend.layouts.master')
@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="slider-index shadow-sm">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{url('frontend/img/slider/Woo_Package_New_Bnr1.png')}} "
                                         class="d-block w-100 rounded" alt="">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{url('frontend/img/slider/Woo_Package_New_Bnr2.png')}}"
                                         class="d-block w-100 rounded" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="b-slider-btn">
                                <a href="#"
                                   class="bg-primary rounded d-block p-3 shadow-sm text-center my-1 my-md-3 text-light"><i
                                        class="bi bi-filter-left"></i> کتاب و رمان</a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="b-slider-btn">
                                <a href="#"
                                   class="bg-primary rounded d-block p-3 shadow-sm text-center my-1 my-md-3  text-light"><i
                                        class="bi bi-person"></i> پیوستن به انجمن</a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="b-slider-btn">
                                <a href="#"
                                   class="bg-warning rounded d-block p-3 shadow-sm text-center my-1 my-md-3  text-dark"><i
                                        class="bi bi-gem"></i> خرید عضویت ویژه</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="search-box">
                                <form action="" class="position-relative w-100 mb-3 mb-md-0">
                                    <input type="text" placeholder="جستجو کنید ..." class="pe-3">
                                    <button class="position-absolute bg-dark"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 top-slider">
                    <div class="slider-item bg-white rounded p-4">
                        <figure class="position-relative">
                            <img src="{{url('frontend/img/blog/youtube.jpg')}}" alt="" class="w-100 rounded">
                            <figcaption class="tp_top position-absolute p-4">
                                <span>20 مرداد</span>
                            </figcaption>
                            <figcaption class="tp_bottom position-absolute p-4">
                                <i class="bi bi-play bg-white d-inline-block text-center"></i>
                            </figcaption>
                        </figure>
                        <div class="item-cat">
                            <div class="d-flex">
                                <i class="bi bi-play-circle"></i>
                                <span class="d-block p-2 text-info">بروز شده</span>
                            </div>
                        </div>
                        <a href="#">
                            <h6 class="overflow-hidden px-2">تاثیر ویدئو در سئو</h6>
                        </a>
                        <a href="#" class="d-block bg-dark p-3 mt-3 text-center text-light rounded">مطالب ویژه اعضای
                            Vip</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  last articles   --}}
    <section class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-box mb-3">
                        <p class="m-0 p-0">جدیدترین مقالات</p>
                        <span class="d-block"><a href="#">مشاهده همه</a> <i
                                class="bi bi-arrow-left position-relative"></i></span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="top-slider owl-carousel owl-theme top-slider-wrap">
                        @foreach($last_articles as $article)
                            <div class="slider-item bg-white rounded p-4">
                                <figure class="position-relative">
                                    <img src="{{url('images/articles/'. $article->image)}}" alt="{{$article->title}}"
                                         class="w-100 rounded">
                                    <figcaption class="tp_top position-absolute p-4">
                                        <span>{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->formatJalaliDate()}}</span>
                                    </figcaption>
                                    <figcaption class="tp_bottom position-absolute p-4">
                                        <i class="bi bi-play bg-white d-inline-block text-center"></i>
                                    </figcaption>
                                </figure>
                                <a href="{{route('front.article',$article->id)}}">
                                    <h6 class="overflow-hidden px-2">{{$article->title}}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- most viewed articles   --}}
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="title-box mb-3">
                        <p class="m-0 p-0">پربازدید ترین مقالات</p>
                        <span class="d-block"><a href="#">مشاهده همه</a> <i
                                class="bi bi-arrow-left position-relative"></i></span>
                    </div>
                </div>
                @foreach($most_viewed_articles as $article)
                    <div class="col-sm-6 col-md-6 col-lg-4 my-3">
                        <div class="blg-wrap bg-white pb-3">
                            <figure class="position-relative">
                                <img src="{{url('images/articles/'. $article->image)}}" alt="" class="w-100">
                                <figcaption class="position-absolute w-100 h-100"><span
                                        class="blg-dt">{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->formatJalaliDate()}}</span>
                                </figcaption>
                            </figure>
                            <a href="{{route('front.article',$article->id)}}">
                                <h4 class="blg-title p-3 mx-5 text-dark border-bottom overflow-hidden">{{$article->title}}</h4>
                            </a>
                            <p class="p-4 overflow-hidden">زمانی که چندین سال قبل تصمیم گرفتیم تا قدم در میدان طراحی و
                                برنامه نویسی وب سایت بگذاریم هیچ مسیری برای ما واضح و روشن نبود و باید در جستجوی راه های
                                درست ، روز ها و هفته ها وقت سپری می کردیم </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="my-5 ">
        <div class="container bg-white py-3 rounded grided-box px-4 pt-4">
            <div class="row">
                <div class="col-12">
                    <div class="title-box mb-3">
                        <p class="m-0 p-0">آخرین مطالب سایت</p>
                        <span class="d-block"><a href="#">مشاهده همه</a> <i
                                class="bi bi-arrow-left position-relative"></i></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 top-slider">
                            <a href="#">
                                <div class="slider-item index-item-p">
                                    <figure class="position-relative">
                                        <img src="{{url('frontend/img/blog/CSS-Contact-Us-Form.png')}}" alt=""
                                             class="w-100">
                                        <figcaption class="tp_top position-absolute p-4">
                                            <span>20 مرداد</span>
                                        </figcaption>
                                        <figcaption class="tp_bottom w-100 position-absolute p-4">
                                            <h4 class="overflow-hidden px-2 text-light w-100 p-0 m-0">روانشناسی رنگ</h4>
                                        </figcaption>
                                    </figure>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 top-slider">
                            <a href="#">
                                <div class="slider-item index-item-p">
                                    <figure class="position-relative">
                                        <img src="{{url('frontend/img/blog/shop.jpg')}}" alt="" class="w-100">
                                        <figcaption class="tp_top position-absolute p-4">
                                            <span>20 مرداد</span>
                                        </figcaption>
                                        <figcaption class="tp_bottom w-100 position-absolute p-4">
                                            <h4 class="overflow-hidden px-2 text-light w-100 p-0 m-0">درآمد فروشگاه
                                                اینترنتی</h4>
                                        </figcaption>
                                    </figure>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 top-slider">
                            <a href="#">
                                <div class="slider-item index-item-p">
                                    <figure class="position-relative">
                                        <img src="{{url('frontend/img/blog/btstrap.jpg')}}" alt="" class="w-100">
                                        <figcaption class="tp_top position-absolute p-4">
                                            <span>20 مرداد</span>
                                        </figcaption>
                                        <figcaption class="tp_bottom w-100 position-absolute p-4">
                                            <h4 class="overflow-hidden px-2 text-light w-100 p-0 m-0">تغییرات بوت
                                                استرپ</h4>
                                        </figcaption>
                                    </figure>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 top-slider">
                            <a href="#">
                                <div class="slider-item index-item-p">
                                    <figure class="position-relative">
                                        <img src="{{url('frontend/img/blog/buisiness.jpg')}}" alt="" class="w-100">
                                        <figcaption class="tp_top position-absolute p-4">
                                            <span>20 مرداد</span>
                                        </figcaption>
                                        <figcaption class="tp_bottom w-100 position-absolute p-4">
                                            <h4 class="overflow-hidden px-2 text-light w-100 p-0 m-0">ساخت بنرهای زیبا
                                                برای پست های اینستا</h4>
                                        </figcaption>
                                    </figure>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 top-slider">
                            <a href="#">
                                <div class="slider-item index-item-p">
                                    <figure class="position-relative">
                                        <img src="{{url('frontend/img/blog/youtube.jpg')}}" alt="" class="w-100">
                                        <figcaption class="tp_top position-absolute p-4">
                                            <span>20 مرداد</span>
                                        </figcaption>
                                        <figcaption class="tp_bottom w-100 position-absolute p-4">
                                            <h4 class="overflow-hidden px-2 text-light w-100 p-0 m-0">تاثیر ویدئو در
                                                سئو</h4>
                                        </figcaption>
                                    </figure>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 top-slider">
                            <a href="#">
                                <div class="slider-item index-item-p">
                                    <figure class="position-relative">
                                        <img src="{{url('frontend/img/blog/cook.jpg')}}" alt="" class="w-100">
                                        <figcaption class="tp_top position-absolute p-4">
                                            <span>20 مرداد</span>
                                        </figcaption>
                                        <figcaption class="tp_bottom w-100 position-absolute p-4">
                                            <h4 class="overflow-hidden px-2 text-light w-100 p-0 m-0">غذاهای رژیمی
                                                خاص</h4>
                                        </figcaption>
                                    </figure>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="title-box mb-3">
                        <p class="m-0 p-0">آخرین مطالب سایت</p>
                        <span class="d-block"><a href="#">مشاهده همه</a> <i
                                class="bi bi-arrow-left position-relative"></i></span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 my-3">
                    <div class="blg-wrap bg-white pb-3">
                        <figure class="position-relative">
                            <img src="{{url('frontend/img/blog/CSS-Contact-Us-Form.png')}}" alt="" class="w-100">
                            <figcaption class="position-absolute w-100 h-100"><span class="blg-dt">4 مرداد</span>
                            </figcaption>
                        </figure>
                        <div class="px-3 py-1 text-start">
                            <span class="blg-cat-name d-inline-block bg-info py-1 px-2">مطالب روز</span>
                        </div>
                        <a href="#">
                            <h4 class="blg-title p-3 mx-5 text-dark border-bottom overflow-hidden">قالب های رایگان
                                Html</h4>
                        </a>
                        <div class="post-type d-flex p-3 pb-0">
                            <i class="bi bi-instagram d-inline-block text-info text-center"></i>
                            <span>مقاله اینستاگرام</span>
                        </div>
                        <p class="p-4 overflow-hidden">زمانی که چندین سال قبل تصمیم گرفتیم تا قدم در میدان طراحی و
                            برنامه نویسی وب سایت بگذاریم هیچ مسیری برای ما واضح و روشن نبود و باید در جستجوی راه های
                            درست ، روز ها و هفته ها وقت سپری می کردیم </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 my-3">
                    <div class="blg-wrap bg-white pb-3">
                        <figure class="position-relative">
                            <img src="{{url('frontend/img/blog/buisiness.jpg')}}" alt="" class="w-100">
                            <figcaption class="position-absolute w-100 h-100"><span class="blg-dt">4 مرداد</span>
                            </figcaption>
                        </figure>
                        <div class="px-3 py-1 text-start">
                            <span class="blg-cat-name d-inline-block bg-dark py-1 px-2">پرسش و پاسخ</span>
                        </div>
                        <a href="#">
                            <h4 class="blg-title p-3 mx-5 text-dark border-bottom overflow-hidden">بازاریابی محتوا و
                                هدف</h4>
                        </a>
                        <div class="post-type d-flex p-3 pb-0">
                            <i class="bi bi-card-text d-inline-block text-info text-center"></i>
                            <span>پیشنهادی</span>
                        </div>
                        <p class="p-4 overflow-hidden">زمانی که چندین سال قبل تصمیم گرفتیم تا قدم در میدان طراحی و
                            برنامه نویسی وب سایت بگذاریم هیچ مسیری برای ما واضح و روشن نبود و باید در جستجوی راه های
                            درست ، روز ها و هفته ها وقت سپری می کردیم </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 my-3">
                    <div class="blg-wrap bg-white pb-3">
                        <figure class="position-relative">
                            <img src="{{url('frontend/img/blog/Piks.jpg')}}" alt="" class="w-100">
                            <figcaption class="position-absolute w-100 h-100"><span class="blg-dt">4 مرداد</span>
                            </figcaption>
                        </figure>
                        <div class="px-3 py-1 text-start">
                            <span class="blg-cat-name d-inline-block bg-primary py-1 px-2">هنر</span>
                        </div>
                        <a href="#">
                            <h4 class="blg-title p-3 mx-5 text-dark border-bottom overflow-hidden">عجیب ترین تابلو
                                ها</h4>
                        </a>
                        <div class="post-type d-flex p-3 pb-0">
                            <i class="bi bi-columns-gap d-inline-block text-info text-center"></i>
                            <span>مقاله تصویری</span>
                        </div>
                        <p class="p-4 overflow-hidden">زمانی که چندین سال قبل تصمیم گرفتیم تا قدم در میدان طراحی و
                            برنامه نویسی وب سایت بگذاریم هیچ مسیری برای ما واضح و روشن نبود و باید در جستجوی راه های
                            درست ، روز ها و هفته ها وقت سپری می کردیم </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
