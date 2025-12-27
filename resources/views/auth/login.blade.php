<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('template/login/css/style.css') }}">

    <style>
        .alert-danger {
            background-color: rgba(220, 53, 69, 0.5);
            color: #fff;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border-left: 4px solid #dc3545;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <section class="ftco-section min-h-screen" style="background-color: #DDE7DB">
        <div class="container">
            <div class="flex flex-col text-center items-center">
                <div class="flex flex-col">
                    <div class="w-100">
                        <h3 class="font-semibold text-4xl" style="color: #0B3A19">Calluella House</h3>
                        <h3 class="font-semibold -mt-2 text-4xl">Selamat Datang</h3>
                        <p class="py-3">Buat akun baru untuk booking villa</p>
                    </div>
                </div>
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="login-wrap p-4 p-md-5">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert-danger">
                                        Invalid username or password. Please try again.
                                    </div>
                                @endif
                                <div class="form-group mt-3 mb-3">
                                    <label for="username"
                                        class="text-left items-start w-full text-black">Username</label>
                                    <input type="text" class="rounded-md border-1 border-black w-full" required autofocus placeholder="Username"
                                        name="username" value="{{ old('username') }}">

                                </div>
                                <div class="form-group">
                                    <label for="password"
                                        class="text-left items-start w-full text-black">Password</label>
                                    <input id="password-field" type="password" class="rounded-md border-1 border-black w-full" required
                                        placeholder="Password" name="password">
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password mt-3"></span>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                                <p class="text-center mb-0">Don't have an Account? <a
                                        href="{{ route('register') }}">Sign
                                        Up</a></p>
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
