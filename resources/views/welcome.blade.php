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
    <div class="container-fluid mb-5">
        <div class="top-right links">
            <a href="/category">View Categories</a>
        </div>

        <div class=" container">
            <div class="title m-b-md">
                Record Management System
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
                    <a class="btn btn-primary" href="">View</a>
                    <a class="btn btn-danger" href="">Delete</a>
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
    <script>
        function str_slug(text, delimeter)
        {
          return text
          .toLowerCase()
          .replace(/ /g,delimeter)
          .replace(/[^\w-]+/g,'')
      ;
        }
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

        $(document).ready(function () {
            let colors = document.querySelectorAll('.color')
            for (let color of colors) {
                color.style.color = invertColor(color.innerHTML)
                color.style.padding = '4px'
            }
            $('.dropdown-item').click(function(e){
              e.preventDefault();
              let needed = str_slug(e.target.innerHTML, '-');
              $('#dropdownMenuButton').text(e.target.innerHTML);
              $('.item').fadeOut();
              $('.'+needed).fadeIn();
            })
        })

    </script>
</body>

</html>
