let slim1 = new SlimSelect({
    select: '#select',
  settings: {
    hideSelected: true,
  }
})
document.addEventListener('DOMContentLoaded', function () {
    let slim2 = new SlimSelect({
        select: '.select',
  settings: {
    hideSelected: true,
  }
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
        if ($(window).width() >= 1000) {
            $('main').removeClass('collapsed');
        } else {
            $('main').addClass('collapsed');
        }
    }
    $(window).resize(function () {
        toggleSidebarClass();
    });
    toggleSidebarClass();
});

$(document).ready(function () {
    $(document).on('click', '#ok-btn', function () {
        $('.notification-modal').removeClass('active')
        $('.backdrop').removeClass('active')
    })
});

$('.view-purchase').click(function () {
    let uid = $(this).attr('data-id');
    window.open('../purchase/view/'+uid)
})
$('.view-sale').click(function () {
    let uid = $(this).attr('data-id');
    window.open('../sale/view/'+uid)
})

