<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('modules/admin/plugins/admin-lte/dist/css/alt/adminlte.light.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/admin/plugins/fontawesome-free/css/all.min.css') }}">

{{--    <link rel="stylesheet"--}}
{{--          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
{{--    <link rel="stylesheet" href="{{Module::asset('admin:plugins/fontawesome-free/css/all.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{Module::asset('admin:plugins/bootstrap/dist/css/bootstrap.min.css')}}"/>--}}
{{--    <link rel="stylesheet" href="{{ Module::asset('admin:css/adminlte.min.css') }}">--}}
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <strong class="h1">{{ config('app.name') }}</strong>
        </div>
        <div class="card-body">
            @if (session('error'))
                <p class="alert-danger rounded login-box-msg mb-2" style="text-align: center; padding: 0">
                    {{ session('error') }}
                </p>
            @endif
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('admin.login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

