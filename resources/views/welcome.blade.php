@extends('layouts.page')

@section('content')


    <section id="slider-section">



        <div class="owl-carousel header_slider_carousel owl-theme">

            @foreach($sliders as $slider)
            <div
                class="my-slider item"
                style='background-image: url({{$slider['img']}});  background-size: cover;'
            >
                <div class="container">

                    <div class="slider-content" style="color: #0c84ff!important;">
                        <h3 style="color: #0c84ff!important;">{{$slider['title']}}</h3>
                        <p style="color: #0c84ff!important;"> {{$slider['text']}}</p>
                        <a href="{{$slider['link']}}" class="btn btn-primary">სრულად ნახვა</a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

    </section>

    <section id="sale_product">

        <div class="sale_product_header">
            <h3 class="text-center">ფასდაკლება</h3>
        </div>

        <div class="container">
            <div class="owl-carousel sale_product_carousel owl-theme">
                @foreach($products as $product)
                    @if($product['sale_id'] == 1)
                        <div class="item product-item">
                            <a href="">
                                <img src="{{asset($product['product_img'])}}" alt="">
                            </a>
                            <div>
                                <p class="product-name">
                                    {{$product['name']}}
                                </p>
                                <div class="text-center">

                                    <span class="old-price">
                                        {{$product['price']}} ლ
                                    </span>
                                    <p>
                                    <span class="sale-price">
                                    {{$product['sale_price']}} ლ

                                    </span>
                                    </p>
                                </div>

                                <button class="form-control btn btn-primary">
                                   კალათაში დამატება
                                </button>

                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>



@endsection


@section('script')

    <script>
        $(document).ready(function (){
            $('.sale_product_carousel').owlCarousel({
                loop:true,
                margin:25,
                nav:true,
                dots: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })

            $('.header_slider_carousel').owlCarousel({
                loop:true,
                nav:true,
                dots: true,
                autoplay:true,
                autoplayTimeout:10000,
                autoplayHoverPause:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    },
                    1000:{
                        items:1
                    }
                }
            })
        });
    </script>

@endsection
