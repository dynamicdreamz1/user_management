@extends('layouts.adminlte')

@section('page_title') Forgot Password @endsection

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
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                @if(Session::has('message'))
                    <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif

                <form action="{{ route('forgot_password.process') }}" method="post">
                    @csrf
                    @if($errors->has('email'))
                        <div class="text-danger" >{{ $errors->first('email') }}</div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="forgot_password" class="btn btn-primary btn-block">Request new password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mt-3 mb-1">
                    <a href="{{ route('login') }}">Login</a>
                </p>
                {{--<p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>--}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection


@section('scripts')
@endsection
