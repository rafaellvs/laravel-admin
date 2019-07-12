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
</head>
<body>
    <section class="container-fluid">
        <div class="row admin">
            <div class="col-2 admin-menu">
                <h1>Menu</h1>
                
                <a href="/admin/posts">
                    <button type="button">Posts</button>
                </a>
            </div>
            
            <div class="col-9 admin-content">
                <h1>Admin panel</h1>

                @yield('content')
            </div>
        </div>
    </section>
</body>
</html>