"use strict";
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
    layoutsColors();
});

function layoutsColors() {
    if ($('.sidebar').is('[data-background-color]')) {
        $('html').addClass('sidebar-color');
    } else {
        $('html').removeClass('sidebar-color');
    }

    if ($('.sidebar').is('[data-image]')) {
        $('.sidebar').append("<div class='sidebar-background'></div>");
        $('.sidebar-background').css('background-image', 'url("' + $('.sidebar').attr('data-image') + '")');
    } else {
        $(this).remove('.sidebar-background');
        $('.sidebar-background').css('background-image', '');
    }
}

function legendClickCallback(event) {
    event = event || window.event;

    var target = event.target || event.srcElement;
    while (target.nodeName !== 'LI') {
        target = target.parentElement;
    }
    var parent = target.parentElement;
    var chartId = parseInt(parent.classList[0].split("-")[0], 10);
    var chart = Chart.instances[chartId];
    var index = Array.prototype.slice.call(parent.children).indexOf(target);

    chart.legend.options.onClick.call(chart, event, chart.legend.legendItems[index]);
    if (chart.isDatasetVisible(index)) {
        target.classList.remove('hidden');
    } else {
        target.classList.add('hidden');
    }
}

$(document).ready(function () {

    $('.btn-refresh-card').on('click', function () {
        var e = $(this).parents(".card");
        e.length && (e.addClass("is-loading"), setTimeout(function () {
            e.removeClass("is-loading")
        }, 3e3))
    })

    var scrollbarDashboard = $('.sidebar .scrollbar-inner');
    if (scrollbarDashboard.length > 0) {
        scrollbarDashboard.scrollbar();
    }

    var messagesScrollbar = $('.messages-scroll.scrollbar-outer');
    if (messagesScrollbar.length > 0) {
        messagesScrollbar.scrollbar();
    }

    var tasksScrollbar = $('.tasks-scroll.scrollbar-outer');
    if (tasksScrollbar.length > 0) {
        tasksScrollbar.scrollbar();
    }

    var quickScrollbar = $('.quick-scroll');
    if (quickScrollbar.length > 0) {
        quickScrollbar.scrollbar();
    }

    var messageNotifScrollbar = $('.message-notif-scroll');
    if (messageNotifScrollbar.length > 0) {
        messageNotifScrollbar.scrollbar();
    }

    var notifScrollbar = $('.notif-scroll');
    if (notifScrollbar.length > 0) {
        notifScrollbar.scrollbar();
    }
    var profileFormScrollbar = $('.profile-form-scroll');
    if (profileFormScrollbar.length > 0) {
        profileFormScrollbar.scrollbar();
    }

    $('.scroll-bar').draggable();

    var toggle_sidebar = false,
            toggle_quick_sidebar = false,
            toggle_topbar = false,
            minimize_sidebar = false,
            toggle_page_sidebar = false,
            nav_open = 0,
            quick_sidebar_open = 0,
            topbar_open = 0,
            mini_sidebar = 0,
            page_sidebar_open = 0;


    if (!toggle_sidebar) {
        var toggle = $('.sidenav-toggler');

        toggle.on('click', function () {
            if (nav_open == 1) {
                $('html').removeClass('nav_open');
                toggle.removeClass('toggled');
                nav_open = 0;
            } else {
                $('html').addClass('nav_open');
                toggle.addClass('toggled');
                nav_open = 1;
            }
        });
        toggle_sidebar = true;
    }

    if (!quick_sidebar_open) {
        var toggle = $('.quick-sidebar-toggler');

        toggle.on('click', function () {
            if (nav_open == 1) {
                $('html').removeClass('quick_sidebar_open');
                $('.quick-sidebar-overlay').remove();
                toggle.removeClass('toggled');
                quick_sidebar_open = 0;
            } else {
                $('html').addClass('quick_sidebar_open');
                toggle.addClass('toggled');
                $('<div class="quick-sidebar-overlay"></div>').insertAfter('.quick-sidebar');
                quick_sidebar_open = 1;
            }
        });

        $('.wrapper').mouseup(function (e)
        {
            var subject = $('.quick-sidebar');

            if (e.target.className != subject.attr('class') && !subject.has(e.target).length)
            {
                $('html').removeClass('quick_sidebar_open');
                $('.quick-sidebar-toggler').removeClass('toggled');
                $('.quick-sidebar-overlay').remove();
                quick_sidebar_open = 0;
            }
        });

        $(".close-quick-sidebar").on('click', function () {
            $('html').removeClass('quick_sidebar_open');
            $('.quick-sidebar-toggler').removeClass('toggled');
            $('.quick-sidebar-overlay').remove();
            quick_sidebar_open = 0;
        });

        quick_sidebar_open = true;
    }

    if (!toggle_topbar) {
        var topbar = $('.topbar-toggler');

        topbar.on('click', function () {
            if (topbar_open == 1) {
                $('html').removeClass('topbar_open');
                topbar.removeClass('toggled');
                topbar_open = 0;
            } else {
                $('html').addClass('topbar_open');
                topbar.addClass('toggled');
                topbar_open = 1;
            }
        });
        toggle_topbar = true;
    }
    if (!minimize_sidebar) {
        var minibutton = $('.btn-minimize');
        if ($('html').hasClass('sidebar_minimize')) {
            mini_sidebar = 1;
            minibutton.addClass('toggled');
            minibutton.html('<i class="la la-ellipsis-v"></i>');
        }

        minibutton.on('click', function () {
            if (mini_sidebar == 1) {
                $('html').removeClass('sidebar_minimize');
                minibutton.removeClass('toggled');
                minibutton.html('<i class="la la-bars"></i>');
                mini_sidebar = 0;
            } else {
                $('html').addClass('sidebar_minimize');
                minibutton.addClass('toggled');
                minibutton.html('<i class="la la-ellipsis-v"></i>');
                mini_sidebar = 1;
            }
            $(window).resize();
        });
        minimize_sidebar = true;
    }
    if (!toggle_page_sidebar) {
        var pageSidebarToggler = $('.page-sidebar-toggler');

        pageSidebarToggler.on('click', function () {
            if (page_sidebar_open == 1) {
                $('html').removeClass('pagesidebar_open');
                pageSidebarToggler.removeClass('toggled');
                page_sidebar_open = 0;
            } else {
                $('html').addClass('pagesidebar_open');
                pageSidebarToggler.addClass('toggled');
                page_sidebar_open = 1;
            }
        });

        var pageSidebarClose = $('.page-sidebar .back');
        pageSidebarClose.on('click', function () {
            $('html').removeClass('pagesidebar_open');
            pageSidebarToggler.removeClass('toggled');
            page_sidebar_open = 0;
        });

        toggle_page_sidebar = true;
    }

    $('.sidebar').hover(function () {
        if ($('html').hasClass('sidebar_minimize')) {
            $('html').addClass('sidebar_minimize_hover');
        }
    }, function () {
        if ($('html').hasClass('sidebar_minimize')) {
            $('html').removeClass('sidebar_minimize_hover');
        }
    });
    // addClass if nav-item click and has subnav
    $(".nav-item a").on('click', (function () {
        if ($(this).parent().find('.collapse').hasClass("show")) {
            $(this).parent().removeClass('submenu');
        } else {
            $(this).parent().addClass('submenu');
        }
    }));



    /*****************************
     loader
     ******************************************/

    $(document).ready(function () {
        setTimeout(function () {
            $("#loading").fadeOut("slow");
        });

    });

    setTimeout(function () {
        $('.alert').hide();
    }, 5000);

});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#form-image')
                    .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#form-image')
                    .attr('src', '#');
    }
}
function deleteImage(id) {
    if(confirm('Are you sure to delete?')){
        return true;
    }
    return false;
}
function generateURL() {
    var title = $('#title').val();
    var slug = title.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
    $('#slug').val(slug);
    $('#meta-title').val(title);
    return false;
}


