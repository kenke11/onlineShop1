@extends('layouts.admin_layout')

@section('title', 'სლაიდის დამატება')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">სლაიდის დამატება</h1>
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
            <form action="{{ url('admin_panel/create_slider')  }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">შეიყვანეთ სლაიდერის სათაური*</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="შეიყვანეთ სლაიდერის სათაური">
                    </div>
                    <div class="form-group">
                        <label for="text">შეიყვანეთ სლაიდერის ტექსტი*</label>
                        <textarea type="text" name="text" class="form-control" id="text" placeholder="შეიყვანეთ სლაიდერის ტექსტი"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="link">შეიყვანეთ სლაიდერის ლინკი*</label>
                        <input type="text" name="link" class="form-control" id="link" placeholder="შეიყვანეთ სლაიდერის ლინკი">
                    </div>


                    <div class="form-group">
                        <label for="img">სლაიდის უკანა ფონის სურათი*</label>
                        <img src="" alt="" class="img-uploaded" style="display: block; max-width: 300px">
                        <input type="text" id="img" class="form-control" name="img" value="" readonly>
                        <a href="" class="popup_selector btn btn-primary mt-2" data-inputid="img">აირჩიეთ სურათი</a>
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
