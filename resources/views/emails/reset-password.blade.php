<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

            <div class="container">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('reset-password'))
                    <p class="alert alert-success"><b>{{ session('reset-password') }}</b></p>
                @endif

                <form method="POST" action="{{ route('reset-password') }}">
                    @csrf
                    <div>
                        <label for="email" class="form-label">Email:</label>
                        <div class="input-group">
                            <button class="btn btn-none border-right-none" type="button">
                                <img src="{{ asset('assets/icon/email_phone.png') }}" alt="email-phone">
                            </button>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Nhập Email" value="{{ old('email') }}"" required>
                        </div>
                    </div>
                    <div>
                        <label for="password" class="form-label">Mật khẩu:</label>
                        <div class="input-group">
                            <button class="btn btn-none border-right-none" type="button">
                                <img src="{{ asset('assets/icon/lock.png') }}" alt="lock">
                            </button>

                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Nhập mật khẩu mới" required>
                            <button class="btn btn-none border-left-none" type="button" onclick="showPassword()">
                                <i class="fa-solid fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="form-label">Nhập lại mật khẩu:</label>
                        <div class="input-group">
                            <button class="btn btn-none border-right-none" type="button">
                                <img src="{{ asset('assets/icon/lock.png') }}" alt="lock">
                            </button>

                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
                            <button class="btn btn-none border-left-none" type="button" onclick="showRePassword()">
                                <i class="fa-solid fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-pink btn-resgiter">Xác nhận</button>

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
