<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CardiNote - Register</title>
    <link rel="stylesheet" href="css/login-register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <form action="{{ route('createAccount')}}" method="POST">
            @csrf
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h4 class="card-title text-center">Register</h4>

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

                    <x-input-field 
                    title="Confirm Password" 
                    name="confpassword" 
                    id="confpassword"
                    placeholder="Confirm Password" 
                    type="password" />

                    <x-input-field 
                    title="Full Name" 
                    name="name" 
                    id="name" 
                    value="{{ Session::get('name') }}"
                    placeholder="Full Name" 
                    type="text" />

                    <x-dropdown-input 
                    title="Gender" 
                    name="gender" 
                    id="gender"
                    value="{{ old('gender', Session::get('gender')) }}" 
                    placeholder="Gender"
                    :options="['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other']" />

                    <x-date-picker 
                    title="Date of Birth" 
                    name="dob" 
                    id="dob" 
                    value="{{ Session::get('dob') }}"
                    placeholder="Date of Birth" />

                    <button type="submit" class="btn btn-primary">Register</button>
                </div>

                <div class="card-footer text-center">
                    <small>Already have an account ?</small>
                    <a href="/login">Login</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>