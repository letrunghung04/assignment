<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- những thư viện dùng chung cho toàn bộ dự án mới được phép đặt ở đây --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header>
        @include('clients.blocks.header')
    </header>
    <main>
        <aside>
            @include('clients.blocks.sidebar')
        </aside>
        <div class="content">
            {{-- $yield để chỉ định section có tên trong yield được hiển thị --}}
            @yield('content')
        </div>
    </main>
    <footer>
        @include('clients.blocks.footer')
    </footer>
</body>
@yield('js')
</html>