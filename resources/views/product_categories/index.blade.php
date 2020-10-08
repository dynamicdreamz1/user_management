@extends('layouts.adminlte')

@section('page_title') {{ $pageinfo['title'] }} @endsection

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

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <a href="{{ route('product_categories.create') }}" class="btn btn-primary">add new category</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Parent</th>
                                                <th>Status</th>
                                                <th>Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1 @endphp
                                                @foreach($categorylist as $category)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        @if(isset($category->parent_category))
                                                            {{ $category->parent_category->name }}
                                                        @else
                                                            Master Category
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($category->status == 0)
                                                            <span class="badge bg-info">Inactive</span>
                                                        @elseif($category->status == 0)
                                                            <span class="badge bg-success">Active</span>
                                                        @elseif($category->status == 0)
                                                            <span class="badge bg-danger">Deactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('product_categories.destroy',$category->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('product_categories.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @php $i++ @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    <!-- ./wrapper -->
@endsection

@section('scripts')
@endsection
