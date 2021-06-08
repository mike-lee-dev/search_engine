/*=============================
PPでのカスタマイズ
=============================*/
$(function () {
    /* ページネーションタグにclass属性追加 */
    var jumpFirst = $('ul.pager').find('li:first');
    var jumpLast = $('ul.pager').find('li:last')
    var prev = jumpFirst.next('li');
    var next = jumpLast.prev('li');
    jumpFirst.addClass('jamp').addClass('prev').addClass('pager-link');
    jumpLast.addClass('jamp').addClass('next').addClass('pager-link');
    prev.addClass('prev').addClass('pager-link');
    next.addClass('next').addClass('pager-link');
    
    // 全体メッセージ領域（単項目チェックエラー）でチェックエラーがないときは、枠を隠す
    if (!$('.input-error-list-message').size()) {
        $('.alert.message-error.input-error-list').css('display', 'none');
    } else {
    	$('.alert.message-error.input-error-list').css('display', 'block');
        var htm = "";
        $('.input-error-list-message').each(function(){
            var data = $(this).html();
            var arr = data.split('<br>');
            
            $.each(arr, function(index, value) {
                htm += "<div class='input-error-list-message'>" + value
                        + "</div>";
            });
        });


        $('.alert.message-error.input-error-list').html(htm);
        
        // 個別のメッセージがある場合は、ここの要素のエラーメッセージも出力されているはずなので、このif文内で差し替え。
        $('.message-error.input-error').each(function(){
            var htmlResult = $(this).html();
            var arr2 = htmlResult.split('<br>');
            var htm2 = "";
            $.each(arr2, function(index, value) {
                htm2 += "<div class='message-error input-error'>" + value + "</div>";
            });
            $(this).attr("class", "");
            $(this).html(htm2);
        });
    }
});

/* 電子署名クライアント エラーメッセージ */
var CERT_SIGN_ERR_DBOUBLE_PROC = "他の処理が実行中です。";
var CERT_SIGN_ERR_GET_VERSION_FAILED = "バージョン情報の取得に失敗しました。";
var CERT_SIGN_ERR_PIN_NOT = "PIN番号が未入力です。";
var CERT_SIGN_ERR_ENVIRONMENT = "環境エラーが発生しました。";
var CERT_SIGN_ERR_UNEXPECTED = "実行エラーが発生しました。";
var CERT_SIGN_ERR_GET_CERT_FAILED = "証明書取得に失敗しました。";
var CERT_SIGN_ERR_SIGN_FAILED = "署名に失敗しました。";
var CERT_SIGN_ERR_ICCARD_DEVICE = "ICカードに接続できませんでした。";
var CERT_SIGN_ERR_PIN_INCORRECT = "PIN番号が間違っています。";
var CERT_SIGN_ERR_ICCARD_LOCK = "ICカードがロックされています。";
var CERT_SIGN_ERR_READ_FILE_FAILED = "ファイルの読み込みに失敗しました。";
var CERT_SIGN_ERR_NOT_PKCS12 = "PKCS#12形式のファイルではありません。";
var CERT_SIGN_ERR_PIN_LOCK_OR_ENVIRONMENT = "\nPIN番号、ICカードロック、または利用環境をご確認ください。";

