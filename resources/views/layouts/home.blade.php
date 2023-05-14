<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/body_header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/body_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.scss') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/77b9f618ff.js" crossorigin="anonymous"></script>
</head>


<body>
    @csrf
    <!--HEADER-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <div class="row w-100 mt-1 mb-0">
                    <div class="col-1"></div>
                    <div class="col-2">
                        <img src="./assets/logo/logo-pink.png" alt="logo_2" class="logo-2">
                    </div>
                    <div class="col-6"> </div>
                    <div class="col-2">
                        @if (Auth::check())
                            <h5><button class="btn btn-none border-right-none" type="button">
                                    <i class="far fa-user fw-bold"></i>
                                </button>
                                <b>{{ Auth::user()->name }}</b>
                            </h5>
                        @else
                            <h5><button class="btn btn-none border-right-none" type="button">
                                    <i class="far fa-user fw-bold"></i>
                                </button>
                                <b>Guest</b>
                            </h5>
                        @endif
                    </div>
                    <div class="col-1">
                        <div class="logout">
                            <a href="{{ route('logout')}}" class="decor-none">
                                <img src="./assets/icon/back.png" alt="back">
                                <span class="pink-color">ĐĂNG XUẤT</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </nav>
        <hr>
    </header>

    @php
        $main = file_get_contents(public_path('html/main_home.html'));
        echo $main;
    @endphp

    <!-- FOOTER-->
    @php
        $body_footer = file_get_contents(public_path('html/body_footer.html'));
        echo $body_footer;
    @endphp

    @php
        $footer = file_get_contents(public_path('html/footer.html'));
        echo $footer;
    @endphp
</body>

</html>
