<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Record Management System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/showCategory.css">
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="top-right links">
            <a href="/">Go Home</a>
        </div>

        <div class=" container">
            <div class="title m-b-md">
                Viewing Category: {{$category->name}}
            </div>
            <div class="records">
                <div class="{{$category->name}}">
                    <p class="category">{{$category->name}}</p>
                    <p>Description: {{$category->description}}</p>
                    <p>Created At: {{$category->created_at}}</p>
                    <a class="btn btn-info" href="/category/{{$category->id}}/edit">Edit</a>
                    <a class="btn btn-danger" href="">Delete</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
