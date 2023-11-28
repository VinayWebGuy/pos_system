@extends('main.layouts.main')
@section('title', 'Edit Supplier')
@section('supplier', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Edit Supplier
            <a href="{{url('supplier/all')}}">All Supplier</a>
        </h4>
        <div class="data">
            <form id="update-supplier-form">
                <input type="hidden" name="id" id="id" value="{{$supplier->id}}">
                <div class="form-row">
                    <div class="form-block">
                        <label for="name">Name</label>
                        <input value="{{$supplier->name}}" id="name" type="text" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="">
                            <option @if($supplier->status == 1) {{'selected'}} @endif value="1">Active</option>
                            <option @if($supplier->status == 0) {{'selected'}} @endif value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-block">
                        <label for="email">Email</label>
                        <input value="{{$supplier->email}}" id="email" type="email" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="mobile">Mobile</label>
                        <input value="{{$supplier->mobile}}" id="mobile" type="number" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-block">
                        <label for="city">City</label>
                        <input value="{{$supplier->city}}" id="city" type="text" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="state">State</label>
                        <select name="state" class="select form-input state" id="state">
                            <option value="">Select</option>
                            <option @if($supplier->state == "Andhra Pradesh") {{'selected'}} @endif value="Andhra Pradesh">Andhra Pradesh</option>
                            <option @if($supplier->state == "Arunachal Pradesh") {{'selected'}} @endif value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option @if($supplier->state == "Assam") {{'selected'}} @endif value="Assam">Assam</option>
                            <option @if($supplier->state == "Bihar") {{'selected'}} @endif value="Bihar">Bihar</option>
                            <option @if($supplier->state == "Chhattisgarh") {{'selected'}} @endif value="Chhattisgarh">Chhattisgarh</option>
                            <option @if($supplier->state == "Goa") {{'selected'}} @endif value="Goa">Goa</option>
                            <option @if($supplier->state == "Gujarat") {{'selected'}} @endif value="Gujarat">Gujarat</option>
                            <option @if($supplier->state == "Haryana") {{'selected'}} @endif value="Haryana">Haryana</option>
                            <option @if($supplier->state == "Himachal Pradesh") {{'selected'}} @endif value="Himachal Pradesh">Himachal Pradesh</option>
                            <option @if($supplier->state == "Jammu and Kashmir") {{'selected'}} @endif value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option @if($supplier->state == "Jharkhand") {{'selected'}} @endif value="Jharkhand">Jharkhand</option>
                            <option @if($supplier->state == "Karnataka") {{'selected'}} @endif value="Karnataka">Karnataka</option>
                            <option @if($supplier->state == "Kerala") {{'selected'}} @endif value="Kerala">Kerala</option>
                            <option @if($supplier->state == "Madhya Pradesh") {{'selected'}} @endif value="Madhya Pradesh">Madhya Pradesh</option>
                            <option @if($supplier->state == "Maharashtra") {{'selected'}} @endif value="Maharashtra">Maharashtra</option>
                            <option @if($supplier->state == "Manipur") {{'selected'}} @endif value="Manipur">Manipur</option>
                            <option @if($supplier->state == "Meghalaya") {{'selected'}} @endif value="Meghalaya">Meghalaya</option>
                            <option @if($supplier->state == "Mizoram") {{'selected'}} @endif value="Mizoram">Mizoram</option>
                            <option @if($supplier->state == "Nagaland") {{'selected'}} @endif value="Nagaland">Nagaland</option>
                            <option @if($supplier->state == "Odisha") {{'selected'}} @endif value="Odisha">Odisha</option>
                            <option @if($supplier->state == "Punjab") {{'selected'}} @endif value="Punjab">Punjab</option>
                            <option @if($supplier->state == "Rajasthan") {{'selected'}} @endif value="Rajasthan">Rajasthan</option>
                            <option @if($supplier->state == "Sikkim") {{'selected'}} @endif value="Sikkim">Sikkim</option>
                            <option @if($supplier->state == "Tamil Nadu") {{'selected'}} @endif value="Tamil Nadu">Tamil Nadu</option>
                            <option @if($supplier->state == "Telangana") {{'selected'}} @endif value="Telangana">Telangana</option>
                            <option @if($supplier->state == "Tripura") {{'selected'}} @endif value="Tripura">Tripura</option>
                            <option @if($supplier->state == "Uttarakhand") {{'selected'}} @endif value="Uttarakhand">Uttarakhand</option>
                            <option @if($supplier->state == "Uttar Pradesh") {{'selected'}} @endif value="Uttar Pradesh">Uttar Pradesh</option>
                            <option @if($supplier->state == "West Bengal") {{'selected'}} @endif value="West Bengal">West Bengal</option>
                            <option @if($supplier->state == "Andaman and Nicobar Islands") {{'selected'}} @endif value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option @if($supplier->state == "Chandigarh") {{'selected'}} @endif value="Chandigarh">Chandigarh</option>
                            <option @if($supplier->state == "Dadra and Nagar Haveli and Daman and Diu") {{'selected'}} @endif value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and
                                Daman and Diu</option>
                            <option @if($supplier->state == "Delhi") {{'selected'}} @endif value="Delhi">Delhi</option>
                            <option @if($supplier->state == "Lakshadweep") {{'selected'}} @endif value="Lakshadweep">Lakshadweep</option>
                            <option @if($supplier->state == "Puducherry") {{'selected'}} @endif value="Puducherry">Puducherry</option>
                        </select>
                        <span class="error"></span>
                    </div>
                </div>
                <p class="error" id="error-msg"></p>
                <div class="buttons">
                    <button class="btn">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
