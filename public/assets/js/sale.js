
let rowIndexSale = 1;
function updateButtonStates() {
    if ($('.products-body tr').length === 0) {
        $('#reset-rows, #proceed-details').prop('disabled', true);
    } else {
        $('#reset-rows, #proceed-details').prop('disabled', false);
    }
}
function addNewRowSale() {
    let data = getProductsSale();
    let code = getProductsSaleCode();
    let $products = "";

    for (let i = 0; i < data.length; i++) {
        if (data[i] !== "") { // Avoid adding empty options
            $products += `<option value="${code[i]}">${data[i]}</option>`;
        }
    }

    let html = `<tr>
        <td class="product-sr">${rowIndexSale}</td>
        <td>
            <select class="row_product select choose-product" name="product[]">
                <option value="">Choose Product</option>
                ${$products}
            </select>
        </td>
        <td><input class="row_quantity" type="text" name="quantity[]"></td>
        <td><input class="row_cost" type="text" name="cost[]"></td>
        <td><select name="discount_type[]" class="row_discount_type"><option value="">Choose</option><option value="fixed">F</option><option value="percent">P</option></select></td>
        <td><input class="row_discount" type="text" name="discount[]"></td>
        
        <td><input readonly class="row_total" type="text" name="total[]"></td>
        <td><i class="fa fa-times delete-row"></i></td>
    </tr>`;

    $('.products-body').append(html);
    updateSerialNumbersSale();

    $('.products-body').find('tr:last-child .select').each(function () {
        new SlimSelect({
            select: this
        });
    });

    updateSerialNumbersSale();
    getProductDataSale();
    updateSummarySale();
    updateButtonStates();
}

$('.select-products.sale').keydown(function (e) {
    if (e.ctrlKey && e.key === 'i') {
        addNewRowSale();
    }
});

$('#add-row-sale').click(function () {
    addNewRowSale();
});

$(document).ready(function () {
    $(document).on('click', '.delete-row', function () {
        $(this).closest('tr').remove();
        updateSerialNumbersSale();
        updateSummarySale();
        updateButtonStates();
    });


    $('#reset-rows').click(function () {
        $('.backdrop').addClass('active');
        $('.delete-modal').addClass('active');
    });
    $('#cancel-delete').click(function () {
        $('.backdrop').removeClass('active');
        $('.delete-modal').removeClass('active');
    });
    $('#confirm-delete').click(function () {
        $('.products-body').empty(); 
        updateSummarySale(); 
        $('.backdrop').removeClass('active');
        $('.delete-modal').removeClass('active');
        updateButtonStates();
    });

    updateButtonStates();
    updateSummarySale();
    calculateRowTotalSale();
});

function updateSerialNumbersSale() {
    $('.products-body tr').each(function (index) {
        $(this).find('.product-sr').text(index + 1);
    });
}

function getProductsSale() {
    let products = $('#products').val();
    let data = products.split('|');
    return data;
}

function getProductsSaleCode() {
    let productsCode = $('#products_code').val();
    let data = productsCode.split('|');
    return data;
}

function getProductDataSale() {
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
                console.log(response.product.discount_type)
                $currentRow.find('.row_cost').val(response.product.selling_price || 0);
                $currentRow.find('.row_discount').val(response.product.discount || 0);
                
                let discountType = response.product.discount_type || '';
                $currentRow.find('.row_discount_type').val(discountType); 

                $currentRow.find('.row_product option[value=""]').hide();
                $currentRow.find('.row_quantity').trigger('input');
                $('.data').removeClass('load')
            }
        });
    });
}



function calculateRowTotalSale() {
    let timer;
    $('.products-body').on('change', '.row_quantity, .row_cost, .row_discount, .row_discount_type', function () {
        clearTimeout(timer);
        let $currentRow = $(this).closest('tr');
        $('.data').addClass('load');
        
        timer = setTimeout(() => {
            let cost = parseFloat($currentRow.find('.row_cost').val()) || 0;
            let quantity = parseFloat($currentRow.find('.row_quantity').val()) || 0;
            let discount = parseFloat($currentRow.find('.row_discount').val()) || 0;
            let total = 0;

            // Calculate total based on discount type
            let discountType = $currentRow.find('.row_discount_type').val();
            if (discountType === 'fixed') {
                total = (cost * quantity) - discount;
            } else if (discountType === 'percent') {
                let discountAmount = (cost * quantity * discount) / 100;
                total = (cost * quantity) - discountAmount;
            } else {
                total = cost * quantity;
            }

            $currentRow.find('.row_total').val(total.toFixed(2));
            updateSummarySale();
            $('.data').removeClass('load');
        }, 500); // Adjust the delay time (in milliseconds) as needed
    });
}

  
  

function updateSummarySale() {
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
    calculateRowTotalSale();
}


function validateInputs() {
    let isValid = true;

    let invoiceNo = $('#invoice_no').val();
    let supplier = $('#customer_name').val();
    let date = $('#date').val();

    if (invoiceNo === '' || supplier === '' || date === '') {
        if (invoiceNo === '') $('#invoice_no').css('border-color', 'red');
        if (supplier === '') $('#customer_name').css('border-color', 'red');
        if (date === '') $('#date').css('border-color', 'red');
        
        isValid = false;
        $('.sale-purchase-error').html("Please fill all the fields");
    } else {
        $('#invoice_no, #customer_name, #date').css('border-color', '');
        $('.sale-purchase-error').html("");
    }

    $('.products-body tr').each(function () {
        let $row = $(this);
        let product = $row.find('.row_product').val();
        let quantity = $row.find('.row_quantity').val();
        let cost = $row.find('.row_cost').val();

        if (product === '' || quantity === '' || cost === '') {
            isValid = false;
            if (product === '') $row.find('.row_product').css('border-color', 'red');
            if (quantity === '') $row.find('.row_quantity').css('border-color', 'red');
            if (cost === '') $row.find('.row_cost').css('border-color', 'red');
        } else {
            $row.find('.row_product, .row_quantity, .row_cost').css('border-color', '');
        }
    });

    if (!isValid) {
        $('.sale-purchase-error').html("Please fill all the fields.");
    }

    return isValid;
}

$('#add-sale-form').on('submit', function (e) {
    e.preventDefault();
    if (!validateInputs()) {
        return false;
    }
    let formData = $(this).serializeArray().filter(function(input) {
        return input.name !== "products" && input.name !== "products_code";
    });

    // Extract total products, total quantity, and total amount from summary
    let totalProducts = $('#total-products').text();
    let totalQuantity = $('#total-quantity').text();
    let totalAmount = $('#total-amount').text();

    // Add extracted values to formData
    formData.push({ name: 'totalProducts', value: totalProducts });
    formData.push({ name: 'totalQuantity', value: totalQuantity });
    formData.push({ name: 'totalAmount', value: totalAmount });

    $('.data').addClass('load');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '../save-sale',
        data: $.param(formData),
        success: function (response) {
            console.log(response);
            $('.data').removeClass('load');
        },
        error: function (error) {
            // Handle error
        }
    });
    
});
