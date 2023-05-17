<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verify OTP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/77b9f618ff.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Display any error message -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('send-otp'))
        <p class="alert alert-success">
            <b>
                {{ session('send-otp') }} 
                <br>
                {{ session('expiry') }}
            </b>
        </p>
    @endif
    <!-- OTP verification form -->
    <form method="POST" action="{{ route('verify-otp') }}">
        @csrf
        <label for="otp">Nhập OTP:</label>
        <input type="text" id="otp" name="otp">
        <button type="submit">Xác minh</button>
    </form>

</body>

</html>
