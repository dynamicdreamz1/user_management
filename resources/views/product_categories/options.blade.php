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

                            @if(!isset($category))
                                @section('page_title') Add Product @endsection
                                <form action="{{ route('product_categories.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" name="category_name" class="form-control" placeholder="Enter Product Name" value="">
                                            @if($errors->has('category_name'))
                                                <div class="text-danger">{{ $errors->first('category_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_category" class="form-control">
                                                <option value="0">parent category</option>
                                                @foreach($categorylist as $c)
                                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has('parent_category'))
                                                <div class="text-danger">{{ $errors->first('parent_category') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="add_product_category" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @else
                                @section('page_title') Edit Category @endsection
                                <form action="{{ route('product_categories.update',$category->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" name="category_name" class="form-control" placeholder="Enter Product Name" value="{{ $category->name }}">
                                            @if($errors->has('category_name'))
                                                <div class="text-danger">{{ $errors->first('category_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Parent Category</label>
                                            <select name="parent_category" class="form-control">
                                                <option value="0">parent category</option>
                                                @foreach($categorylist as $c)
                                                    @if($c->id != $category->id)
                                                    <option value="{{ $c->id }}" @if($category->parent == $c->id) selected @endif>{{ $c->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            @if($errors->has('parent_category'))
                                                <div class="text-danger">{{ $errors->first('parent_category') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="edit_product_category" class="btn btn-primary">Submit</button>
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
