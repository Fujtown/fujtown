<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fujtown Account System - Login</title>
    <meta name="description" content="Fujtown Account System - Login">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/admin/img/logo.png">
    <link rel="shortcut icon" href="assets/admin/img/logo.png">

    <link rel="stylesheet" href="{{asset('assets/accounts/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/accounts/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/accounts/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/accounts/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/accounts/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/accounts/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/accounts/css/normalize.css')}}assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('assets/accounts/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.php">
                    <img class="align-content" style="width: 200px" src="{{asset('assets/accounts/img/logo.png')}}" alt="">
                </a>
            </div>
            <div class="login-form">

            @if ($errors->any())
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               >
                <form action="{{route('account.login_account')}}" method="POST" >
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>

                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                </form>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/admin/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/plugins.js')}}"></script>
<script src="{{asset('assets/admin/js/main.js')}}"></script>


</body>
</html>