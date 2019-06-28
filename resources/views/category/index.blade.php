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
    <link rel="stylesheet" href="/css/browseCategory.css">
</head>

<body>
    <div class="container-fluid">
        <div class="top-right links">
            <a href="/">Go Home</a>
        </div>

        <div class=" container">
            <div class="title m-b-md">
                Viewing Categories
            </div>
            <div class="records">
                <a class="add-item" href="/category/create">
                    + add new category
                </a>
                @if ($categories)
                @foreach ($categories as $item)
                <div class="item">
                    <p class="category">{{$item->name}}</p>
                    <h3>{{$item->description}}</h3>
                    <p>There are {{$item->count}} items in this category.</p>
                    <a class="btn btn-primary" href="/category/{{$item->id}}">View</a>
                    @if ($item->count == 0)
                      <form action="{{route('category.destroy',[$item->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                       </form>
                    @endif
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>

</html>
