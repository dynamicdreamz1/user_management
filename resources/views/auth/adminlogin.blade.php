@extends('layouts.adminlte')

@section('page_title') admin login @endsection

@section('styles')
@endsection

@section('bodytag') class="login-page" @endsection

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href=""><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                @if(Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif

                <form action="{{ route('admin.login.process') }}" method="post">
                    @csrf
                    @if($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="admin@gmail.com">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" value="admin@123">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button name="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{--<p class="mb-1">
                    <a href="{{ route('forgot_password') }}">I forgot my password</a>
                </p>--}}
                {{--<p class="mb-0">
                    <a href="" class="text-center">Register a new membership</a>
                </p>--}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection


@section('scripts')
@endsection
