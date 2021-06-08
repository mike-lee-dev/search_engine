/*=============================
Datepicker・カレンダー
=============================*/

/* カレンダーフォーム */
jQuery(function () {
    $('#start-date-from').datepicker({
        maxDate: '0d',
        onClose: function (dateText, inst) {
            $('#start-date-to').datepicker('option', 'minDate', dateText);
        }
    });
    $('#start-date-to').datepicker({
        maxDate: '0d',
    });
    $('#end-date-from').datepicker({
        minDate: '0d',
        onClose: function (dateText, inst) {
            $('#end-date-to').datepicker('option', 'minDate', dateText);
        }
    });
    $('#end-date-to').datepicker({
        minDate: '0d',
    });
    $.datepicker.setDefaults(
        $.datepicker.regional['jp'] = {
            closeText: '閉じる',
            prevText: '<前',
            nextText: '次>',
            currentText: '今日',
            monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
            dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
            dayNamesMin: ['日', '月', '火', '水', '木', '金', '土'],
            weekHeader: '週',
            dateFormat: 'yy/mm/dd',
            changeYear: true,
            changeMonth: true,
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: true,
            yearSuffix: '年',
            numberOfMonths: 3,
            showCurrentAtPos: 0,
            stepMonths: 3,
            maxDate: '9999/12/31',
        });
});