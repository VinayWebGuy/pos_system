<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - POS System</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- Select CDN --}}
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet">
    </link>
    {{-- Datatable --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    {{-- Font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@php
    $check = DB::table('setup')->first();
@endphp

<body>
    <main>
        <div class="sidebar">
            <div class="sidemenu">
                <a href="{{url('/dashboard')}}" class="menu-item logo-item">
                    <i class="fa-solid fa-heart"></i> <span>POS </span>
                </a>
                <a href="{{url('/dashboard')}}" class="menu-item @yield('dashboard')">
                    <i class="fa-solid fa-home"></i> <span>Dashboard</span>
                </a>
                <a href="{{url('/category/all')}}" class="menu-item @yield('category')">
                    <i class="fa-solid fa-list"></i> <span>Category</span>
                </a>
                <a href="{{url('/product/all')}}" class="menu-item @yield('product')">
                    <i class="fa-solid fa-basket-shopping"></i> <span>Products</span>
                </a>
                <a href="{{url('/purchase/add')}}" class="menu-item @yield('purchase')">
                    <i class="fa-solid fa-bag-shopping"></i> <span>Purchase</span>
                </a>
                <a href="{{url('/sale/add')}}" class="menu-item @yield('sale')">
                    <i class="fa-solid fa-file-invoice"></i> <span>Sale</span>
                </a>    
                <a href="{{url('/report')}}" class="menu-item @yield('report')">
                    <i class="fa-solid fa-file"></i> <span>Report</span>
                </a>
                <a href="{{url('/supplier/all')}}" class="menu-item @yield('supplier')">
                    <i class="fa-solid fa-user-check"></i> <span>Supplier</span>
                </a>
                <a href="{{url('/account')}}" class="menu-item @yield('account')">
                    <i class="fa-solid fa-cog"></i> <span>Account</span>
                </a>
                <a href="{{url('/security')}}" class="menu-item @yield('security')">
                    <i class="fa-solid fa-shield-halved"></i> <span>Security</span>
                </a>
                <a href="{{url('logout')}}" class="menu-item">
                    <i class="fa-solid fa-sign-out"></i> <span>Log out</span>
                </a>
            </div>
        </div>
        <div class="rest-page">
            <header>
                <div class="toggle-sidebar">
                    <i class="fa-solid fa-bars-staggered" id="toggleBar"></i>
                </div>
                <div class="shop-name">{{ $check->business_name }}</div>
                <div class="right-header">
                    <i class="fa-solid fa-bell"></i>
                    <i class="fa-solid fa-cog"></i>
                    <a href="{{url('logout')}}"><i class="fa-solid fa-sign-out"></i></a>
                </div>
            </header>