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

        div textarea {
            padding: 10px;
            border: none;
            outline: none;
            font-size: 1rem;
            border-bottom: 2px solid #bbb;
            box-sizing: border-box;
            width: 100%;
            background: transparent;
        }

        div select {
            padding: 10px;
            outline: none;
            font-size: 1rem;
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
    <form action="/users/user/{{$blog->id}}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <h1>Blog Edit Form</h1>
        <div>
            <label>Title</label>
            <input type="text" placeholder="Title" name="title" value="{{old('title',$blog->title)}}">

        </div>
        @error('title')
        <p>{{$message}}</p>
        @enderror
        <div>
            <label>Photo</label>
            <input type="file" placeholder="Title" name="photo">

        </div>
        @error('title')
        <p>{{$message}}</p>
        @enderror
        <div>
            <label>Intro</label>
            <input type=" text" placeholder="Intro" name="intro" value="{{old('intro',$blog->intro)}}">

        </div>
        @error('intro')
        <p>{{$message}}</p>
        @enderror
        <div>
            <label>Slug</label>
            <input type="text" placeholder="Slug" name="slug" value="{{old('slug',$blog->slug)}}">

        </div>
        @error('slug')
        <p>{{$message}}</p>
        @enderror
        <div>
            <label>Body</label>
            <textarea type="text" placeholder="Body" name="body">{{old('body',$blog->body)}}</textarea>

        </div>
        @error('body')
        <p>{{$message}}</p>Category
        @enderror
        <div>
            <label>Body</label>
            <select name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}" name="category_id" {{$blog->category_id ? 'selected' :''}}>{{$category->name}}</option>
                @endforeach
            </select>

        </div>
        @error('Body')
        <p>{{$message}}</p>
        @enderror
        <button type=" submit">Edit Blog</button>
    </form>
</body>

</html>