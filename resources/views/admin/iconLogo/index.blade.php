@extends('layouts.admin_layout')

@section('title', 'LogoIcon')

@section('content')



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>საიტის პარამეტრები</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">საიტის სათაური</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="siteTitle">შეიყვანეთ საიტის სათაური</label>
                        <input type="text" class="form-control" id="siteTitle" placeholder="საიტის სათაური">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">დადასტურება</button>
                </div>
            </form>

        </div>

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">საიტის იკონკა</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFile">ატვირთეთ საიტის იკონკა</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="siteIcon">
                                <label class="custom-file-label" for="siteIcon">ატვირთეთ საიტის იკონკა</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-info">დადასტურება</button>
                </div>
            </form>
        </div>

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">საიტის იკონკა</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFile">ატვირთეთ საიტის ლოგო</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="siteLogo">
                                <label class="custom-file-label" for="siteLogo">ატვირთეთ საიტის ლოგო</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">დადასტურება</button>
                </div>
            </form>
        </div>

    </div>
@endsection
