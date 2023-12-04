let table = new DataTable('#myTable');

$('.close-toast').click(function () {
    $('.toast-notification').removeClass('open')
})
// Category Form
$('#category-form').on('submit', function (e) {
    e.preventDefault();
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    let name = $('#name').val();
    let status = $('#status').val();
    if (name.trim().length == 0) {
        $('#error-msg').html('Please add a name');
        return false;
    }
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { name: name, status: status },
        url: '../save-category',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                $('#category-form')[0].reset();
                resetStateSelect();
            }
            else {
                $('#error-msg').html(response.msg);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
        }
    })
})
$('#update-category-form').on('submit', function (e) {
    e.preventDefault();
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    let name = $('#name').val();
    let id = $('#id').val();
    let status = $('#status').val();
    if (name.trim().length == 0) {
        $('#error-msg').html('Please add a name');
        return false;
    }
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { name: name, status: status, id: id },
        url: '../../update-category',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                resetStateSelect();
            }
            else {
                $('#error-msg').html(response.msg);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
        }
    })
})
$(document).on('click', '.category-status', function () {
    console.log('Working');
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    $(`.category-${id}`).removeClass('active')
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../change-category-status',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                $(`#${response.type}-status-${id}`).addClass('active')
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
            $('.data').removeClass('load')
        }
    })
})
$(document).on('click', '.delete-category', function () {
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.delete-modal').addClass('active')
    $('.backdrop').addClass('active')
    $('.success-toast-msg').html("")
    // Unbind previous click events to prevent multiple bindings
    $('#confirm-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
        processCategoryDelete(id);
    });
    $('#cancel-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
    });
})
function processCategoryDelete(id) {
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../delete-category',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                var table = $('#myTable').DataTable();
                var row = $(`#row-${id}`).get(0);
                table.row(row).remove().draw(false);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            $('.data').removeClass('load')
        }
    })
}
// Products Form
$('#product-form').on('submit', function (e) {
    e.preventDefault();
    $('#name-error').html('');
    $('#error-msg').html('');
    $('#quantity-error').html('');
    $('#quantity-error').html('');
    $('#buying_price-error').html('');
    $('#selling_price-error').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    let name = $('#name').val();
    let status = $('#status').val();
    let category = $('#category').val();
    let quantity = $('#quantity').val();
    let buying_price = $('#buying_price').val();
    let selling_price = $('#selling_price').val();
    let discount_type = $('#discount_type').val();
    let discount = $('#discount').val();
    let fileInput = document.getElementById('files');
    let files = fileInput.files;
    if (name.trim().length == 0) {
        $('#name-error').html('Please add a name');
        return false;
    }
    if (quantity.trim().length == 0) {
        $('#quantity-error').html('Please add quantity');
        return false;
    }
    if (buying_price.trim().length == 0) {
        $('#buying_price-error').html('Please add buying price');
        return false;
    }
    if (selling_price.trim().length == 0) {
        $('#selling_price-error').html('Please add selling price');
        return false;
    }
    $('.data').addClass('load')
    let formData = new FormData();
    formData.append('name', name);
    formData.append('status', status);
    formData.append('discount', discount);
    formData.append('discount_type', discount_type);
    formData.append('buying_price', buying_price);
    formData.append('selling_price', selling_price);
    formData.append('quantity', quantity);
    formData.append('category', category);
    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: formData,
        url: '../save-product',
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                $('#product-form')[0].reset();
                $('.img-preview-container').html('')
                resetStateSelect();
            }
            else {
                $('#error-msg').html(response.msg);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            console.log(error);
            $('.data').removeClass('load')
        }
    })
})
$('#update-product-form').on('submit', function (e) {
    e.preventDefault();
    $('#name-error').html('');
    $('#quantity-error').html('');
    $('#quantity-error').html('');
    $('#buying_price-error').html('');
    $('#selling_price-error').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    let id = $('#id').val();
    let name = $('#name').val();
    let status = $('#status').val();
    let category = $('#category').val();
    let quantity = $('#quantity').val();
    let buying_price = $('#buying_price').val();
    let selling_price = $('#selling_price').val();
    let discount_type = $('#discount_type').val();
    let discount = $('#discount').val();
    let fileInput = document.getElementById('files');
    let files = fileInput.files;
    if (name.trim().length == 0) {
        $('#name-error').html('Please add a name');
        return false;
    }
    if (quantity.trim().length == 0) {
        $('#quantity-error').html('Please add quantity');
        return false;
    }
    if (buying_price.trim().length == 0) {
        $('#buying_price-error').html('Please add buying price');
        return false;
    }
    if (selling_price.trim().length == 0) {
        $('#selling_price-error').html('Please add selling price');
        return false;
    }
    $('.data').addClass('load')
    let formData = new FormData();
    formData.append('id', id);
    formData.append('name', name);
    formData.append('status', status);
    formData.append('discount', discount);
    formData.append('discount_type', discount_type);
    formData.append('buying_price', buying_price);
    formData.append('selling_price', selling_price);
    formData.append('quantity', quantity);
    formData.append('category', category);
    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: formData,
        url: '../../update-product',
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                resetStateSelect();
            }
            else {
                $('#error-msg').html(response.msg);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            console.log(error);
            $('.data').removeClass('load')
        }
    })
})
$(document).on('click', '.product-status', function () {
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    $(`.product-${id}`).removeClass('active')
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../change-product-status',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                $(`#${response.type}-status-${id}`).addClass('active')
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
            $('.data').removeClass('load')
        }
    })
})
$(document).on('click', '.delete-product', function () {
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.delete-modal').addClass('active')
    $('.backdrop').addClass('active')
    $('.success-toast-msg').html("")
    // Unbind previous click events to prevent multiple bindings
    $('#confirm-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
        processProductDelete(id);
    });
    $('#cancel-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
    });
})
// Delete Modal
function processCategoryDelete(id) {
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../delete-category',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                var table = $('#myTable').DataTable();
                var row = $(`#row-${id}`).get(0);
                table.row(row).remove().draw(false);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            $('.data').removeClass('load')
        }
    })
}
function processProductDelete(id) {
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../delete-product',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                var table = $('#myTable').DataTable();
                var row = $(`#row-${id}`).get(0);
                table.row(row).remove().draw(false);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
            $('.data').removeClass('load')
        }
    })
}
// Edit Category
$(document).on('click', '.edit-category', function () {
    let code = $(this).attr('data-code');
    let link = `edit/${code}`
    window.open(link)
})
// Edit Product
$(document).on('click', '.edit-product', function () {
    let code = $(this).attr('data-code');
    let link = `edit/${code}`
    window.open(link)
})

