$(document).ready(function () {
    if ($(window).width() < 992) {
        $("#wrapper").removeClass("toggled");
    }
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
            $("body").css("overflow", "auto");
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
            $("body").css("overflow", "hidden");
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });

    /*active class*/
    var full_path = location.href;

    var last = full_path.substring(full_path.lastIndexOf("/") + 1, full_path.length);

    $('.nav li.active').removeClass('active');
    if (last == '') {
        $('.nav  li:nth-child(2)').addClass('active');
    }
    $(".nav a").each(function () {
        var $this = $(this);
        if ($this.attr("href") == last) {
            $(this).parent("li").addClass("active");
        }
    });
    setheight();
    if ($(window).width() <= 1600) {
        $(".house-table").addClass("table-responsive");
    }
});

function setheight() {
    height = $(window).height();
    $("#page-content-wrapper").css("min-height", height);
    if ($(window).height() >= 650) {
        if ($(window).width() < 992) {
            $(".tell-friend .bottombar").css("min-height", height - 201);
        }
        if ($(window).width() < 768) {
            $(".tell-friend .bottombar").css("min-height", height - 182);
        }
        if ($(window).width() < 601) {
            $(".tell-friend .bottombar").css("min-height", height - 123);
        }
    } else {
        $(".tell-friend .bottombar").css("min-height", "650px");
        $(".tell-friend").addClass("tell-friend-relative");
    }
}

function openLink(radio) {
    window.open(radio.value, '_self');
}

var count=1;
function changeval(){
    count++;
    var t=count;
    $("#inside-form")[0].reset();
    $(".upper-form")[0].reset();
    $("#outside-color").val("Colour" + t );
    $("#inside-color").val("Colour" + (t+1));
    $("#more-paint").prop("checked",false);
    $('html, body').animate({scrollTop : 0},600);
    return false;
}