@extends('shopify-app::layouts.default')

@section('content')
    <a href="{{ URL::tokenRoute('home') }}">Go to home route</a>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, { title: 'Test Route' });
    </script>
@endsection
