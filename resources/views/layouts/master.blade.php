<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | @yield('page_title')</title>
    @yield('styles')
</head>

<body>
<div>
    @if(Auth::guard('user')->check() && Auth::user()->role==2)
    <div><a href="{{ route('products.index') }}">Product Management</a></div>
    <div><a href="{{ route('product_categories.index') }}">Product Category Management</a></div>
    @endif

    @if(Auth::guard('admin')->check() && Auth::user()->role==1)
    <div><a href="{{ route('users.index') }}">User Management</a></div>
    @endif

    <div><a href="{{ route('logout') }}">Logout</a></div>
</div>
@yield('content')

@yield('scripts-js')
</body>
</html>
