<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setup - POS System</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    {{-- Select CDN --}}
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet"></link>
</head>

<body>

    <div class="container hvCenter">
        <div class="setup-page dFlex jSB">
            <div class="left-img">
                <img src="{{ asset('assets/images/girl-on-setup.png') }}" alt="">
            </div>
            <form method="post" class="right-form" action="{{url('setup')}}">
                @csrf
                <h2>Setup your account first</h2>
                <div class="top-headings">
                    <h3 class="business-details-heading active headingStep" id="business-heading">Business</h3> <span>>></span>
                    <h3 class="profile-details-heading headingStep" id="profile-heading">Profile</h3> <span>>></span>
                    <h3 class="account-details-heading headingStep" id="account-heading">Account</h3>
                </div>
                <div class="business-details multistep-page active">
                    <div class="row">
                        <div class="form-group">
                            <label for="business_name">Business Name</label>
                            <input name="business_name" type="text" class="form-control bName">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="business_email">Business Email</label>
                            <input name="business_email" type="email" class="form-control bEmail">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="business_address">Business Address</label>
                            <textarea name="business_address" cols="30" rows="2" class="form-control bAddress"></textarea>
                            <span class="error"></span>
                        </div>
                        <div class="buttons">
                            <button type="button" data-next="profile-details" class="btn nextBtn">Next</button>
                        </div>
                    </div>
                </div>
                <div class="profile-details multistep-page">
                    <div class="row">
                        <div class="form-group">
                            <label for="full_name">Full name</label>
                            <input name="full_name" type="text" class="form-control fName">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input name="mobile" type="number" class="form-control mNumber">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input name="city" type="text" class="form-control city">
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="state">State</label>
                            <select name="state" class="select state" name="state">
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

                        <div class="buttons two">
                            <button type="button" data-prev="business-details" class="btn prev prevBtn">Previous</button>
                            <button type="button" data-next="account-details" class="btn nextBtn">Next</button>
                        </div>
                    </div>
                </div>
                <div class="account-details multistep-page ">
                    <div class="row">
                        <div class="form-group">
                            <label for="notifications">Notifications</label>
                            <select name="notifications" class="notifications" name="notifications">
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="preferred_system">Preferred System</label>
                            <select name="preferred_system" class="preferred_system" name="preferred_system">
                                <option value="pc">PC / Laptop</option>
                                <option value="tab">Tablet</option>
                                <option value="mobile">Mobile</option>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <select name="currency" id="select" class="currency" name="currency">
                                <option value="₹">INR (₹ - Indian Rupee)</option>
                                <option value="$">USD ($ - US Dollar)</option>
                                <option value="€">EUR (€ - Euro)</option>
                                <option value="£">GBP (£ - British Pound)</option>
                                <option value="¥">JPY (¥ - Japanese Yen)</option>
                            </select>
                            
                        </div>

                        <div class="buttons two">
                            <button type="button" data-prev="profile-details" class="btn prev prevBtn">Previous</button>
                            <button type="submit" id="process" class="btn">Process</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



{{-- JQuery CDN --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    {{-- Select CDN --}}
    <script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
    {{-- JS --}}
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
