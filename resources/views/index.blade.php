@extends('layouts.master')
    
@section('content')

<div class="container">
    <div class="row login">
        <div class="col-3">
            <h1>Login</h1>
            
            <form action="#" method="POST">
                {{ csrf_field() }}

                <label for="user">Username:</label>
                <input type="text" name="user">

                <label for="pass">Password:</label>
                <input type="password" name="pass">

                <button type="submit">login</button>
            </form>
        </div>
    </div>
</div>

@stop