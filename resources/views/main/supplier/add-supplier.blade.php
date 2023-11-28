@extends('main.layouts.main')
@section('title', 'Add Supplier')
@section('supplier', 'active')
@section('content')
    <div class="content">
        <h4 class="page-heading">Add Supplier
            <a href="{{url('supplier/all')}}">All Supplier</a>
        </h4>
        <div class="data">
            <form id="supplier-form">
                <div class="form-row">
                    <div class="form-block">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-block">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="mobile">Mobile</label>
                        <input id="mobile" type="number" class="form-input">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-block">
                        <label for="city">City</label>
                        <input id="city" type="text" class="form-input">
                    </div>
                    <div class="form-block">
                        <label for="state">State</label>
                        <select name="state" class="select form-input state" id="state">
                            <option value="">Select</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and
                                Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
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
