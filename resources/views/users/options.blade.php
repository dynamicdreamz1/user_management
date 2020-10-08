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

                            @if(!isset($user))
                                @section('page_title') Add Product @endsection
                                <form action="{{ route('users.store') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="fullname" class="form-control" placeholder="Enter FullName" value="">
                                            @if($errors->has('fullname'))
                                                <div class="text-danger">{{ $errors->first('fullname') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="">
                                            @if($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="add_user" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            @else
                                @section('page_title') Edit User @endsection
                                <form action="{{ route('users.update',$user->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="fullname" class="form-control" placeholder="Enter FullName" value="{{ $user->fullname }}">
                                            @if($errors->has('fullname'))
                                                <div class="text-danger">{{ $errors->first('fullname') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $user->email }}">
                                            @if($errors->has('email'))
                                                <div class="text-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="edit_user" class="btn btn-primary">Submit</button>
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
