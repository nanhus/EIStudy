<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/77b9f618ff.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div>
        <div class="left">
            <div class="overlay"></div>
            <div class="logo"></div>
        </div>
        <div class="right">
            <div class="nar">
                <a href="{{ route('login') }}" class="nar-decor">
                    <i class="fa-regular fa-circle-left nar-color"></i>
                    <span class="nar-color">&ensp;ĐĂNG NHẬP<span>
                </a>
            </div>

            <div class="logo-white"></div>
            <div class="welcome">&emsp;Chào mừng bạn đã đến với EI
                Germany!</div>

            <div class="container">
                <form method="POST" action="{{ route('register.action') }}">
                    @csrf
                    <div>
                        <label for="name" class="form-label">Name:</label>
                        <div class="input-group">
                            <button class="btn btn-none border-right-none" type="button">
                                <i class="far fa-user fw-bold"></i>
                            </button>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter your name" value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="form-label">Email:</label>
                        <div class="input-group">
                            <button class="btn btn-none border-right-none" type="button">
                                <img src="{{ asset('assets/icon/email_phone.png') }}" alt="email-phone">
                            </button>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter Email" value="{{ old('email') }}"" required>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <button class="btn btn-none border-right-none" type="button">
                                <img src="./assets/icon/lock.png" alt="lock">
                            </button>

                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                            <button class="btn btn-none border-left-none" type="button" onclick="showPassword()">
                                <i class="fa-solid fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="form-label">Re-Password:</label>
                        <div class="input-group">
                            <button class="btn btn-none border-right-none" type="button">
                                <img src="./assets/icon/lock.png" alt="lock">
                            </button>

                            <input type="password" class="form-control" id="re-password" name="re-password"
                                placeholder="Enter password" required>
                            <button class="btn btn-none border-left-none" type="button" onclick="showRePassword()">
                                <i class="fa-solid fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-pink btn-resgiter">Đăng ký</button>

            </div>
            </form>
        </div>

    </div>


    </div>

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js
                    "></script>
    <script src="{{ asset('js/show_password.js') }}"></script>
</body>


</html>
