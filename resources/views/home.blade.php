<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth 
    <p>Congrats you are login</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="enter name">
            <input name="email" type="text" placeholder="enter email">
            <input name="password" type="password" placeholder="enter password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="enter name">
            <input name="loginpassword" type="password" placeholder="enter password">
            <button>Log in </button>
        </form>
    </div>
    @endauth

    
</body>
</html>