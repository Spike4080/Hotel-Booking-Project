<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            margin: 0 auto;
            max-width: 1200px;
            background-color: #f4f4f4;
        }

        form {
            background: #ffffff;
            max-width: 600px;
            max-height: 100vh;
            padding: 20px;
            border-radius: 10px;
            margin: 200px auto;
            box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: left;
            padding: 10px;
        }

        div label {
            display: block;
            color: #000000;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
            font-size: 14px;
            margin: 10px;
        }

        div input {
            padding: 10px;
            border: none;
            outline: none;
            font-size: 1rem;
            border-bottom: 2px solid #bbb;
            box-sizing: border-box;
            width: 100%;
            background: transparent;
        }

        form button {
            width: 100%;
            display: block;
            margin: 20px auto 0;
            background: #00ce89;
            color: #fff;
            padding: 15px 30px;
            border: 0;
            border-radius: 6px;
            font-size: 16px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .line {
            border-bottom: 2px dashed #000;
            padding: 10px;
        }

        button:hover {
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
            /* Adjust shadow on hover for an interactive effect */
        }

        p {
            text-transform: uppercase;
            color: crimson;
        }

        span {
            display: grid;
            place-items: center;
            font-size: 1.3rem;
            padding: 10px;
            margin: 0 auto;
        }

        a {
            letter-spacing: 1px;
            text-transform: capitalize;
            text-decoration: none;
            color: blue;
            font-weight: bold;
        }

        .flex {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <h1>Login Form</h1>
        @csrf
        <div>
            <label>Email</label>
            <input type="email" placeholder="Email" name="email" value="{{old('email')}}">

        </div>
        @error('email')
        <p>{{$message}}</p>
        @enderror
        <div>
            <label>Password</label>
            <input type="password" placeholder="Password" name="password">

        </div>
        @error('password')
        <p>{{$message}}</p>
        @enderror
        <button type="submit">Create Account</button>
        <div class="line"></div>
        <div class="flex">
            <div>
                <span>Don't have an account ? </span>
            </div>
            <p>
                <a href="/register">Register</a>
            </p>
        </div>
    </form>
</body>

</html>