/* 電子署名クライアント エラーコードとエラーメッセージのマップ */
var certSignMsg = new Array();
certSignMsg['CLIENT-ERR-BHO-0001'] = CERT_SIGN_ERR_DBOUBLE_PROC;
certSignMsg['CLIENT-ERR-BHO-0002'] = CERT_SIGN_ERR_GET_VERSION_FAILED;
certSignMsg['CLIENT-ERR-BHO-0004'] = CERT_SIGN_ERR_PIN_NOT;
certSignMsg['CLIENT-ERR-BHO-0005'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0006'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0007'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0008'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0009'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-BHO-0010'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-BHO-0011'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0012'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0013'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0014'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0015'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-BHO-0016'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0001'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0002'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0003'] = CERT_SIGN_ERR_DBOUBLE_PROC;
certSignMsg['CLIENT-ERR-EXE-0004'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0005'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0006'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0007'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0008'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0009'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0010'] = CERT_SIGN_ERR_GET_VERSION_FAILED;
certSignMsg['CLIENT-ERR-EXE-0011'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0012'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0013'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0014'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0015'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0016'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0017'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0018'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0019'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0020'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0021'] = CERT_SIGN_ERR_UNEXPECTED;
certSignMsg['CLIENT-ERR-EXE-0022'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0023'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0024'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0025'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0026'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0027'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0028'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0029'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0030'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0031'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0032'] = CERT_SIGN_ERR_SIGN_FAILED + CERT_SIGN_ERR_PIN_LOCK_OR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0033'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0034'] = CERT_SIGN_ERR_ENVIRONMENT + CERT_SIGN_ERR_PIN_LOCK_OR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0035'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0036'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0037'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0038'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0039'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0040'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0041'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0042'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0043'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0044'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0045'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0046'] = CERT_SIGN_ERR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0047'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0048'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0049'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0050'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0051'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0052'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0053'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0054'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0055'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0056'] = CERT_SIGN_ERR_PIN_INCORRECT;
certSignMsg['CLIENT-ERR-EXE-0057'] = CERT_SIGN_ERR_ICCARD_LOCK;
certSignMsg['CLIENT-ERR-EXE-0058'] = CERT_SIGN_ERR_ICCARD_DEVICE;
certSignMsg['CLIENT-ERR-EXE-0059'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0060'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0061'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0062'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0063'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0064'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0065'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0066'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0067'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0068'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0069'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0070'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0071'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0072'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0073'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0074'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0075'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0076'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0077'] = CERT_SIGN_ERR_READ_FILE_FAILED;
certSignMsg['CLIENT-ERR-EXE-0078'] = CERT_SIGN_ERR_READ_FILE_FAILED;
certSignMsg['CLIENT-ERR-EXE-0079'] = CERT_SIGN_ERR_READ_FILE_FAILED;
certSignMsg['CLIENT-ERR-EXE-0080'] = CERT_SIGN_ERR_NOT_PKCS12;
certSignMsg['CLIENT-ERR-EXE-0081'] = CERT_SIGN_ERR_ENVIRONMENT + CERT_SIGN_ERR_PIN_LOCK_OR_ENVIRONMENT;
certSignMsg['CLIENT-ERR-EXE-0082'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0083'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0084'] = CERT_SIGN_ERR_GET_CERT_FAILED;
certSignMsg['CLIENT-ERR-EXE-0085'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0086'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0087'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0088'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0089'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0090'] = CERT_SIGN_ERR_SIGN_FAILED;
certSignMsg['CLIENT-ERR-EXE-0091'] = CERT_SIGN_ERR_SIGN_FAILED;

/**
 * 電子署名クライアントのエラーメッセージ取得
 * 
 * エラーコードに対応するエラーメッセージを返す。
 * 以下の2つはエラーメッセージを表示しないため空文字を返す。
 *  PIN入力キャンセル：CLIENT-ERR-BHO-0003
 *  ファイル選択キャンセル：CLIENT-ERR-BHO-0017
 *  
 * @param errCd エラーコード（電子署名クライアントからの戻り値）
 * @param errDetail エラー詳細（電子署名クライアントからの戻り値）
 * @return エラーコードに対応するエラーメッセージ
 */
function getCertSignMsg(errCd, errDetail) {
    if (errCd == 'CLIENT-ERR-BHO-0003' || errCd == 'CLIENT-ERR-BHO-0017') {
        // PIN入力キャンセル、ファイル選択キャンセルはエラー表示しない
        return "";
    }
    var msg = certSignMsg[errCd];
    if (!msg) {
        msg = "想定外のエラーです。";
    }
    return "[" + errCd + "]\n" + msg + "(" + errDetail + ")";
}