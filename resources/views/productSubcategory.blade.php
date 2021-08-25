@extends('layouts.page')

@section('title', 'satauri')

@section('content')



    <div class="container">


        <div class="product-header">
            {{$subcategory->category['name']}}  /  {{$subcategory['name']}}
        </div>


        <div class="row">
            <div class="col-4 product-filter">
                <div class="price_filter">
                    <form action="">

                        <div>
                            <form action="{{route('productSubcategory')}}" method="get">
                                <h4>ფასის შუალედი</h4>
                                <div class="row inp-price-container">
                                    <div class="price_input ">
                                        <input type="number" name="min_price" class="price_input1" value="0"> ლ
                                    </div>
                                    <div class="price-inp-center">
                                        <span>დან</span>
                                    </div>
                                    <div class="price_input ">
                                        <input type="number" name="max_price" class="price_input2" value="0"> ლ
                                    </div>
                                </div>

                                <div class="radio-price-container">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio_price_250" type="radio" name="radio_price">
                                            <label class="form-check-label" for="radio_price_250">250ლ - მდე</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio_price_250-500" type="radio" name="radio_price" >
                                            <label class="form-check-label" for="radio_price_250-500">250ლ - 500ლ</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio_price_500-750" type="radio" name="radio_price">
                                            <label class="form-check-label" for="radio_price_500-750">500ლ - 750ლ</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio_price_750-1000" type="radio" name="radio_price">
                                            <label class="form-check-label" for="radio_price_750-1000">750ლ - 1000ლ</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio_price_1000" type="radio" name="radio_price">
                                            <label class="form-check-label" for="radio_price_1000">1000ლ +</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit"  class="btn btn-primary">გაფილტვრა</button>
                                </div>

                            </form>
                        </div>

                    </form>
                </div>

                <div class="brand_filter">

                </div>
            </div>
            <div class="col-8 product_container">
                @foreach($products as $product)

                    @if($product['subcat_id'] == $subcategory['id'])
                        <div class="product_item ">
                            <div class="row">
                                <div class="product_item_img">
                                    <a href="{{url('productions/' . $subcategory['id'] . '/product', $product['id'])}}">
                                        <img src="{{asset($product['product_img'])}}" alt="">
                                    </a>

                                </div>
                                <div class="product_title_price">
                                    <div>
                                        <h3 class="">{{$product['name']}}</h3>
                                        @if($product['sale_id'] == 1)
                                            <span class="old_price">
                                                {{$product['price']}}ლ
                                            </span>
                                            <span class="sale_price">
                                                {{$product['sale_price']}}ლ
                                            </span>
                                        @else
                                            <span>
                                                {{$product['price']}}ლ
                                            </span>
                                        @endif
                                        <p class="text-right">
                                            <a class="btn btn-primary">დაამატე კალათაში</a>
                                            <a href="{{url('productions/' . $subcategory['id'] . '/product', $product['id'])}}" class="btn btn-primary">დეტალურად ნახვა</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="text-center" style="width: 100%;">
                {{$products->links()}}
            </div>



        </div>
    </div>

@endsection

@section('script')

    <script></script>

    <script src="{{asset('js/searchProduct.js')}}"></script>


@endsection
