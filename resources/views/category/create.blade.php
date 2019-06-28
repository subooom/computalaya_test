<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      *{
        letter-spacing: 2px;
      }
      body{
        background: azure;
        background-size: cover;
      }
      .page-header{
        color:#00f078
      }
      .label-style-changer{
        color: #2ed4d2
      }
      .input-style-changer{
        border: 1px solid #2ed4d2;
        background: azure;
      }
      .btn-primary-style-changer{
        background-color: #00a4ffc9;
        border-color: #00a4ffc9;
      }
      .btn-success-style-changer{
        background-color: #00f078;
        border-color: #00f078;
      }
    </style>
</head>

<body>
    <div class="container mt-3">
        <a class="btn btn-lg" href="/" style="
        color: #0028f7;
        font-weight: bold;
    "> < Go Back</a>
        <h2 class="mt-2 page-header">Add a Category</h2>
        <form id="ajax-form" method="POST" action="/category">
          @csrf
            <div class="form-group">
                <label class="label-style-changer" for="name">Name</label>
                <input required type="text" name="name" class="form-control input-style-changer" id="name" aria-describedby="nameHelp"
                    placeholder="Enter name of category">
            </div>

            <button type="submit" class="btn btn-success btn-success-style-changer mb-4" id="create-record-button">Create Category</button>
        </form>

    </div>
  </body>

  </html>
