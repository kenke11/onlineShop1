@extends('layouts.admin_layout')

@section('title', 'კატეგორიის რედაქტირება')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$subcategory['name']}}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <!-- Main row -->
            <div class="row">
                <div class="col-lg-12">


                    <div class="card card-primary">



                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{url('admin_panel/subcategory_update', $subcategory['id'])}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">შეიყვანეთ ქვეკატეგორიის სახელი*</label>
                                    <input type="text" value="{{$subcategory['name']}}" name="name" class="form-control" id="name" placeholder="შეიყვანეთ ქვეკატეგორიის სახელი">
                                </div>

                                <div class="form-group">
                                    <label>აირჩიეთ კატეგორია</label>
                                    <select name="cat_id"  class="form-control" required="">
                                        @foreach($categories as $category)
                                            <option value="{{ $category['id'] }}" @if($subcategory['cat_id'] == $category['id']) selected @endif>{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">რედაქტირება</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
