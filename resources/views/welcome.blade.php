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
            font-size: 84px;
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

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="top-right links">
            <a href="/item/create">Add Item</a>
            <a href="/category/create">Add a Category</a>
        </div>

        <div class="content">
            <div class="title m-b-md">
                Record Management System
            </div>

            <div class="records row">
                @if ($items)
                  @foreach ($items as $item)
                    <div class="col-12 col-md-4 col-lg-4 item">
                        <h3>{{$item->name}}</h3>
                        <p>{{$item->brand}}</p>
                        <p class="color" style="background:{{$item->color}}">{{$item->color}}</p>
                        <p>{{$item->sku}}</p>
                        <p>{{$item->category}}</p>
                    </div>
                  @endforeach
                @else
                  <span>No records yet.</span>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script>
        function invertColor(hex) {
            if (hex.indexOf('#') === 0) {
                hex = hex.slice(1);
            }
            // convert 3-digit hex to 6-digits.
            if (hex.length === 3) {
                hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
            }
            if (hex.length !== 6) {
                throw new Error('Invalid HEX color.');
            }
            // invert color components
            var r = (255 - parseInt(hex.slice(0, 2), 16)).toString(16),
                g = (255 - parseInt(hex.slice(2, 4), 16)).toString(16),
                b = (255 - parseInt(hex.slice(4, 6), 16)).toString(16);
            // pad each with zeros and return
            return '#' + padZero(r) + padZero(g) + padZero(b);
        }

        function padZero(str, len) {
            len = len || 2;
            var zeros = new Array(len).join('0');
            return (zeros + str).slice(-len);
        }

        $(document).ready(function(){
        let colors = document.querySelectorAll('.color')
        for(let color of colors){
          color.style.color = invertColor(color.innerHTML)
        }
      })
    </script>
</body>

</html>
