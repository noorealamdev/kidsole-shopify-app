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

        <div class="card">
            <div class="card-header">
                <h4>All customers from province based on order shipping province name (last update 30 Oct 2024)</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped bordered-table mb-0">
                    <thead>
                    <tr>
                        <th>Province name</th>
                        <th>Total customers</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer_province as $customer)
                        <tr>
                            <td>{{ $customer->province_name }}</td>
                            <td>{{ $customer->customer_count }}</td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @parent
    <script>
        actions.TitleBar.create(app, { title: 'Welcome' });
    </script>
@endsection
