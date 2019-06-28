<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Viewing Records</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/home.css">
</head>

<body>
    <div class="container-fluid mb-5">
        <div class="top-right links">
            <a href="/category">View Categories</a>
        </div>

        <div class=" container">
            <div class="title m-b-md">
                Viewing Records
            </div>
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle mb-5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Sort By Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">All</a>
                  @foreach ($categories as $item)
                    <a class="dropdown-item" href="#">{{$item->name}}</a>
                  @endforeach
                </div>
              </div>
            <div class="records">
                <a class="add-item" href="/item/create">
                    + add new item
                </a>
                @if ($items)
                @foreach ($items as $item)
                <div class="item all {{$item->category_slug}}">
                    <p class="category">{{$item->category_slug}}</p>
                    <h3>{{$item->name}}</h3>
                    <p>{{$item->brand}}</p>
                    <p class="color" style="background:{{$item->color}}">{{$item->color}}</p>
                    <p>{{$item->sku}}</p>
                    <a class="btn btn-primary" href="/item/{{$item->id}}">View</a>

                    <form action="{{route('item.destroy',[$item->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Delete</button>
                       </form>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="/js/home.js"></script>
</body>

</html>