// Supplier Form
$('#supplier-form').on('submit', function (e) {
    e.preventDefault();
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    let name = $('#name').val();
    let email = $('#email').val();
    let mobile = $('#mobile').val();
    let state = $('#state').val();
    let city = $('#city').val();
    let status = $('#status').val();
    if (name.trim().length == 0) {
        $('#error-msg').html('Please add a name');
        return false;
    }
    if (email.trim().length == 0) {
        $('#error-msg').html('Please add email');
        return false;
    }
    if (mobile.trim().length == 0) {
        $('#error-msg').html('Please add mobile number');
        return false;
    }
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { name: name, email: email, mobile: mobile, city: city, state: state, status: status },
        url: '../save-supplier',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                $('#supplier-form')[0].reset();
                resetStateSelect();
            }
            else {
                $('#error-msg').html(response.msg);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
        }
    })
})
$(document).on('click', '.supplier-status', function () {
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    $(`.supplier-${id}`).removeClass('active')
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../change-supplier-status',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                $(`#${response.type}-status-${id}`).addClass('active')
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
            $('.data').removeClass('load')
        }
    })
})
$(document).on('click', '.delete-supplier', function () {
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.delete-modal').addClass('active')
    $('.backdrop').addClass('active')
    $('.success-toast-msg').html("")
    // Unbind previous click events to prevent multiple bindings
    $('#confirm-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
        processSupplierDelete(id);
    });
    $('#cancel-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
    });
})
function processSupplierDelete(id) {
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../delete-supplier',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                var table = $('#myTable').DataTable();
                var row = $(`#row-${id}`).get(0);
                table.row(row).remove().draw(false);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            $('.data').removeClass('load')
        }
    })
}
$(document).on('click', '.edit-supplier', function () {
    let code = $(this).attr('data-code');
    let link = `edit/${code}`
    window.open(link)
})

$('#update-supplier-form').on('submit', function (e) {
    e.preventDefault();
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.success-toast-msg').html("")
    let name = $('#name').val();
    let email = $('#email').val();
    let mobile = $('#mobile').val();
    let city = $('#city').val();
    let state = $('#state').val();
    let id = $('#id').val();
    let status = $('#status').val();
    if (name.trim().length == 0) {
        $('#error-msg').html('Please add a name');
        return false;
    }
    if (email.trim().length == 0) {
        $('#error-msg').html('Please add email');
        return false;
    }
    if (mobile.trim().length == 0) {
        $('#error-msg').html('Please add mobile number');
        return false;
    }
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { name: name, email: email, mobile: mobile, city: city, state: state, status: status, id: id },
        url: '../../update-supplier',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                resetStateSelect();
            }
            else {
                $('#error-msg').html(response.msg);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            alert(error.message)
        }
    })
})



$(document).on('click', '.delete-purchase', function () {
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.delete-modal').addClass('active')
    $('.backdrop').addClass('active')
    $('.success-toast-msg').html("")
    $('#confirm-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
        processPurchaseDelete(id);
    });
    $('#cancel-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
    });
})

function processPurchaseDelete(id) {
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../delete-purchase',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                var table = $('#myTable').DataTable();
                var row = $(`#row-${id}`).get(0);
                table.row(row).remove().draw(false);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            $('.data').removeClass('load')
        }
    })
}

$(document).on('click', '.delete-sale', function () {
    let id = $(this).attr('data-id')
    $('#error-msg').html('');
    $('.toast-notification').removeClass('open')
    $('.delete-modal').addClass('active')
    $('.backdrop').addClass('active')
    $('.success-toast-msg').html("")
    $('#confirm-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
        processSaleDelete(id);
    });
    $('#cancel-delete').off('click').on('click', function () {
        $('.delete-modal').removeClass('active');
        $('.backdrop').removeClass('active');
    });
})

function processSaleDelete(id) {
    $('.data').addClass('load')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        cache: false,
        data: { id: id },
        url: '../delete-sale',
        success: function (response) {
            if (response.success == true) {
                $('.toast-notification.success').addClass('open')
                $('.success-toast-msg').html(response.msg)
                var table = $('#myTable').DataTable();
                var row = $(`#row-${id}`).get(0);
                table.row(row).remove().draw(false);
            }
            $('.data').removeClass('load')
        },
        error: function (error) {
            $('.data').removeClass('load')
        }
    })
}

$(document).on('click', '.edit-purchase', function () {
    let code = $(this).attr('data-code');
    let link = `edit/${code}`
    window.open(link)
})
$(document).on('click', '.edit-sale', function () {
    let code = $(this).attr('data-code');
    let link = `edit/${code}`
    window.open(link)
})