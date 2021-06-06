/*=============================
アコーディオンコンテンツ
=============================*/
$(function () {
    /* メニューのアコーディオン */
    $('.acodion_on').on('click', function () {
        $(this).toggleClass('is-active');
        if ($('.gnavi-side-on').hasClass('is-active') == true) {
            $('.is-active').next('.gnavi-side-content').animate({
                width: 'toggle'
            }, 'fast')
            $('.gnavi-side-on').removeClass('is-active');
            $('.contract_work').removeClass('is-active');
        }
        $(this).next('.acodion_content').slideToggle();
        var acodionMessage = $(this).html();
        if (acodionMessage.match(/開く/)) {
            var str = acodionMessage.replace(/開く/, '閉じる');
            $(this).html(str);
        } else if (acodionMessage.match(/閉じる/)) {
            var str = acodionMessage.replace(/閉じる/, '開く');
            $(this).html(str);
        }
    });

    /* メニューのアコーディオン（中） */
    $('.gnavi-side-on').on('click', function () {
        if ($(this).hasClass('is-active') == false) {
            $('.is-active').next('.gnavi-side-content').animate({
                width: 'toggle'
            }, 'fast')
            $('.gnavi-side-on').removeClass('is-active');
            $('.contract_work').removeClass('is-active');
        }
        $(this).toggleClass('is-active');
        $(this).parent('li').toggleClass('is-active')
        $(this).next('.gnavi-side-content').animate({
            width: 'toggle'
        }, 'fast')
    });
});

/*メニュー以外クリックでメニューを閉じる */
$(function () {
    $('nav').click(function (e) {
        e.stopPropagation()
    });
    $(document).click(function (e) {
        if ($('.aside-inner-menu').hasClass('is-active') == true) {
            $('.aside-inner-menu').toggleClass('is-active');
            $('.aside-inner-menu').next('.acodion_content').slideToggle();
        }
    });
});


/*=============================
フォーカス動作
=============================*/

$(function () {
    /*フォーカスclickでフォーカス外す
    IEのチェックボックスとラジオボタンのみフォーカスを外してまた付ける*/
    $('a,.type-select,.tip-icn,.tip-txt-close,img,button,.Items,.table-check,.table-radio,.gnavi-side-content,.acodion_bar,.acodion_btn,.pager-link,.type-reflect,.result-squeeze input,.fixed-totop').on('click', function () {
        var clickLink = $(this).attr('href');
        var targetItem = $(this).attr('class');
        var currentFocus = document.activeElement;
        var userAgent = window.navigator.userAgent.toLowerCase();
        if (clickLink == undefined || clickLink == '#') {
            $(document.activeElement).blur();
        }
        if (userAgent.indexOf('edge') != -1 || userAgent.indexOf('trident/7') != -1 && event.keyCode === 13) {
            if (targetItem == 'type-select') {
                setTimeout(function () {
                    $('.main-modal-inner').focus();
                }, 0);
            } else {
                setTimeout(function () {
                    $(currentFocus).focus();
                }, 0);
            }
        }
    });
});

/*フォーカス時にEnterでclickイベント発火*/
$(function () {
    $('a,.type-select,.tip-icn,.tip-txt-close,img,button,.Items,.table-check,.table-radio,.gnavi-side-content,.acodion_bar,.acodion_btn,.pager-link,.type-reflect,.result-squeeze input,.fixed-totop').on('keydown', function (e) {
        if (e.keyCode === 13) {
            $(document.activeElement).trigger('click');
        }
    });
});

/*=============================
モーダルコンテンツ
=============================*/

