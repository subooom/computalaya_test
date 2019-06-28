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
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: azure;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 50px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .records {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-gap: 20px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


        .category {
            background: black;
            text-transform: uppercase;
            color: white;
            min-height: 50px;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .item {
            padding: 10px;
            transition: all .4s ease-in-out;
            cursor: pointer;
        }

        .item:hover {
            background: #0000000a;
            -webkit-box-shadow: 4px 6px 32px -9px rgba(77, 77, 77, 1);
            -moz-box-shadow: 4px 6px 32px -9px rgba(77, 77, 77, 1);
            box-shadow: 4px 6px 32px -9px rgba(77, 77, 77, 1);
        }

        .add-item {
            min-height: 150px;
            border: 3px dashed #00000012;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.5rem;
            color: #00000059;
            transition: all .4s ease-in-out;
        }

        .add-item:hover {
            text-decoration: none;
            border: 3px dashed #000000bf;
        }

    </style>
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
                    <a class="btn btn-primary" href="">View</a>
                    @if ($item->count == 0)
                      <a class="btn btn-danger" href="">Delete</a>
                    @endif
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>

</html>
