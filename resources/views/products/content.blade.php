@extends('main')
@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
               class="stext-109 cl8 hov-cl1 trans-04">
                {{ $product->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                {{ $title }}
            </span>
        </div>
    </div>

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" role="tablist">
                                    @foreach($product->images as $image)
                                        <li role="presentation">
                                            <img src="{{ $image }}">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                <button class="arrow-slick3 prev-slick3 slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                                <button class="arrow-slick3 next-slick3 slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </div>

                            <div class="slick3 gallery-lb">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        @foreach($product->images as $image)
                                            <div class="item-slick3 slick-slide" style="width: 513px;">
                                                <div class="wrap-pic-w pos-relative">
                                                    <img src="{{ $image }}" alt="{{ $title }}">
                                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ $image }}">
                                                        <i class="fa fa-expand"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        @include('admin.alert')

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $title }}
                        </h4>

                        <span class="mtext-106 cl2">
                            {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p>

                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <form action="/add-cart" method="post">
                                        @if ($product->price !== NULL)
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                       name="num_product" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>

                                            <button type="submit"
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                                Add to cart
                                            </button>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @endif
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#"
                                   class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
                                   data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 social-icon" data-image="/storage/uploads/nnghia.jpg">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 social-icon" data-image="/storage/uploads/hieu2.jpg">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 social-icon" data-image="/storage/uploads/viet.jpg">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 social-icon" data-image="/storage/uploads/duyk.png">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                            <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16 social-icon" data-image="/storage/uploads/khanh.jpg">
                                <i class="fa fa-telegram"></i>
                            </a>
                        </div>

                        <div id="image-popup" class="image-popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; background: rgba(0, 0, 0, 0.8); padding: 20px; text-align: center;">
                            <span id="close-popup" style="color: red; font-size: 30px; position: absolute; top: 10px; right: 20px; cursor: pointer;">&times;</span>
                            <img id="popup-image" src="" alt="Social Image" style="max-width: 90%; max-height: 90%;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <div class="tab01">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                    </ul>

                    <div class="tab-content p-t-43">
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {!! $product->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
            <span class="stext-107 cl6 p-lr-25">
                Categories: {{ $product->menu->name }}
            </span>
        </div>
    </section>

    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Products
                </h3>
            </div>

            @include('products.list')
        </div>
    </section>
@endsection
@section('scripts')
<script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function () {
    // Ẩn slick3-dots và slick3-dots-overlay
    const dots = document.querySelector('.slick3-dots');
    const overlay = document.querySelector('.slick3-dots-overlay');
    const activeDot = document.querySelector('.slick-active');

    if (dots) {
        dots.style.display = 'none';
    }
    if (overlay) {
        overlay.style.display = 'none';
    }
    if (activeDot) {
        activeDot.style.display = 'none';
    }

    // Tiếp tục phần code liên quan đến Slick nếu cần
    const images = @json($product->images);
    let currentIndex = 0;

    const mainImageContainer = document.querySelector('.item-slick3 img');
    const prevButton = document.querySelector('.prev-slick3');
    const nextButton = document.querySelector('.next-slick3');

    function updateImage() {
        if (mainImageContainer) {
            mainImageContainer.src = images[currentIndex];
        }
    }

    prevButton.addEventListener('click', function () {
        currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
        updateImage();
    });

    nextButton.addEventListener('click', function () {
        currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
        updateImage();
    });

    updateImage();
});

    </script>
@endsection