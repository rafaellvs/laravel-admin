<section class="container-fluid">
    <div class="row header">
        <div class="col-9">
            <a href="/" style="color: inherit; text-decoration: none;">
                <h1>Laravel Admin</h1>
            </a>
        </div>
        
        <div class="col-3">
            @if(session('loginFailed'))
                <p style="color: red; font-weight: bold; margin: 0;">Dados incorretos.</p>
            @endif
            
            <form action="/admin" method="POST">
                {{ csrf_field() }}

                <input type="email" name="email" placeholder="E-mail">

                <input type="password" name="password" placeholder="Password">

                <button type="submit" class="btn-default">login</button>
            </form>
        </div>
    </div>
</section>