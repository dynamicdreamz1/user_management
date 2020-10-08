@extends('layouts.adminlte')

@section('styles')
@endsection

@section('bodytag') class="hold-transition sidebar-mini" @endsection

@section('content')
<div class="wrapper">
    <!-- Navbar -->
@include('layouts.top_navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('layouts.leftmenu')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $pageinfo['title'] }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $pageinfo['title'] }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $pageinfo['title'] }}</h3>
                            </div>
                            <!-- /.card-header -->

                            @if(!isset($product))
                                @section('page_title') Add Product @endsection
                                <form action="{{ route('products.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="">
                                            @if($errors->has('product_name'))
                                                <div class="text-danger">{{ $errors->first('product_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <input type="text" name="product_description" class="form-control" placeholder="Enter Product Description" value="">
                                            @if($errors->has('product_description'))
                                                <div class="text-danger">{{ $errors->first('product_description') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Stock</label>
                                            <input type="text" name="product_stock" class="form-control" placeholder="Enter Product Stock" value="">
                                            @if($errors->has('product_stock'))
                                                <div class="text-danger">{{ $errors->first('product_stock') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="text" name="product_price" class="form-control" placeholder="Enter Product Price" value="">
                                            @if($errors->has('product_price'))
                                                <div class="text-danger">{{ $errors->first('product_price') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Weight</label>
                                            <input type="text" name="product_weight" class="form-control" placeholder="Enter Product Weight" value="">
                                            @if($errors->has('product_weight'))
                                                <div class="text-danger">{{ $errors->first('product_weight') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select name="product_category" class="form-control">
                                                <option value="0">product category</option>
                                                @foreach($categorylist as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has('product_category'))
                                                <div class="text-danger">{{ $errors->first('product_category') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="add_product" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @else
                                @section('page_title') Edit Product @endsection
                                <form action="{{ route('products.update',$product->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" value="{{ $product->name }}">
                                            @if($errors->has('product_name'))
                                                <div class="text-danger">{{ $errors->first('product_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <input type="text" name="product_description" class="form-control" placeholder="Enter Product Description" value="{{ $product->description }}">
                                            @if($errors->has('product_description'))
                                                <div class="text-danger">{{ $errors->first('product_description') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Stock</label>
                                            <input type="text" name="product_stock" class="form-control" placeholder="Enter Product Stock" value="{{ $product->stock }}">
                                            @if($errors->has('product_stock'))
                                                <div class="text-danger">{{ $errors->first('product_stock') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Price</label>
                                            <input type="text" name="product_price" class="form-control" placeholder="Enter Product Price" value="{{ $product->price }}">
                                            @if($errors->has('product_price'))
                                                <div class="text-danger">{{ $errors->first('product_price') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Weight</label>
                                            <input type="text" name="product_weight" class="form-control" placeholder="Enter Product Weight" value="{{ $product->weight }}">
                                            @if($errors->has('product_weight'))
                                                <div class="text-danger">{{ $errors->first('product_weight') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select name="product_category" class="form-control">
                                                <option value="0">product category</option>
                                                @foreach($categorylist as $c)
                                                    <option value="{{ $c->id }}" @if($product->category_id == $c->id) selected @endif>{{ $c->name }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has('product_category'))
                                                <div class="text-danger">{{ $errors->first('product_category') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="edit_product" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @endif

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@include('layouts.footer')
<!-- /.control-sidebar -->
</div>
@endsection

@section('scripts')
@endsection
