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
</head>

<body>

    <div class="container hvCenter">
        <div class="setup-page dFlex jSB">
            <div class="left-img">
                <img src="{{ asset('assets/images/girl-on-forget.png') }}" alt="">
            </div>
         <form method="post" action="{{url('forget-password')}}" class="right-form">
            @csrf
            <h2>Forget  password of <span>{{$check->business_name}}</span></h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control">
                <span class="error"></span>
            </div>
            <div class="buttons two">
                <a href="login">Bak to Login</a>
                <button type="submit" class="btn">Reset</button>
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
