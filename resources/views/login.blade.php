<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    <title>Login Page</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
          body {
            background: linear-gradient(to right, #ffffff, #d3d3d3);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            font-family: Arial, sans-serif;
        }
    </style>    
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Login</h5>

                @if(session('status') === 401)
                    <div class='alert alert-danger text-center border'> 
                        {{ session('error') }}
                    </div> 

                @else 

                @endif
                <form id="form-login" action='/login'>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="text" class="form-control" id="email" placeholder="Enter your Email..." required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label"><b>Password</b></label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password..." required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="mt-3 text-center">
                    <p class="mb-0">Don't have an account? <a href="/show-register">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
        
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
