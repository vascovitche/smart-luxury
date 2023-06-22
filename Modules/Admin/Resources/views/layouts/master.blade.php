<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('node_modules/admin-lte/dist/img/AdminLTELogo.png') }}">
    <title>Project</title>

    @vite('node_modules/admin-lte/dist/css/alt/adminlte.light.css')
    @vite('node_modules/@fortawesome/fontawesome-free/css/all.min.css')

    @stack('style')

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    @include('admin::layouts.blocks.preloader')

    @include('admin::layouts.blocks.navbar')

    @include('admin::layouts.blocks.sidebar.sidebar')

    @include('admin::layouts.blocks.content.content')

    @include('admin::layouts.blocks.footer')
</div>

@include('admin::layouts.blocks.scripts')
</body>
</html>
