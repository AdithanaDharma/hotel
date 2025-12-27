<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('template/login/css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
    .form-control {
        background-color: #ffffff !important;
        color: #000 !important;
        border: 1px solid #ccc !important;
        box-shadow: none !important;
    }

    .form-control:focus {
        background-color: #ffffff !important;
        color: #000 !important;
        border-color: #0B3A19 !important; /* hijau gelap */
    }
</style>

</head>

<body>
    <section class="ftco-section min-h-screen" style="background-color: #DDE7DB">
        <div class="container">
            <div class="flex flex-col text-center items-center w-full">
                <div class="flex flex-col">
                    <div class="w-100">
                        <h3 class="font-semibold text-4xl" style="color: #0B3A19">Calluella house</h3>
                        <h3 class="font-semibold text-4xl">Daftar Akun</h3>
                        <p class="py-4">Buat akun baru untuk booking villa</p>
                    </div>
                </div>
                <div class="flex flex-col w-full items-center max-w-lg">
                    <div class="wrap">
                        <div class=" p-4 max-w-lg mx-auto bg-white rounded-lg shadow-md">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group mt-3 mb-3">
                                    <label for="full-name"
                                        class="text-left items-start w-full text-black">Full Name</label>
                                    <input type="text" class="form-control rounded-md" required autofocus
                                        placeholder="Full Name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="username"
                                        class="text-left items-start w-full text-black">Username</label>
                                    <input type="text" class="form-control rounded-md" required placeholder="Username"
                                        name="username" value="{{ old('username') }}">
                                    @error('username')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="email"
                                        class="text-left items-start w-full text-black">Email</label>
                                    <input type="email" class="form-control rounded-md" required placeholder="Email"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="no_hp"
                                        class="text-left items-start w-full text-black">No HP</label>
                                    <input type="text" class="form-control rounded-md" required placeholder="No HP"
                                        name="no_hp" value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="address"
                                        class="text-left items-start w-full text-black">Alamat</label>
                                    <input type="text" class="form-control rounded-md" required placeholder="Alamat"
                                        name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="password"
                                        class="text-left items-start w-full text-black">Password</label>
                                    <input id="password-field" type="password" class="form-control rounded-md" required
                                        placeholder="Password" name="password">
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password mt-3"></span>
                                    @error('password')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3 mb-3">
                                    <label for="password_confirmation"
                                        class="text-left items-start w-full text-black">Confirm Password</label>
                                    <input id="password-confirm-field" type="password" class="form-control rounded-md" required
                                        placeholder="Confirm Password" name="password_confirmation">
                                    <span toggle="#password-confirm-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password mt-3"></span>
                                </div>

                                <input type="hidden" name="role" value="user">

                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                        Register
                                    </button>
                                </div>
                                <p class="text-center mb-0">Already have an account? <a
                                        href="{{ route('login') }}">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('template/login/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/login/js/popper.js') }}"></script>
    <script src="{{ asset('template/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/login/js/main.js') }}"></script>

</body>

</html>
