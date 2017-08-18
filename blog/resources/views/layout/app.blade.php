<!-- 存放在 resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>App 名字- @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the 主要的 sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>