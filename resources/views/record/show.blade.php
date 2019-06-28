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
    <link rel="stylesheet" href="/css/showItem.css">
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="top-right links">
            <a href="/">Go Home</a>
        </div>

        <div class=" container">
            <div class="title m-b-md">
                Viewing Item: {{$item->name}}
            </div>
            <div class="records">
                <div class="item all {{$item->category_slug}}">
                    <p class="category">{{$item->category_slug}}</p>
                    <h3>{{$item->name}}</h3>
                    <p>Brand: {{$item->brand}}</p>
                    <p class="color" style="background:{{$item->color}}">{{$item->color}}</p>
                    <p>SKU: {{$item->sku}}</p>
                    @foreach ($item->decodedAttributes as $attr => $value)
                      <p>{{ucfirst($attr)}}: {{$value}}</p>
                    @endforeach
                    <a class="btn btn-info" href="/item/{{$item->id}}/edit">Edit</a>

                    <form action="{{route('item.destroy',[$item->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                       </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
