@extends('main.layouts.main')
@section('title', 'All Purchase')
@section('purchase', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Purchase
            <a href="{{url('purchase/add')}}">Add Purchase</a>
        </h4>
    </div>
@endsection
