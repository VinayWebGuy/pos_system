new SlimSelect({
    select: '#select'
})
document.addEventListener('DOMContentLoaded', function () {
    new SlimSelect({
        select: '.select'
    });
});

$('.nextBtn').click(function () {
    let next = $(this).attr('data-next');
    let res = validate(next)
    if (res) {
        $('.multistep-page').removeClass('active');
        $('.headingStep').removeClass('active');
        $(`.${next}`).addClass('active');
        $(`.${next}-heading`).addClass('active');
        $('.error').html('')
    }
})
$('.prevBtn').click(function () {
    let prev = $(this).attr('data-prev');
    $('.multistep-page').removeClass('active');
    $('.headingStep').removeClass('active');
    $(`.${prev}`).addClass('active');
    $(`.${prev}-heading`).addClass('active');
})

function validate(page) {
    let pass = false;
    if (page === "profile-details") {
        if ($('.bName').val() !== "" && $('.bEmail').val() !== "" && $('.bAddress').val() !== "") {
            pass = true;
        } else {
            $('.bName').next('span').html($('.bName').val() === "" ? 'Business name is required' : '');
            $('.bEmail').next('span').html($('.bEmail').val() === "" ? 'Email is required' : '');
            $('.bAddress').next('span').html($('.bAddress').val() === "" ? 'Address is required' : '');
        }
    }
    if (page === "account-details") {
        if ($('.fName').val() !== "" && $('.mNumber').val() !== "" && $('.city').val() !== "" && $('.state').val() !== "") {
            pass = true;
        } else {
            $('.fName').next('span').html($('.fName').val() === "" ? 'First name is required' : '');
            $('.mNumber').next('span').html($('.mNumber').val() === "" ? 'Mobile number is required' : '');
            $('.city').next('span').html($('.city').val() === "" ? 'City is required' : '');
            $('.state').next('span').html($('.state').val() === "" ? 'State is required' : '');
        }
    }
    return pass;
}

$('#toggleBar').click(function () {
    $('main').toggleClass('collapsed');
})
$('.choose-file').click(function () {
    $('input[type="file"]').click();
})
$('#files').on('change', function (event) {
    var input = event.target;
    var $previewContainer = $('.img-preview-container');
    $previewContainer.empty();
    if (input.files && input.files.length > 0) {
        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var img = $('<img>').attr('src', e.target.result);
                $previewContainer.append(img);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
});




$(document).ready(function () {
    function toggleSidebarClass() {
        if ($(window).width() >= 700) {
            $('main').removeClass('collapsed');
        } else {
            $('main').addClass('collapsed');
        }
    }
    $(window).resize(function () {
        toggleSidebarClass();
    });
});

$(document).ready(function () {
    $(document).on('click', '#ok-btn', function () {
        $('.notification-modal').removeClass('active')
        $('.backdrop').removeClass('active')
    })
});

let rowIndex = 1;

function addNewRow() {
    let data = getProducts();
    let code = getProductsCode();
    let $products = "";

    for (let i = 0; i < data.length; i++) {
        $products += `<option value="${code[i]}">${data[i]}</option>`;
    }

    let html = `<tr>
        <td class="product-sr">${rowIndex}</td>
        <td>
            <select class="row_product select choose-product" name="product">
                <option value="">Choose Product</option>
                ${$products}
            </select>
        </td>
        <td><input class="row_quantity" type="text" name="quantity"></td>
        <td><input class="row_cost" type="text" name="cost"></td>
        <td><input readonly class="row_total" type="text" name="total"></td>
        <td><i class="fa fa-times delete-row"></i></td>
    </tr>`;

    $('.products-body').append(html);
    updateSerialNumbers();

    $('.products-body').find('tr:last-child .select').each(function () {
        new SlimSelect({
            select: this
        });
    });

    updateSerialNumbers();
    getProductData();
    updateSummary();
}

$(document).keydown(function (e) {
    if (e.ctrlKey && e.key === 'i') {
        addNewRow();
    }
});

$('#add-row').click(function () {
    addNewRow();
});

$(document).ready(function () {
    $(document).on('click', '.delete-row', function () {
        $(this).closest('tr').remove();
        updateSerialNumbers();
        updateSummary();
    });

    updateSummary();
    getProductData();
    calculateRowTotal();
});

function updateSerialNumbers() {
    $('.products-body tr').each(function (index) {
        $(this).find('.product-sr').text(index + 1);
    });
}

function getProducts() {
    let products = $('#products').val();
    let data = products.split('|');
    return data;
}

function getProductsCode() {
    let productsCode = $('#products_code').val();
    let data = productsCode.split('|');
    return data;
}

function getProductData() {
    $('.row_product').change(function () {
        $('.data').addClass('load')
        let $currentRow = $(this).closest('tr');
        let code = $(this).val();
        
        $.ajax({
            type: 'GET',
            cache: false,
            data: { code: code },
            url: '../../get-product-from-code',
            success: function (response) {
                $currentRow.find('.row_cost').val(response || 0);
                
                // Hide the "Choose Product" option after an option is selected
                $currentRow.find('.row_product option[value=""]').hide();
                $currentRow.find('.row_quantity').trigger('input');
                $('.data').removeClass('load')
            }
        });
    });
}



function calculateRowTotal() {
    $('.products-body').on('input', '.row_quantity, .row_cost', function () {
        let $currentRow = $(this).closest('tr');
        let cost = parseFloat($currentRow.find('.row_cost').val()) || 0;
        let quantity = parseFloat($currentRow.find('.row_quantity').val()) || 0;
        let total = cost * quantity;

        $currentRow.find('.row_total').val(total.toFixed(2));

        updateSummary();
    });
}

function updateSummary() {
    let totalProducts = $('.products-body').find('tr').length;
    let totalQuantity = 0;
    let totalAmount = 0;

    $('.products-body').find('tr').each(function () {
        let $row = $(this);
        let quantity = parseFloat($row.find('.row_quantity').val()) || 0;
        let amount = parseFloat($row.find('.row_total').val()) || 0;

        totalQuantity += quantity;
        totalAmount += amount;
    });

    $('#total-products').text(totalProducts);
    $('#total-quantity').text(totalQuantity.toFixed(2));
    $('#total-amount').text(totalAmount.toFixed(2));
    calculateRowTotal();
}