$(function () {
    /* tip */
    $('.table-tip-txt').children('.tip-txt-close').on('click', function () {
        $('.table-tip-txt').addClass('sis-active');
    });

    $('.table-tip').on('click', function () {
        if ($(this).children('.table-tip-txt').hasClass('is-active')) {
            $(this).children('.table-tip-txt').removeClass('is-active');
        } else {
            $(this).children('.table-tip-txt').addClass('is-active');
        }
    });

    var ModalOpen = function (modalClass) {
        $(modalClass).fadeIn();
        setTimeout(function () {
            $('.main-modal-inner').focus();
        }, 0);
        $('body').addClass('no-scroll');
    }

    /* モーダル */
    $('.type-select').on('click', function () {
        var modalNumber = $(this).attr('class').match(/[0-9]+/);
        var modalType = '.modal-type-' + modalNumber[0];
        ModalOpen(modalType);
    });
    $('.main-modal-bg').on('click', function () {
        $('.main-modal').fadeOut();
        setTimeout(function () {
            $('body').removeClass('no-scroll')
        }, 100);
    });
    $('.main-modal-close').on('click', function () {
        $('.main-modal').fadeOut();
        setTimeout(function () {
            $('body').removeClass('no-scroll')
        }, 100);
    });
    $('.modal-footer').children('.button-orange').on('click', function () {
        $('.main-modal').fadeOut();
        setTimeout(function () {
            $('body').removeClass('no-scroll')
        }, 100);
    });

    $(window).resize(function () {
        var windowSize = {
            width: $(window).width(),
            height: $(window).height()
        }
        $('.main-modal-bg').css(windowSize);
    });
});

/*モーダル選択画面*/
var MoadleSelected = function (selectClass, selectContent, nonselectClass, nonselectContent) {
    $(selectClass).addClass('selected');
    $(selectContent).removeClass('is-close');
    $(nonselectClass).removeClass('selected');
    $(nonselectContent).addClass('is-close')
};

$(function () {
    $('.select-state').children('label').on('click', function () {
        MoadleSelected('.select-state', '.select-content-state', '.select-city', '.select-content-city')
    });
    $('.select-city').children('label').on('click', function () {
        MoadleSelected('.select-city', '.select-content-city', '.select-state', '.select-content-state');
    });
});

/*=============================
ラジオボタン・チェックボックス動作
=============================*/

$(function () {
    /* 業者種別のラジオボタン・チェックボックスの選択処理 */
    $('.radio-downner').find('.table-radio').on('click', function () {
        $('.radio-upper').find('input[type=checkbox]').prop('checked', false);
        $('#hojin-number').attr('disabled', true);
        $('#hojin-number').attr('placeholder', '');
        $('#hojin-number').val('');
    });
    $('.radio-upper').find('.table-radio').on('click', function () {
        $('#hojin-number').attr('disabled', false);
        $('#hojin-number').attr('placeholder', 'XXXXXXXXXXXXX')
        $('.radio-upper').find('.table-check-all').on('click', function () {
            var items = $(this).parent().next('.table-checks').find('input');
            $(items).prop('checked', true);
        });
    });
    $('.radio-upper').find('.table-check').on('click', function () {
        $('#hojin-number').attr('disabled', false);
        $('#hojin-number').attr('placeholder', 'XXXXXXXXXXXXX')
        $('.radio-upper').find('input[type=radio]').prop('checked', true);
        $('.radio-downner').find('input[type=radio]').prop('checked', false);
    });

    /* チェックボックスの全選択・全解除 */
    $('.table-check-all').on('click', function () {
        var items = $(this).parent().next('.table-checks').find('input');
        $(items).prop('checked', true);
        $('.radio-upper').find('input[type=radio]').prop('checked', true);
        $('.radio-downner').find('input[type=radio]').prop('checked', false);
        $('#hojin-number').attr('disabled', false);
        $('#hojin-number').attr('placeholder', 'XXXXXXXXXXXXX')
    });
    $('.table-check-remove').on('click', function () {
        var items = $(this).parent().next('.table-checks').find('input');
        $(items).prop('checked', false);
    });

    /* 企業規模のチェックボックスの選択処理 */
    $('.check-upper').on('click', function () {
        $(this).next('.check-downner').find('input').prop('checked', false);
    })
    $('.check-downner').on('click', function () {
        $(this).prev('.check-upper').find('input').prop('checked', false);
    })
});


