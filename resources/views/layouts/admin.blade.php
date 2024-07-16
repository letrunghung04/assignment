<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('lib/bootstrap.min.css')}}">
    <script src="{{asset('lib/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/angular.min.js')}}"></script>
    <script src="{{asset('lib/angular-route.js')}}"></script>
    <script src="{{asset('lib/font-fontawesome-ae333ffef2.js')}}"></script>
    @yield('css')
    <style>
        * {
            font-family: "Times New Roman", Times, serif;
        }
        a {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        @include('admins.blocks.header')
    </header>
    <main>
        <aside>
            @include('admins.blocks.sidebar')
        </aside>
        <div class="content">
            {{-- $yield để chỉ định section có tên trong yield được hiển thị --}}
            @yield('content')
        </div>
    </main>
    <footer>
        @include('admins.blocks.footer')
    </footer>
</body>
</html>