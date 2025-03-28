<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CardiNote - Login</title>
    <link rel="stylesheet" href="css/login-register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center my-3">
        @include('components.title-box')
    </div>
    @error('wronginfo')
    <div class="alert alert-warning alert-dismissible fade show" role="alert"
        style="position: absolute; transform:translateX(-50%); left: 50%; bottom: 3%;">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror
    <div class="container d-flex justify-content-center">
        <form action="{{ route('sessionLogin')}}" method="POST">
            @csrf
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h4 class="card-title text-center">Log In</h4>

                    <x-input-field 
                    title="Email Address" 
                    name="email" 
                    id="email" 
                    value="{{ Session::get('email') }}"
                    placeholder="Email" 
                    type="email" />

                    <x-input-field 
                    title="Password" 
                    name="password" 
                    id="password" 
                    placeholder="Password"
                    type="password" />
                    
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>

                <div class="card-footer text-center">
                    <small>Don't have an account ?</small>
                    <a href="/register">Register</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>