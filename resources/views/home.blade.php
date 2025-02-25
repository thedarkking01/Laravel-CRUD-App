<!-- <!DOCTYPE html>
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

    <div style="border: 3px solid black;">
    <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
        @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body" placeholder="body content..."></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>All Post</h2>
        @foreach($posts as $post)
        <div style="background-color:gray; padding:10px;margin:10px;">
        <h3>{{$post['title']}} by {{$post->user->name}}</h3>
            <p>{{$post['body']}}</p>
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>
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
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            margin-top: 40px;
        }

        .auth-container, .post-container, .form-container {
            margin-bottom: 20px;
        }

        .auth-container p {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        form input, form textarea, form button {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }

        form input:focus, form textarea:focus {
            border-color: #4CAF50;
            outline: none;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background-color: #45a049;
        }

        .post-container {
            padding-top: 20px;
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .post-item {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: calc(33% - 20px);
            box-sizing: border-box;
        }

        .post-item h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .post-item p {
            color: #555;
        }

        .post-item a, .post-item button {
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            margin-right: 5px;
            cursor: pointer;
        }

        .post-item button {
            background-color: #dc3545;
        }

        .post-item a:hover, .post-item button:hover {
            opacity: 0.8;
        }

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-container h2 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">

    @auth
    <div class="auth-container">
        <p>Congrats, you are logged in!</p>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <div class="form-container">
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post Title" required>
            <textarea name="body" placeholder="Body Content..." required></textarea>
            <button type="submit">Save Post</button>
        </form>
    </div>

    <div class="post-container">
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div class="post-item">
            <h3>{{ $post['title'] }} by {{ $post->user->name }}</h3>
            <p>{{ $post['body'] }}</p>
            <div>
                <a href="/edit-post/{{$post->id}}">Edit</a>
                <form action="/delete-post/{{$post->id}}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <div class="form-container">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="Enter name" required>
            <input name="email" type="email" placeholder="Enter email" required>
            <input name="password" type="password" placeholder="Enter password" required>
            <button type="submit">Register</button>
        </form>
    </div>

    <div class="form-container">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name="loginname" type="text" placeholder="Enter name" required>
            <input name="loginpassword" type="password" placeholder="Enter password" required>
            <button type="submit">Log in</button>
        </form>
    </div>
    @endauth

</div>

</body>
</html>
