@extends('layouts.admin_layout')

@section('title', 'add subcategory')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ქვეკატეგორიის დამატება</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">დაამატეთ ქვეკატეგორია</h3>
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
            <form action="{{ url('admin_panel/create_subcategory') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">შეიყვანეთ ქვეკატეგორიის სახელი*</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="შეიყვანეთ ქვეკატეგორიის სახელი">
                    </div>

                    <div class="form-group">
                        <label for="name_en">შეიყვანეთ ქვეკატეგორიის სახელი ინგლისურად*</label>
                        <input type="text" name="name_en" class="form-control" id="name_en" placeholder="შეიყვანეთ ქვეკატეგორიის სახელი">
                    </div>

                    <div class="form-group">
                        <label>აირჩიეთ კატეგორია</label>
                        <select name="cat_id" class="form-control" required="">
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
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
