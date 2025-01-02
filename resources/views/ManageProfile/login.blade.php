<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    <title>KAFA</title>
</head>

<body class="body">
    <div class="body_login">
        <div class="container d-flex justify-content-center">
            <div class="card login_card text-white w-50 p-5 mt-7">
                <div class="card-body">
                    <div class="text-center">
                        <img class="card-img-top p-2" src="{{ asset('images/logo.png') }}"
                            style="width: 300px; object-fit: cover;">
                    </div>
                    <h4 class="card-title fw-bold text-center">Welcome Back</h4>
                    <div class="form-container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="pre-label">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="name@email.com"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="pre-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Passsword"
                                    name="password" required>
                            </div>
                            <div class="container pt-4">
                                <div class="row">
                                    <div class="text-start col-md-6">
                                        <input type="checkbox" class="custom-control-input" name="remember"
                                            value="1" id="remember">
                                        <label for="remember" class="custom-control-label">Remember Me</label>
                                    </div>
                                    <div class="text-end col-md-6">
                                        <a href="" class="link-highlight text-forgot forgot-tab-link">Forgot
                                            Password</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 pt-4">
                                <button class="btn primaryButton text-white btn-sm w-100" type="submit">Login</button>
                            </div>
                            <a href="{{ route('register') }}" class="link-highlight text-forgot forgot-tab-link">Register</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
