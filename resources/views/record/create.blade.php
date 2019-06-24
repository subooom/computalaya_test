<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3">
        <a class="btn btn-info" href="/">Go Back</a>
        <h2 class="mt-2">Add a record</h2>
        <form id="ajax-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="nameHelp"
                    placeholder="Enter name of item">
            </div>
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand" aria-describedby="brandHelp"
                    placeholder="Enter brand of item">
            </div>
            <div class="row">
                <div class="form-group col-1 col-md-1 col-lg-1">
                    <label for="color">Color</label>
                    <input type="color" class="form-control color-picker" id="color" aria-describedby="colorHelp"
                        placeholder="Enter color of item">
                </div>
                <div class="form-group col-5 col-md-5 col-lg-5">
                    <label for="sku">SKU Code</label>
                    <input type="text" class="form-control" id="sku" aria-describedby="skuHelp"
                        placeholder="Enter SKU Code of item">
                </div>
                <div class="form-group col-6 col-md-6 col-lg-6">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" aria-describedby="quantityHelp"
                        placeholder="Enter quantity of item">
                </div>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </form>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add a Custom Feild
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a Custom Feild</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="name-of-feild">Name Of Feild</label>
                          <input type="text" class="form-control" id="name-of-feild" placeholder="RAM, Processor, Volume">
                        </div>
                        <div class="form-group">
                          <label for="datatype">Datatype</label>
                          <select class="form-control" id="datatype">
                            <option value="text">Text</option>
                            <option value="number">Number</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="add-feild-button">Add Feild</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js"></script>

        <script>

            $(document).ready(function () {
                $('#add-feild-button').click(function(){
                  // Close the modal first
                  $('#exampleModal').modal('toggle');

                  // Get value of the input feilds
                  let feildName = $('#name-of-feild').val();
                  let datatype = $('#datatype').val();

                  // Create a template
                  let template = `
                    <div class="form-group">
                      <label for="${feildName}">${feildName}</label>
                      <input type="${datatype}" class="form-control" id="${feildName}" aria-describedby="${feildName}Help" placeholder="Enter ${feildName} of item">
                    </div>
                  `;

                  // Append the template to the main form
                  $('#ajax-form').append(template);

                  // Empty the values of both inputs
                  $('#name-of-feild').val('');
                  $('#datatype').val('');
                })

                const pickr = Pickr.create({
                    el: '.color-picker',
                    theme: 'nano',
                    swatches: [
                        'rgba(244, 67, 54, 1)',
                        'rgba(233, 30, 99, 0.95)',
                        'rgba(156, 39, 176, 0.9)',
                        'rgba(103, 58, 183, 0.85)',
                        'rgba(63, 81, 181, 0.8)',
                        'rgba(33, 150, 243, 0.75)',
                        'rgba(3, 169, 244, 0.7)',
                        'rgba(0, 188, 212, 0.7)',
                        'rgba(0, 150, 136, 0.75)',
                        'rgba(76, 175, 80, 0.8)',
                        'rgba(139, 195, 74, 0.85)',
                        'rgba(205, 220, 57, 0.9)',
                        'rgba(255, 235, 59, 0.95)',
                        'rgba(255, 193, 7, 1)'
                    ],

                    components: {

                        // Main components
                        preview: true,
                        opacity: true,
                        hue: true,

                        // Input / output Options
                        interaction: {
                            hex: true,
                            input: true,
                            clear: true,
                            save: true
                        }
                    }
                });
            })

        </script>
    </div>
</body>

</html>
