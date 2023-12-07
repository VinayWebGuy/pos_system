@extends('main.layouts.main')
@section('title', 'Report')
@section('report', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Report</h4>
        <div class="backdrop"></div>
        <div class="delete-modal">
            <div class="delete-icon"><i class="fa fa-question"></i></div>
            <div class="delete-confirmation">Are you sure do you really want to delete this?</div>
            <div class="delete-buttons">
                <button id="cancel-delete" class="btn prev">No</button>
                <button id="confirm-delete" class="btn">Yes</button>
            </div>
        </div>
        <div class="data">
            <div class="single-report">
                <div class="report-heading">Products</div>
                <div class="product-filter report-filters">
                    <div class="filter">
                        <input type="checkbox" name="no_stock" id="no_stock">
                        <label for="no_stock">No Stock</label>
                    </div>
                    <div class="filter">
                        <input type="checkbox" name="without_category" id="without_category">
                        <label for="without_category">Without Category</label>
                    </div>
                </div>
                <button class="btn" id="product-report-download">Download <i class="fa fa-download"></i></button>
            </div>
        </div>
        <div class="single-report">
            <div class="report-heading">Category</div>
            <button class="btn" id="category-report-download">Download <i class="fa fa-download"></i></button>
        </div>
        <div class="single-report">
            <div class="report-heading">Purchase</div>
            <div class="purchase-filter report-filters">
                <div class="filter">
                    <input value="yesterday" type="radio" class="purchase_range" name="purchase_range" id="yesterday">
                    <label for="yesterday">Yesterday</label>
                </div>
                <div class="filter">
                    <input value="today" type="radio" class="purchase_range" name="purchase_range" id="today">
                    <label for="today">Today</label>
                </div>
                <div class="filter">
                    <input value="all" type="radio" class="purchase_range" name="purchase_range" id="all">
                    <label for="all">All</label>
                </div>
                <div class="filter">
                    <input value="date_range" type="radio" class="purchase_range" name="purchase_range" id="date_range">
                    <label for="date_range">Date range</label>
                </div>
                <div class="filter purchase-date-filter">
                    <input type="date" name="start_date" id="start_date">
                    <input type="date" name="end_date" id="end_date">
                </div>
            </div>
            <button class="btn" id="purchase-report-download">Download <i class="fa fa-download"></i></button>
        </div>
        <div class="single-report">
            <div class="report-heading">Sale</div>
            <div class="sale-filter report-filters">
                <div class="filter">
                    <input value="sale_yesterday" type="radio" class="sale_range" name="sale_range" id="sale_yesterday">
                    <label for="sale_yesterday">Yesterday</label>
                </div>
                <div class="filter">
                    <input value="sale_today" type="radio" class="sale_range" name="sale_range" id="sale_today">
                    <label for="sale_today">Today</label>
                </div>
                <div class="filter">
                    <input value="sale_all" type="radio" class="sale_range" name="sale_range" id="sale_all">
                    <label for="sale_all">All</label>
                </div>
                <div class="filter">
                    <input value="sale_date_range" type="radio" class="sale_range" name="sale_range" id="sale_date_range">
                    <label for="sale_date_range">Date range</label>
                </div>
                <div class="filter sale-date-filter">
                    <input type="date" name="start_date" id="start_date">
                    <input type="date" name="end_date" id="end_date">
                </div>
            </div>
            <button class="btn" id="sale-report-download">Download <i class="fa fa-download"></i></button>
        </div>
    </div>

@endsection
