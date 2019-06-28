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
        if (feildName) {
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
            error: function (err) {
                let errors = err.responseJSON.errors;
                if (errors.hasOwnProperty('name')) {
                    $('#name').css('border', '1px solid #ffbaba')
                    $('#error-span').append(errors['name'] + '<br/>')
                }
                if (errors.hasOwnProperty('brand')) {
                    $('#brand').css('border', '1px solid #ffbaba')
                    $('#error-span').append(errors['brand'] + '<br/>')
                }
                if (errors.hasOwnProperty('sku')) {
                    $('#sku').css('border', '1px solid #ffbaba')
                    $('#error-span').append(errors['sku'] + '<br/>')
                }
                if (errors.hasOwnProperty('quantity')) {
                    $('#quantity').css('border', '1px solid #ffbaba')
                    $('#error-span').append(errors['quantity'] + '<br/>')
                }
                if (errors.hasOwnProperty('category')) {
                    $('#category').css('border', '1px solid #ffbaba')
                    $('#error-span').append(errors['category'] + '<br/>')
                }
            }
        })

    })
})
