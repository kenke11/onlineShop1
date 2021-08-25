@extends('layouts.admin_layout')

@section('title', 'პროდუქცია')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ყველა პროდუქცია</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">

            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 5%">
                            ID
                        </th>
                        <th style="width: 15%">
                            პროდუქტის სახელი
                        </th>

                        <th style="width: 20%">
                            პროდუქტის კატეგორია
                        </th>

                        <th style="width: 20%">
                            პროდუქტის ქვეკატეგორია
                        </th>

                        <th style="width: 20%">
                            დამატების თარიღი
                        </th>
                        <th style="color: red; width: 10%;">
                            SALE
                        </th>
                        <th style="width: 30%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{$product['id']}}
                            </td>
                            <td>
                                {{$product['name']}}

                            </td>
                            <td>
                                {{$product->category['name']}}

                            </td>
                            <td>
                                {{$product->subcategory['name']}}

                            </td>

                            <td>
                                {{$product['created_at']}}
                            </td>

                            <td style="color: red; font-weight: bold; @if($product['sale_id'] == 0) text-decoration: line-through; color: grey @endif">
                                @if($product['sale_id'] == 1)
                                    SALE
                                @else
                                    NOT SALE
                                @endif
                            </td>

                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    ნახვა
                                </a>
                                <a class="btn btn-info btn-sm" href="{{url('admin_panel/category/edit', $product['id'])}}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    რედაქტირება
                                </a>
                                <form action="{{url('admin_panel/delete_product', $product['id'])}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="fas fa-trash">
                                        </i>
                                        წაშლა
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->

@endsection
