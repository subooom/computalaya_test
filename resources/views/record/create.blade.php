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
        * {
            letter-spacing: 2px;
        }

        body {
            background: azure;
            background-size: cover;
        }

        .page-header {
            color: #00f078
        }

        .label-style-changer {
            color: #2ed4d2
        }

        .input-style-changer {
            border: 1px solid #2ed4d2;
            background: azure;
        }

        .btn-primary-style-changer {
            background-color: #00a4ffc9;
            border-color: #00a4ffc9;
        }

        .btn-success-style-changer {
            background-color: #00f078;
            border-color: #00f078;
        }

    </style>
</head>

<body>
    <div class="container mt-3">
        <a class="btn btn-lg" href="/" style="color: #0028f7; font-weight: bold;"> < Go Back</a>
        <h2 class="mt-2 page-header">Add a record</h2>
        <span id="error-span" style="color: #ffbaba"></span>
        <form id="ajax-form" action="#">
            <div class="row">
                <div class="form-group col-6 col-md-6 col-lg-6">
                    <label class="label-style-changer" for="name">Name</label>
                    <input requi#ffbaba type="text" class="form-control input-style-changer" id="name"
                        aria-describedby="nameHelp" placeholder="Enter name of item">
                </div>
                <div class="form-group col-6 col-md-6 col-lg-6">
                    <label class="label-style-changer" for="brand">Brand</label>
                    <input requi#ffbaba type="text" class="form-control input-style-changer" id="brand"
                        aria-describedby="brandHelp" placeholder="Enter brand of item">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-1 col-md-1 col-lg-1">
                    <label class="label-style-changer" for="color">Color</label>
                    <input requi#ffbaba type="color" class="form-control color-picker  input-style-changer"
                        id="color" aria-describedby="colorHelp" placeholder="Enter color of item">
                </div>
                <div class="form-group col-5 col-md-5 col-lg-5">
                    <label class="label-style-changer" for="sku">SKU Code</label>
                    <input requi#ffbaba type="text" class="form-control input-style-changer" id="sku"
                        aria-describedby="skuHelp" placeholder="Enter SKU Code of item">
                </div>
                <div class="form-group col-6 col-md-6 col-lg-6">
                    <label class="label-style-changer" for="quantity">Quantity</label>
                    <input requi#ffbaba type="number" class="form-control input-style-changer" id="quantity"
                        aria-describedby="quantityHelp" placeholder="Enter quantity of item">
                </div>
            </div>
            <div class="row" id="feed-me-baby">
                <div class="form-group col-6 col-md-6 col-lg-6">
                    <label class="label-style-changer" for="category">Category</label>
                    <select class="form-control input-style-changer" id="category">
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-success-style-changer mb-4"
                id="create-record-button">Create A Record</button>
        </form>

        <a href="/category/create" class="btn btn-info btn-info-style-changer mb-4">Create A Category</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-primary-style-changer mb-4" data-toggle="modal"
            data-target="#exampleModal">
            + Add a Custom Feild
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title page-header" id="exampleModalLabel">Add a Custom Feild</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="label-style-changer name-of-feild" for="name-of-feild">Name Of
                                Feild</label>
                            <input requi#ffbaba type="text" class="form-control input-style-changer"
                                id="name-of-feild" placeholder="RAM, Processor, Volume">
                        </div>
                        <div class="form-group">
                            <label class="label-style-changer" for="datatype">Datatype</label>
                            <select class="form-control input-style-changer" id="datatype">
                                <option value="text">Text</option>
                                <option value="number">Number</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-primary-style-changer"
                            id="add-feild-button">Add Feild</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js"></script>

        <script>
            function str_slug(text, delimeter) {
                return text
                    .toLowerCase()
                    .replace(/ /g, delimeter)
                    .replace(/[^\w-]+/g, '');
            }

            function rgb2hex(rgb) {
                rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
                return (rgb && rgb.length === 4) ? "#" +
                    ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
                    ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
                    ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
            }
            $(document).ready(function () {
                let name, brand, color, sku, quantity, category;
                let attributes = [];

                let customInputs = [];

                const pickr = Pickr.create({
                    el: '.color-picker',
                    theme: 'nano',
                    components: {

                        // Main components
                        preview: true,
                        hue: true,
                        // Input requi#ffbaba / output Options
                        interaction: {
                            hex: true,
                            rgba: false,
                            input: true,
                            clear: true,
                            save: true
                        }
                    }
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#add-feild-button').click(function () {
                    // Get value of the input requi#ffbaba feilds
                    let feildName = $('#name-of-feild').val();
                    let datatype = $('#datatype').val();

                    feildName = str_slug(feildName, "-");
                    datatype = str_slug(datatype, "-");
                    $('.name-of-feild')[0].innerHTML = 'Name Of Feild';
                    if(feildName){
                      if (!customInputs.includes(feildName)) {
                          // Close the modal first
                          $('#exampleModal').modal('toggle');
                          customInputs.push(feildName);
                          // Create a template
                          let template = `
                              <div class="form-group custom-feild-input requi#ffbaba col-6 col-md-6 col-lg-6" id="detect-onchange-${feildName}" style="display:none" data-name="${feildName}" data-datatype="${datatype}">
                                <span class="delete-feild-button btn btn-danger btn-sm pull-right">Remove</span>
                                <label class="label-style-changer" for="${feildName}">{{ucfirst('${feildName}')}}</label>
                                <input requi#ffbaba type="${datatype}" class="form-control input-style-changer" id="${feildName}" aria-describedby="${feildName}Help" placeholder="Enter {{ucfirst('${feildName}')}} of item">
                                </div>
                                `;

                          // Append the template to the main form
                          $('#feed-me-baby').append(template);

                          $('.delete-feild-button').click(function () {
                              $(this)[0].parentNode.style.display = 'none';
                              $(this)[0].parentNode.remove();
                          })
                          $('.custom-feild-input').fadeIn('slow');

                          // Empty the values of both inputs
                          $('#name-of-feild').val('');
                          $('#datatype').val('text');
                      } else {
                          $('#exampleModal').effect('shake', {
                              distance: 10,
                              direction: 'up'
                          });
                          $('.name-of-feild')[0].innerHTML +=
                              '<span style="color:#ffbaba"> Item Already exists!</span>'
                          $('#name-of-feild').css('border', '1px solid #ffbaba')
                          $('#name-of-feild').css('background', '#ffdede80')
                      }
                    } else {
                      $('#exampleModal').effect('shake', {
                              distance: 10,
                              direction: 'up'
                          });
                          $('.name-of-feild')[0].innerHTML +=
                              '<span style="color:#ffbaba"> Feild Name cannot be empty!</span>'
                          $('#name-of-feild').css('border', '1px solid #ffbaba')
                          $('#name-of-feild').css('background', '#ffdede80')
                    }
                })
                $('#create-record-button').click(function (e) {
                    $('#error-span').text('')
                    e.preventDefault();
                    name = $('#name').val();
                    brand = $('#brand').val();
                    color = rgb2hex($('.pcr-button')[0].style.color);
                    sku = $('#sku').val();
                    category = $('#category').val();
                    Object.keys($('.custom-feild-input input')).forEach(function (key) {
                        if (!isNaN(key)) {
                            attributes.push([
                              `${customInputs[key]}, ${$('.custom-feild-input input')[key].value}`
                            ]);
                        }
                    });

                    attributes = JSON.stringify(attributes);

                    $.post({
                        type: "POST",
                        url: '/item',
                        data: {
                            name,
                            brand,
                            color,
                            sku,
                            category,
                            attributes
                        },
                        success: function (data) {
                          console.log(data)
                            if (data === 'success') {
                                window.location.replace("http://localhost:8000");
                            }
                        },
                        error: function(err){
                          let errors = err.responseJSON.errors;
                          if(errors.hasOwnProperty('name')){
                            $('#name').css('border', '1px solid #ffbaba')
                            $('#error-span').append(errors['name']+'<br/>')
                          }
                          if(errors.hasOwnProperty('brand')){
                            $('#brand').css('border', '1px solid #ffbaba')
                            $('#error-span').append(errors['brand']+'<br/>')
                          }
                          if(errors.hasOwnProperty('sku')){
                            $('#sku').css('border', '1px solid #ffbaba')
                            $('#error-span').append(errors['sku']+'<br/>')
                          }
                          if(errors.hasOwnProperty('quantity')){
                            $('#quantity').css('border', '1px solid #ffbaba')
                            $('#error-span').append(errors['quantity']+'<br/>')
                          }
                          if(errors.hasOwnProperty('category')){
                            $('#category').css('border', '1px solid #ffbaba')
                            $('#error-span').append(errors['category']+'<br/>')
                          }
                        }
                    })

                })
            })

        </script>
    </div>
</body>

</html>
