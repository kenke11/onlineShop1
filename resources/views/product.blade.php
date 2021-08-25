@extends('layouts.page')

@section('content')


    <div class="container">
        <div class="product-header">
            {{$subcategory->category['name']}}  /  {{$subcategory['name']}} / {{$product['name']}}
        </div>


        <div class="product_cont">
            <div class="row">
                <div class="col-4 product_img">
                    <img src="{{asset($product['product_img'])}}" alt="">
                </div>
                <div class="col-8 product_info">
                    <h3>{{$product['name']}}</h3>
                    <p>{!! $product['product_desc']!!}</p>
                    @if($product['sale_id'] == 1)
                        <span class="old-price">{{$product['price']}} ₾</span>
                        <span class="sale-price">{{$product['sale_price']}} ₾</span>
                    @else
                        <span>{{$product['price']}}₾</span>
                    @endif
                    <p>
                        <a class="btn btn-primary">დაამატე კალათაში</a>
                    </p>

                </div>
            </div>
        </div>


    </div>



@endsection
