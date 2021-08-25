@extends('layouts.admin_layout')

@section('title', 'add product')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">პროდუქტის დამატება</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">დაამატეთ სალაიდი</h3>
            </div>

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        <!-- /.card-header -->
            <!-- form start -->
            <form action="{{url('admin_panel/create_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">შეიყვანეთ პროდუქტის სახელი*</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="შეიყვანეთ პროდუქტის სახელი">
                    </div>

                    <div class="form-group">
                        <label for="product_desc">პროდუქციის აღწერა*</label>
                        <textarea name="product_desc" id="product_desc" class="editor"></textarea>
                    </div>

                    <div class="form-group">
                        <label>აირჩიეთ კატეგორია*</label>
                        <select  name="cat_id" class="form-control" id="cat_id" required="">
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category['id'] }}"
                                >{{ $category['name'] }}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group">
                        <label>აირჩიეთ ქვეკატეგორია*</label>
                        <select name="subcat_id" class="form-control" id="subcat_id">
                                @foreach($subcategories as $subcategory)

                                    <option
                                      value="{{ $subcategory['id'] }}"
                                  >{{ $subcategory['name'] }}</option>

                                @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="product_img">ატვირთეთ პროდუქტის სურათი*</label>
                        <img src="" alt="" class="img-uploaded" style="display: block; max-width: 300px">
                        <input type="text" id="product_img" class="form-control" name="product_img" value="" readonly>
                        <a href="" class="popup_selector btn btn-primary mt-2" data-inputid="product_img">ატვირთვა</a>
                    </div>

                    <div class="form-group">
                        <label for="product_imgs">სურათების ატვირთვა</label>
                        <input class="form-control" type="file" id="product_imgs" name="product_imgs[]" multiple>
                    </div>


                    <div class="form-group">
                        <label for="price">პროდუქციის ფასი (ლარი)*</label>
                        <input type="number" id="price" name="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="sale" class="form-check-input" value="1" type="radio" name="sale_id" checked="">
                                <span style="color: red">SALE</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="not-sale" class="form-check-input" value="0" type="radio" name="sale_id" >
                                <span style="text-decoration: line-through;">NOT SALE</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="sale_price"></label>
                            <input type="text" id="sale_price" name="sale_price" class="form-control" style="margin-top: 10px; color: red">
                        </div>


                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">დამატება</button>
                </div>
            </form>
        </div>
    </section>



@endsection
