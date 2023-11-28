@extends('main.layouts.main')
@section('title', 'All Sale')
@section('sale', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">All Sale
            <a href="{{url('sale/add')}}">Add Sale</a>
        </h4>
    </div>
@endsection
