<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel | Crud</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Nunito', sans-serif;
                margin: 0 3rem;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1>Lista Post</h1>
        <a href="{{route('posts.create')}}" class="btn bg-primary">Crea nuovo post</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post) 
                <tr>
                    <td scope="row">{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a href="{{route('posts.show', ['post' => $post->id])}}" class="btn btn-primary">
                            <i class="fas fa-eye fa-lg fa-fw"></i>
                            View
                        </a>   
                        <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-warning">
                            <i class="fas fa-pen fa-lg fa-fw"></i>
                            Edit
                        </a>  
                        <form action="{{route('posts.destroy', ['post' => $post->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash fa-lg fa-fw"></i>
                                Delete
                            </button>
                        </form> 
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>


    </body>
</html>