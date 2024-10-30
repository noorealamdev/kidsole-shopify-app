@extends('shopify-app::layouts.default')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
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
            <div class="card-body">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length='20'>
                    <thead>
                    <tr>
                        <th>Order</th>
                        <th>Date</th>
                        <th>Customer email</th>
                        <th>Customer location</th>
                        <th>Fulfillment status</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ date("d-m-Y", strtotime($order->updated_at)) }}</td>
                            <td>{{ $order->contact_email }}</td>
                            <td>{{ $order->shipping_address?->city }}, {{ $order->shipping_address?->country }}</td>
                            <td>{{ $order->fulfillment_status }}</td>
                            <td>{{ $order->total_price }}</td>
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
    <!-- Data Table js -->
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    @parent
    <script>
        $(document).ready(function () {
            // $('#example').DataTable();
            $("#dataTable").DataTable({
                layout: {topStart: {pageLength: {menu: [5, 10, 15, 20]}}},
                pageLength: 50,
                autoWidth: !1,
                ordering: false, //disable ordering datatable
            })
        })
        actions.TitleBar.create(app, { title: 'Orders' });
    </script>
@endsection
