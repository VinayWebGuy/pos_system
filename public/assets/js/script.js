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

$('#add-row').click(function () {
    let data = getProducts();
    rowIndex++;
    let $products = "";
    console.log(data);

    for (let i = 0; i < data.length; i++) {
        $products += `<option value="${data[i]}">${data[i]}</option>`;
    }

    let html = `<tr>
        <td class="product-sr">${rowIndex}</td>
        <td>
            <select class="select">
                <option value="">Choose Product</option>
                ${$products}
            </select>
        </td>
        <td><input type="text"></td>
        <td><input type="text"></td>
        <td>
            <select>
                <option value="">Choose</option>
                <option value="percent">Percent</option>
                <option value="fixed">Fixed</option>
            </select>
        </td>
        <td><input type="text"></td>
        <td><i class="fa fa-times delete-row"></i></td>
    </tr>`;

    $('.products-body').append(html);

    // Reinitialize SlimSelect for the new select element with the .select class
    $('.products-body').find('tr:last-child .select').each(function () {
        new SlimSelect({
            select: this
        });
    });
});


function getProducts() {
    let products = $('#products').val();
    let data = products.split('|');
   return data
}
