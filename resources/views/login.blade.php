<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - POS System</title>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    {{-- Select CDN --}}
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet"></link>

    
    {{-- Font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @if(Session::has('success'))
    <div class="backdrop active"></div>
    <div class="notification-modal active">
        <div class="success-icon"><i class="fa fa-check"></i></div>
        <div class="notification-confirmation">Your account setup is completed. You can login now with <span>{{Session::get('success')}}</span> password</div>
        <div class="confirm-button">
            <button id="ok-btn" class="btn">OK</button>
        </div>
    </div>
    @endif
    <div class="container hvCenter">
        <div class="setup-page dFlex jSB">
            <div class="left-img">
                <img src="{{ asset('assets/images/girl-on-login.png') }}" alt="">
            </div>
         <form method="post" action="{{url('login')}}" class="right-form">
            @csrf
            <h2>Welcome to <span>{{$check->business_name}}</span></h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input required name="email" type="email" class="form-control">
                <span class="error"></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input required name="password" type="password" class="form-control">
                <span class="error"></span>
            </div>
            @if(Session::has('error'))<div class="error auth-error">{{Session::get('error')}}</div>@endif
            <div class="buttons two">
                <a href="forget-password">Forget Password?</a>
                <button type="submit" class="btn">Login</button>
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
