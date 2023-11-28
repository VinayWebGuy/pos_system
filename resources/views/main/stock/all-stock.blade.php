@extends('main.layouts.main')
@section('title', 'All Stock')
@section('stock', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Stock
            <a href="{{url('stock/add')}}">Add Stock</a>
        </h4>
    </div>
@endsection
