@extends('shopify-app::layouts.default')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
@endsection

@section('content')
    <div class="container">
        <!-- Header Navbar Starts -->
        <div class="header-menu">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ URL::tokenRoute('home') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('order') ? 'active' : '' }}" href="{{ URL::tokenRoute('order') }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Send Emails</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- Header Navbar Ends -->
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @parent
    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection
