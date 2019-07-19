<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <script src="/js/admin.js"></script>
    @stack('scripts')
</head>
<body>
    <section class="container-fluid">
        <div class="row admin">
            <div class="col-2 admin-menu">
                <a href="/">
                    <button type="button">home</button>
                </a>

                <h1>Menu</h1>
                
                <a href="/admin/posts">
                    <button type="button">Posts</button>
                </a>

                <a href="/admin/banners">
                    <button type="button">Banners</button>
                </a>
            </div>
            
            <div class="col-8 admin-content">
                <h1>Admin panel</h1>
                
                @yield('content')
            </div>

            <div class="col-2 logout">
                <p>Logged is as {{ auth()->user()->name }}</p>

                <form action="/logout" method="POST">
                    @csrf
                    
                    <button type="submit" class="bttn show" style="margin: 0;">logout</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>