/*=============================
スクロール動作
=============================*/

$(function () {
    /* 滑らかなスクロール */
    $('a[href^=#]').click(function () {
        var speed = 500;
        var href = $(this).attr('href');
        var target = $(href == '#' || href == '' ? 'html' : href);
        var position = target.offset().top;
        $('html, body').animate({
            scrollTop: position
        }, speed, 'swing');
        return false;
    });

    /* スクロール量に応じてボタン表示 */
    var navBox = $('.fixed-totop');
    navBox.hide();
    var targetPos = 50;
    $(window).scroll(function () {
        var ScrollPos = $(window).scrollTop();
        if (ScrollPos > targetPos) {
            navBox.fadeIn();
        } else {
            navBox.fadeOut();
        }
    });
});

/*=============================
テキストボックス入力制御
=============================*/
/* 入力制御 */
$(document).on('focus', 'input textarea.input-error', function () {
    $(this).parent().find('.message-error.input-error').css('display', 'none');
    $(this).removeClass('input-error');
});

/*=============================
on/off動作
=============================*/

/*「次へ」ボタンの活性非活性 */

//活性化、非活性するための関数
var ActivationChange = function (orizinClass, addClass, tabindexNumber, removeClass) {
    $(orizinClass).addClass(addClass);
    $(orizinClass).attr('tabindex', tabindexNumber);
    $(orizinClass).removeClass(removeClass);
};

//orizinClass = 対象となるクラス( 追加ボタンに対して処理を行いたい場合は'.add-btn')
//addClass = 追加するクラス（ オレンジボタンに活性化する場合 'button-orange'、非活性にしたい場合は'button-gray'）
//除去クラスと対になる
//tabindexNumber = 対象の要素のtabindex(活性化する場合はその要素の本来のtabindex、非活性にする場合はフォーカスがあたらない様-1)
//removeClass = 除去するクラス（ オレンジボタンに活性化する場合 'button-gray'、非活性にしたい場合は'button-orange'）
//追加するクラスと対になる


$(function () {
    $('.required').on('change', function () {
        //活性化、非活性化するための条件を記載
        var flag1 = $('#license-number').val();
        var flag2 = $('.license-type').find('input[type=radio]:checked').size();
        var flag3 = $('.target-license-table').find('input[type=checkbox]:checked').size();
        if (flag1.length > 0 && flag2 > 0) {
            ActivationChange('.add-btn', 'button-white', '1140', 'button-gray');
        } else {
            ActivationChange('.add-btn', 'button-gray', '-1', 'button-white');
        }
        if (flag3 > 0) {
            ActivationChange('#next-btn', 'button-orange', '1230', 'button-gray');
        } else {
            ActivationChange('#next-btn', 'button-gray', '-1', 'button-orange');
        }
        //上記で決めた条件と処理内容を記載。374～の関数を使用
    });
});

/*画像の切り替え */
$(function () {
    $('.over').hover(function () {
        $(this).attr('src', $(this).attr('src').replace('_off', '_on'));
    }, function () {
        if (!$(this).hasClass('currentPage')) {
            $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
        }
    });
    $('.over').click(function () {
        $(this).attr('src', $(this).attr('src').replace('_on', '_off'));
    });
});


/*=============================
onload時の動作
=============================*/

$(document).ready(function () {
    var pageTitle = $('h2').html();
    if (pageTitle) {
        if (pageTitle.match(/src=/)) {
            $('.aside-inner-arrow').removeClass('text-link');
            $('.aside-inner-arrow').text('');
            $('.aside-inner-arrow').attr('tabindex', '-1');
        } else {
            var pageBreadcrumbs = pageTitle.replace(/<.*$/, '');
            $('#now-location').text(pageBreadcrumbs);
        }
    }
    $('.torikesi-end').attr('tabindex', '-1');
    $('.button-gray').attr('tabindex', '-1');
});
