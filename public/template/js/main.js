
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });

    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }


    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0);
    }
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop());
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0);
        }
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop());
        }
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });

        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });

    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }
    });

    $('.js-show-search').on('click',function(){
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }
    });




    /*==================================================================
    [ Cart ]*/
    $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    });

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) {
            $(this).next().val(numProduct - 1);
            $(this).parent().parent().next().text(addCommas($(this).next().data('price')*(numProduct-1)))
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                data: {
                    product_id: $(this).next().data('product-id'),
                    size: $(this).next().data('size'),
                    type: 'decrease'
                },
                url: app_vars.base_url+'/carts/update',
            })
            calTotal()
        }
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
        $(this).parent().parent().next().text(addCommas($(this).prev().data('price')*(numProduct+1)))
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
                product_id: $(this).prev().data('product-id'),
                size: $(this).prev().data('size'),
                type: 'increase'
            },
            url: app_vars.base_url+'/carts/update',
        })
        calTotal()
    });
    calTotal()
    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });

    /*==================================================================
    [ Show modal1 ]*/
    $('.js-show-modal1').on('click',function(e){
        e.preventDefault();
        //
        console.log()
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: {
                product_id: $(this).data('product-id')
            },
            url: app_vars.base_url+'/get-product',
            success: function (results) {
                if(results.length > 0) {
                    var p = results[0];
                    var price = p.price_sale != null ? '<span style="text-decoration: line-through;">'+addCommas(p.price)+'đ</span> <span style="color:red;">'+addCommas(p.price_sale)+'đ</span> ' : '<span>'+addCommas(p.price)+'đ</span>';
                    $(".js-price").html(price)
                    $(".js-description").html(p.description)
                    var html = '';
                    $('.js-name-detail').text(p.name)
                    $.each(p.thumb.split("\r\n"), (i, item) => {
                        html += `<div class="item-slick3" data-thumb="${app_vars.base_url+item}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="${app_vars.base_url+item}" alt="IMG-PRODUCT">
                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${app_vars.base_url+item}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>`
                    })
                    $('.wrap-slick3').each(function(){
                        $('.slick3').slick('removeSlide', null, null, true);
                        $(this).find('.slick3').slick("slickAdd",
                            html
                        );
                    });

                    $('.js-modal1').addClass('show-modal1');
                }
            }
        });

    });

    $('.js-hide-modal1').on('click',function(){
        $('.js-modal1').removeClass('show-modal1');
    });




})(jQuery);
function quickView(product_id) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        data: {
            product_id: product_id
        },
        url: app_vars.base_url+'/get-product',
        success: function (results) {
            if(results.length > 0) {
                var p = results[0];
                var price = p.price_sale != null ? '<span style="text-decoration: line-through;">'+addCommas(p.price)+'đ</span> <span style="color:red;">'+addCommas(p.price_sale)+'đ</span> ' : '<span>'+addCommas(p.price)+'đ</span>';
                $(".js-price").html(price)
                $(".js-description").html(p.description)
                var html = '';
                $('.js-name-detail').text(p.name)
                $.each(p.thumb.split("\r\n"), (i, item) => {
                    html += `<div class="item-slick3" data-thumb="${app_vars.base_url+item}">
                            <div class="wrap-pic-w pos-relative">
                                <img src="${app_vars.base_url+item}" alt="IMG-PRODUCT">
                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="${app_vars.base_url+item}">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                        </div>`
                })
                var size ='';
                $.each(p.size.split(","), (i, item) => {
                    if (item == '0') {
                        size += `<option>Một Size</option>`
                    } else {
                        if (item == 'S' || item == 'M' || item == 'L') {
                            size += `<option>Size ${item}</option>`
                        }
                        else {
                            size += `<option>${item} mm</option>`
                        }
                    }
                })
                $(".js-size").html(size)
                $('.wrap-slick3').each(function(){
                    if ($(this).find('.slick3').hasClass('slick-initialized')) {
                        $(this).find('.slick3').slick('unslick');
                    }
                    $(this).find('.slick3').html(html)
                    $(this).find('.slick3').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        fade: true,
                        infinite: true,
                        autoplay: false,
                        autoplaySpeed: 6000,

                        arrows: true,
                        appendArrows: $(this).find('.wrap-slick3-arrows'),
                        prevArrow:'<button class="arrow-slick3 prev-slick3"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
                        nextArrow:'<button class="arrow-slick3 next-slick3"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',

                        dots: true,
                        appendDots: $(this).find('.wrap-slick3-dots'),
                        dotsClass:'slick3-dots',
                        customPaging: function(slick, index) {
                            var portrait = $(slick.$slides[index]).data('thumb');
                            return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
                        },
                    })
                    // $(this).find('.slick3').slick('slickAdd',
                    //     html
                    // );
                });
                $("input[name='product_id']").val(product_id)
                $('.js-modal1').addClass('show-modal1');
            }
        }
    });
}
function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function loadMore() {
    const page = parseInt($('#page').val());
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { page },
        url : app_vars.base_url+'/services/load-product',
        success : function (result) {
            $('#loadProducts').append(result.html);
            $('#page').val(page + 1);
            result.hasNext == false ? $('#button-loadMore').hide() : '';
        }

    })
}

function calTotal() {
    var total = 0;
    $.each($(".column-6"), (i, item) => {
        if(i == 0) return;
        var text = parseInt($(item).text().split(",").join(""));
        total += text
    })
    $(".price-total").text(addCommas(total)+'đ')
}
function calTotal2() {
    var total = 0;
    $.each($(".column-5"), (i, item) => {
        var text = parseInt($(item).text().split(",").join(""));
        total += text
    })
    console.log(total)
    $(".price-total2").text(addCommas(total)+'đ')
}

function calshipfee() {
    var shipfee = 30000;
    var count = 0;
    $.each($(".column-4"), (i, item) => {
        var text = parseInt($(item).text().split("x").join(""));
        count += text;
    })
    if (count >= 3) shipfee = 0;
    $(".ship-fee").text(addCommas(shipfee)+'đ')
    $(".total").text(addCommas(parseInt($(".price-total2").text().split(",").join(""))+parseInt($(".ship-fee").text().split(",").join("")))+'đ')
}

$('a[data-toggle="tab"]').on('shown.bs.tab', function(event) {
    let activeTab = $(event.target), // activated tab
        id = activeTab.attr('href'); // active tab href

       // set id in html5 localstorage for later usage
       localStorage.setItem('activeTab', id);

  });


