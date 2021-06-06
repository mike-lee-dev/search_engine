$(function() {
    if ($("#procurementOrganNm").val() == "") {
        $("#procurementOrganNmtitle").hide();
        $("#procurementOrganNmText").hide();
        $("#procurementOrganNmText").prop("display", "none");    
    }else if ($("#procurementOrganNm").val() == "全ての機関" || $("#procurementOrganNm").val() == "All Facilities") {
        $("#procurementOrganNmtitle").hide();
    }
    if ($("#receiptAddress").val() == "") {
        $("#receiptAddresstitle").hide();
        $("#receiptAddressText").hide();
        $("#receiptAddressText").prop("display", "none");
    }else if ($("#receiptAddress").val() == "全ての所在地" || $("#receiptAddress").val() == "All Prefectures") {
        $("#receiptAddresstitle").hide();
    }
    
    $("input[name='searchConditionBeanEnglish.caseDivision']").next("label").css("display", "inline-block");
    
    $("input[name='searchConditionBean.govementProcurementOraganBean.procurementOrgNm']").next("label").css(
            "width", "120px");
    
    $("input[name='searchConditionBeanEnglish.itemClassifcationBeanEnglish.itemClassifcation']").next("label").css(
            "width", "80%");  
    
    var selectedvalue = $("input[name='searchConditionBean.procurementOrgan']:checked").val();
    if (selectedvalue) {
        if (selectedvalue == 01) {
            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');

            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');

        } else if (selectedvalue == 02) {
            $("#selectGovementProcurementOrg").attr('disabled', true);
            $("#selectGovementProcurementOrg").removeClass('button-white');
            $("#selectGovementProcurementOrg").addClass('button-gray');

            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');

            $(
                    "input[name^='searchConditionBean.govementProcurementOrgBean.area']")
                    .prop("checked", false);
            $(
                    "input[name^='searchConditionBean.govementProcurementOrgBean.prefecture']")
                    .prop("checked", false);
            $("#govementProcurementOrgText").val("");
            $("#govementProcurementOrgText").html("");
            $("input[name ='searchConditionBean.govementProcurementOrg']")
                    .prop("value", "");
        } else {
            $("#selectGovementProcurementOragan").attr('disabled', true);
            $("#selectGovementProcurementOragan").removeClass('button-white');
            $("#selectGovementProcurementOragan").addClass('button-gray');

            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');

            $(
                    "input[name='searchConditionBean.govementProcurementOraganBean.procurementOrgNm']")
                    .prop("checked", false);
            $(
                    "input[name^='searchConditionBean.govementProcurementOraganBean.area']")
                    .prop("checked", false);
            $(
                    "input[name^='searchConditionBean.govementProcurementOraganBean.prefecture']")
                    .prop("checked", false);
            $("#procurementOrganNmtitle").hide();
            $("#procurementOrganNmText").val("");
            $("#procurementOrganNmText").html("");
            $("#procurementOrganNmText").hide();
            $("#procurementOrganNmText").prop("display", "none");
            $("#receiptAddresstitle").hide();
            $("#receiptAddressText").val("");
            $("#receiptAddressText").html("");
            $("#receiptAddressText").hide();
            $("#receiptAddressText").prop("display", "none");
            $("input[name ='searchConditionBean.procurementOrganNm']").prop(
                    "value", "");
            $("input[name ='searchConditionBean.receiptAddress']").prop(
                    "value", "");
        }
    }
    
    var selectedvalue_en = $("input[name='searchConditionBeanEnglish.procurementOrgan']:checked").val();
    if (selectedvalue_en) {
        if (selectedvalue_en == 01) {
            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');

            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');

        } else if (selectedvalue_en == 02) {
            $("#selectGovementProcurementOrg").attr('disabled', true);
            $("#selectGovementProcurementOrg").removeClass('button-white');
            $("#selectGovementProcurementOrg").addClass('button-gray');

            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');

            $(
                    "input[name^='searchConditionBeanEnglish.govementProcurementOrgBeanEnglish.area']")
                    .prop("checked", false);
            $(
                    "input[name^='searchConditionBeanEnglish.govementProcurementOrgBeanEnglish.prefecture']")
                    .prop("checked", false);
            $("#govementProcurementOrgText").val("");
            $("#govementProcurementOrgText").html("");
            $(
                    "input[name ='searchConditionBeanEnglish.govementProcurementOrg']")
                    .prop("value", "");
        } else {
            $("#selectGovementProcurementOragan").attr('disabled', true);
            $("#selectGovementProcurementOragan").removeClass('button-white');
            $("#selectGovementProcurementOragan").addClass('button-gray');

            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');

            $(
                    "input[name='searchConditionBeanEnglish.govementProcurementOraganBeanEnglish.procurementOrgNm']")
                    .prop("checked", false);
            $(
                    "input[name^='searchConditionBeanEnglish.govementProcurementOraganBeanEnglish.area']")
                    .prop("checked", false);
            $(
                    "input[name^='searchConditionBeanEnglish.govementProcurementOraganBeanEnglish.prefecture']")
                    .prop("checked", false);
            $("#procurementOrganNmtitle").hide();
            $("#procurementOrganNmText").val("");
            $("#procurementOrganNmText").html("");
            $("#procurementOrganNmText").hide();
            $("#procurementOrganNmText").prop("display", "none");
            $("#receiptAddresstitle").hide();
            $("#receiptAddressText").val("");
            $("#receiptAddressText").html("");
            $("#receiptAddressText").hide();
            $("#receiptAddressText").prop("display", "none");
            $("input[name ='searchConditionBeanEnglish.procurementOrganNm']")
                    .prop("value", "");
            $("input[name ='searchConditionBeanEnglish.receiptAddress']").prop(
                    "value", "");
        }
    }

    $("#procurementClassificationSelected").on('click', function () {
        map = new Map();
        var text = "";
        var length = $("#td_procurement_classification").find(":checkbox:checked").length;
        $("#td_procurement_classification").find(":checkbox:checked").each(function(){           
            var id = $(this).prop("id");
            text = text + $(this).parent().find("label[for='" + id +"']").text() + ",";                    
          });

          if (length == 14) {
             $("#procurementCla").val("全ての調達種別");
             $("#procurementClaText").html("全ての調達種別");
          } else {
              text = text.substr(0, text.length - 1);
             $("#procurementCla").val(text);
             $("#procurementClaText").html(text);
          }
    });
    
    $("#procurementClassificationSelectedEnglish").on('click', function () {
        map = new Map();
        var text = "";
        var length = $("#td_procurement_classification").find(":checkbox:checked").length;
        $("#td_procurement_classification").find(":checkbox:checked").each(function(){           
            var id = $(this).prop("id");
            text = text + $(this).parent().find("label[for='" + id +"']").text() + ",";                    
          });

          if (length == 5) {
             $("#procurementCla").val("All Kind of procurements");
             $("#procurementClaText").html("All Kind of procurements");
          } else {
              text = text.substr(0, text.length - 1);
             $("#procurementCla").val(text);
             $("#procurementClaText").html(text);
          }
    });
    
    $("#govementProcurementOraganSelected").on('click', function () {
        map = new Map();
        var procurementClaText = "";
        var length = $("#td_govement_ProcurementOragan").find(":checkbox:checked").length;
        $("#td_govement_ProcurementOragan").find(":checkbox:checked").each(function(){           
            var id = $(this).prop("id");
            procurementClaText = procurementClaText + $(this).parent().find("label[for='" + id +"']").text() + ",";                    
          });

          if (length == 26) {
             $("#procurementOrganNm").val("全ての機関");
             $("#procurementOrganNmText").html("全ての機関");
             $("#procurementOrganNmText").show();
             $("#procurementOrganNmText").css("margin-left", "20px");
             $("#procurementOrganNmtitle").hide();
          } else {
              procurementClaText = procurementClaText.substr(0, procurementClaText.length - 1);
             $("#procurementOrganNm").val(procurementClaText);
             $("#procurementOrganNmText").html(procurementClaText);
             if( procurementClaText.length >0 ){
                 $("#procurementOrganNmtitle").show();
                 $("#procurementOrganNmText").show();
                 $("#procurementOrganNmText").css("margin-left", "0px");
                 $("#procurementOrganNmText").prop("display", "inline-block");
             }else{
                 $("#procurementOrganNmtitle").hide();
                 $("#procurementOrganNmText").hide();
             }             
          }
                
        var addressText = "";
        var length = $("#td_govementProcurementOragan_area").find(":checkbox:checked").length;
            $("#td_govementProcurementOragan_area").find(":checkbox:checked").each(function(index){
                if ($(this).val() == '1'
                    || $(this).val() == '2'
                    || $(this).val() == '3'
                    || $(this).val() == '4'
                    || $(this).val() == '5'
                    || $(this).val() == '6'
                    || $(this).val() == '7'
                    || $(this).val() == '8') {
                    return true;
                }
                if (index < length - 1) {
                    addressText = addressText + $(this).parent().find("label").text() + ",";                    
                } else {
                    addressText = addressText + $(this).parent().find("label").text();
                }
            });
            
            var area_select_length = $("#td_govementProcurementOragan_area").find('input[name=searchConditionBean\\.govementProcurementOraganBean\\.area]').parent().find(":checkbox:checked").length;
            if (area_select_length == 8) {
                $("#receiptAddress").val("全ての所在地");
                $("#receiptAddressText").html("全ての所在地");
                $("#receiptAddressText").show();
                $("#receiptAddressText").css("margin-left", "20px");
                $("#receiptAddresstitle").hide();                
            } else {
                $("#receiptAddress").val(addressText);
                $("#receiptAddressText").html(addressText);
                if( addressText.length >0 ){
                    $("#receiptAddresstitle").show();
                    $("#receiptAddressText").show();
                    $("#receiptAddressText").css("margin-left", "0px");
                    $("#receiptAddressText").prop("display", "inline-block");
                }else{
                    $("#receiptAddresstitle").hide();
                    $("#receiptAddressText").hide();
                }
            }
    });
    
    $("#govementProcurementOraganSelectedEnglish").on('click', function () {
        map = new Map();
        var procurementClaText = "";
        var length = $("#td_govement_ProcurementOragan").find(":checkbox:checked").length;
        $("#td_govement_ProcurementOragan").find(":checkbox:checked").each(function(){           
            var id = $(this).prop("id");
            procurementClaText = procurementClaText + $(this).parent().find("label[for='" + id +"']").text() + ",";                    
          });

          if (length == 26) {
             $("#procurementOrganNm").val("All Facilities");
             $("#procurementOrganNmText").html("All Facilities");
             $("#procurementOrganNmText").css("margin-left", "20px");
             $("#procurementOrganNmText").show();
             $("#procurementOrganNmtitle").hide();
          } else {
              procurementClaText = procurementClaText.substr(0, procurementClaText.length - 1);
             $("#procurementOrganNm").val(procurementClaText);
             $("#procurementOrganNmText").html(procurementClaText);
             if( procurementClaText.length >0 ){
                 $("#procurementOrganNmtitle").show();
                 $("#procurementOrganNmText").show();
                 $("#procurementOrganNmText").css("margin-left", "0px");
                 $("#procurementOrganNmText").prop("display", "inline-block");
             }else{
                 $("#procurementOrganNmtitle").hide();
                 $("#procurementOrganNmText").hide();
             }             
          }
                
        var addressText = "";
        var length = $("#td_govementProcurementOragan_area").find(":checkbox:checked").length;
            $("#td_govementProcurementOragan_area").find(":checkbox:checked").each(function(index){
                if ($(this).val() == '1'
                    || $(this).val() == '2'
                    || $(this).val() == '3'
                    || $(this).val() == '4'
                    || $(this).val() == '5'
                    || $(this).val() == '6'
                    || $(this).val() == '7'
                    || $(this).val() == '8') {
                    return true;
                }
                if (index < length - 1) {
                    addressText = addressText + $(this).parent().find("label").text() + ",";                    
                } else {
                    addressText = addressText + $(this).parent().find("label").text();
                }
            });
            
            var area_select_length = $("#td_govementProcurementOragan_area").find('input[name=searchConditionBeanEnglish\\.govementProcurementOraganBeanEnglish\\.area]').parent().find(":checkbox:checked").length;
            if (area_select_length == 8) {
                $("#receiptAddress").val("All Prefectures");
                $("#receiptAddressText").html("All Prefectures");
                $("#receiptAddressText").show();
                $("#receiptAddressText").css("margin-left", "20px");
                $("#receiptAddresstitle").hide();                
            } else {
                $("#receiptAddress").val(addressText);
                $("#receiptAddressText").html(addressText);
                if( addressText.length >0 ){
                    $("#receiptAddresstitle").show();
                    $("#receiptAddressText").show();
                    $("#receiptAddressText").css("margin-left", "0px");
                    $("#receiptAddressText").prop("display", "inline-block");
                }else{
                    $("#receiptAddresstitle").hide();
                    $("#receiptAddressText").hide();
                }
            }
    });
    
    $("#govementProcurementOrgSelected").on('click', function () {
        map = new Map();
        var text = "";

            var length = $("#td_govementProcurementOrg").find(":checkbox:checked").length;
            $("#td_govementProcurementOrg").find(":checkbox:checked").each(function(index){
                if ($(this).val() == '1'
                    || $(this).val() == '2'
                    || $(this).val() == '3'
                    || $(this).val() == '4'
                    || $(this).val() == '5'
                    || $(this).val() == '6'
                    || $(this).val() == '7'
                    || $(this).val() == '8') {
                    return true;
                }
                if (index < length - 1) {
                    text = text + $(this).parent().find("label").text() + ",";                    
                } else {
                    text = text + $(this).parent().find("label").text();
                }
            });
            
            var area_select_length = $("#td_govementProcurementOrg").find('input[name=searchConditionBean\\.govementProcurementOrgBean\\.area]').parent().find(":checkbox:checked").length;
            if (area_select_length == 8) {
                $("#govementProcurementOrg").val("全ての所在地");
                $("#govementProcurementOrgText").html("全ての所在地");
            } else {
                $("#govementProcurementOrg").val(text);
                $("#govementProcurementOrgText").html(text);
            }
    });
    
    $("#govementProcurementOrgSelectedEnglish").on('click', function () {
        map = new Map();
        var text = "";

            var length = $("#td_govementProcurementOrg").find(":checkbox:checked").length;
            $("#td_govementProcurementOrg").find(":checkbox:checked").each(function(index){
                if ($(this).val() == '1'
                    || $(this).val() == '2'
                    || $(this).val() == '3'
                    || $(this).val() == '4'
                    || $(this).val() == '5'
                    || $(this).val() == '6'
                    || $(this).val() == '7'
                    || $(this).val() == '8') {
                    return true;
                }
                if (index < length - 1) {
                    text = text + $(this).parent().find("label").text() + ",";                    
                } else {
                    text = text + $(this).parent().find("label").text();
                }
            });
            
            var area_select_length = $("#td_govementProcurementOrg").find('input[name=searchConditionBeanEnglish\\.govementProcurementOrgBeanEnglish\\.area]').parent().find(":checkbox:checked").length;
            if (area_select_length == 8) {
                $("#govementProcurementOrg").val("All Prefectures");
                $("#govementProcurementOrgText").html("All Prefectures");
            } else {
                $("#govementProcurementOrg").val(text);
                $("#govementProcurementOrgText").html(text);
            }
    });
    
    $("#itemClassifcationSelected").on('click', function () {
        map = new Map();
        var text = "";
        var length = $("#td_itemClassifcation").find(":checkbox:checked").length;
        $("#td_itemClassifcation").find(":checkbox:checked").each(function(){           
            var id = $(this).prop("id");
            text = text + $(this).parent().find("label[for='" + id +"']").text() + ",";                    
          });

          if (length == 96) {
             $("#procurementItemCla").val("全ての調達品目分類");
             $("#procurementItemClaText").html("全ての調達品目分類");
          } else {
              text = text.substr(0, text.length - 1);
             $("#procurementItemCla").val(text);
             $("#procurementItemClaText").html(text);
          }
    });
    
    $("#itemClassifcationSelectedEnglish").on('click', function () {
        map = new Map();
        var text = "";
        var length = $("#td_itemClassifcation").find(":checkbox:checked").length;
        $("#td_itemClassifcation").find(":checkbox:checked").each(function(){           
            var id = $(this).prop("id");
            text = text + $(this).parent().find("label[for='" + id +"']").text() + ",";                    
          });

          if (length == 96) {
             $("#procurementItemCla").val("All Products");
             $("#procurementItemClaText").html("All Products");
          } else {
              text = text.substr(0, text.length - 1);
             $("#procurementItemCla").val(text);
             $("#procurementItemClaText").html(text);
          }
    });
    
    /* メニューのアコーディオン（英語のため） */
    $('.acodion_on_english').on('click', function () {
        $(this).toggleClass('is-active');
        if ($('.gnavi-side-on').hasClass('is-active') == true) {
            $('.is-active').next('.gnavi-side-content').animate({
                width: 'toggle'
            }, 'fast')
            $('.gnavi-side-on').removeClass('is-active');
            $('.contract_work').removeClass('is-active');
        }
        $(this).next('.acodion_content').slideToggle();
        var message = $(this).html();
        if (message.match(/Open/)){
            var str = message.replace( /Open/, 'Close');
            $(this).html(str);
        }else if (message.match(/Close/)){
            var str = message.replace( /Close/, 'Open');
            $(this).html(str);
        }       
    });
    
    $("input[name='searchConditionBean.procurementOrgan']").change(function(){
        var selectedvalue = $("input[name='searchConditionBean.procurementOrgan']:checked").val();
        if (selectedvalue == 01) {
            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');
            
            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');
            
        }else if (selectedvalue == 02){
            $("#selectGovementProcurementOrg").attr('disabled', true);
            $("#selectGovementProcurementOrg").removeClass('button-white');
            $("#selectGovementProcurementOrg").addClass('button-gray');
            
            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');
            
            $("input[name^='searchConditionBean.govementProcurementOrgBean.area']").prop("checked", false);
            $("input[name^='searchConditionBean.govementProcurementOrgBean.prefecture']").prop("checked", false);
            $("#govementProcurementOrgText").val("");
            $("#govementProcurementOrgText").html("");
            $("input[name ='searchConditionBean.govementProcurementOrg']").prop("value", "");            
        }else {
            $("#selectGovementProcurementOragan").attr('disabled', true);
            $("#selectGovementProcurementOragan").removeClass('button-white');
            $("#selectGovementProcurementOragan").addClass('button-gray');
            
            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');
           
            $("input[name='searchConditionBean.govementProcurementOraganBean.procurementOrgNm']").prop("checked", false);
            $("input[name^='searchConditionBean.govementProcurementOraganBean.area']").prop("checked", false);
            $("input[name^='searchConditionBean.govementProcurementOraganBean.prefecture']").prop("checked", false);
            $("#procurementOrganNmtitle").hide();
            $("#procurementOrganNmText").val("");
            $("#procurementOrganNmText").html("");
            $("#procurementOrganNmText").hide();
            $("#procurementOrganNmText").prop("display", "none"); 
            $("#receiptAddresstitle").hide();
            $("#receiptAddressText").val("");
            $("#receiptAddressText").html("");
            $("#receiptAddressText").hide();
            $("#receiptAddressText").prop("display", "none");
            $("input[name ='searchConditionBean.procurementOrganNm']").prop("value", "");
            $("input[name ='searchConditionBean.receiptAddress']").prop("value", "");
        }
    });
    
    $("input[name='searchConditionBeanEnglish.procurementOrgan']").change(function(){
        var selectedvalue = $("input[name='searchConditionBeanEnglish.procurementOrgan']:checked").val();
        if (selectedvalue == 01) {
            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');
            
            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');
            
        }else if (selectedvalue == 02){
            $("#selectGovementProcurementOrg").attr('disabled', true);
            $("#selectGovementProcurementOrg").removeClass('button-white');
            $("#selectGovementProcurementOrg").addClass('button-gray');
            
            $("#selectGovementProcurementOragan").attr('disabled', false);
            $("#selectGovementProcurementOragan").removeClass('button-gray');
            $("#selectGovementProcurementOragan").addClass('button-white');
            
            $("input[name^='searchConditionBeanEnglish.govementProcurementOrgBeanEnglish.area']").prop("checked", false);
            $("input[name^='searchConditionBeanEnglish.govementProcurementOrgBeanEnglish.prefecture']").prop("checked", false);
            $("#govementProcurementOrgText").val("");
            $("#govementProcurementOrgText").html("");
            $("input[name ='searchConditionBeanEnglish.govementProcurementOrg']").prop("value", "");            
        }else {
            $("#selectGovementProcurementOragan").attr('disabled', true);
            $("#selectGovementProcurementOragan").removeClass('button-white');
            $("#selectGovementProcurementOragan").addClass('button-gray');
            
            $("#selectGovementProcurementOrg").attr('disabled', false);
            $("#selectGovementProcurementOrg").removeClass('button-gray');
            $("#selectGovementProcurementOrg").addClass('button-white');
           
            $("input[name='searchConditionBeanEnglish.govementProcurementOraganBeanEnglish.procurementOrgNm']").prop("checked", false);
            $("input[name^='searchConditionBeanEnglish.govementProcurementOraganBeanEnglish.area']").prop("checked", false);
            $("input[name^='searchConditionBeanEnglish.govementProcurementOraganBeanEnglish.prefecture']").prop("checked", false);
            $("#procurementOrganNmtitle").hide();
            $("#procurementOrganNmText").val("");
            $("#procurementOrganNmText").html("");
            $("#procurementOrganNmText").hide();
            $("#procurementOrganNmText").prop("display", "none"); 
            $("#receiptAddresstitle").hide();
            $("#receiptAddressText").val("");
            $("#receiptAddressText").html("");
            $("#receiptAddressText").hide();
            $("#receiptAddressText").prop("display", "none");
            $("input[name ='searchConditionBeanEnglish.procurementOrganNm']").prop("value", "");
            $("input[name ='searchConditionBeanEnglish.receiptAddress']").prop("value", "");
        }
    });

    var map = new Map();
    
    /* モーダル */
    $('.type-select').on('click', function () {
        
        var modalNumber = $(this).attr('class').match(/[0-9]+/);
        var modalType = '.modal-type-' + modalNumber[0];
        
        $(modalType).find(".modal-Items").each(function(){
            var name;
            var vals = new Array();
            var tempName = "";
            var size = $(this).find(":checkbox:checked").size();
            $(this).find(":checkbox:checked").each(function(index){
                name = $(this).attr("name");
                if (name != tempName && tempName != "") {
                    var flag = true;
                    map.forEach(function (value, key) {
                        if(key == tempName) {
                            vals.forEach(function (val) {
                                value.push(val);
                            });
                            flag = false;
                        }
                     });
                    
                    if(flag) {
                        map.set(tempName, vals);  
                    }  
                    vals = new Array();
                }
                vals.push($(this).val());
                tempName = name;
                if (size - 1 === index) {
                    var flag = true;
                    map.forEach(function (value, key) {
                        if(key == tempName) {
                            vals.forEach(function (val) {
                                value.push(val);
                            });
                            flag = false;
                        }
                     });
                     
                    if(flag) {
                        map.set(tempName, vals);  
                    }
                }
            })
        })
        
    });
    
    $('.main-modal-bg').on('click', function () {
        var modalNumber = $(this).parent().attr('class').match(/[0-9]+/);
        var modalType = '.modal-type-' + modalNumber[0];
        $(modalType).find('input[type=checkbox]').prop('checked', false);
        
        map.forEach(function (value, key) {
            $("input[name='" + key + "']").val(value);
         });
        
    });
    
    $('.main-modal-close').on('click', function () {
        var modalNumber = $(this).parent().parent().attr('class').match(/[0-9]+/);
        var modalType = '.modal-type-' + modalNumber[0];
        $(modalType).find('input[type=checkbox]').prop('checked', false);
        
        map.forEach(function (value, key) {
            $("input[name='" + key + "']").val(value);
         });
        
    });
    
});

function single_govementProcurementOragan_area_select(obj) {
    var target = "searchConditionBean\\.govementProcurementOraganBean\\.prefecture_"
            + $(obj).val();
    var items = $("#td_govementProcurementOragan_area").find(
            'input[name=' + target + ']');
    if ($(obj).parent().find("input").prop('checked')) {
        $(items).prop('checked', true);
    } else {
        $(items).prop('checked', false);
    }
}

function single_govementProcurementOragan_presures_select(obj) {
    var li = $(obj).parent().parent().parent().find('ul').find('li');
    var total_length = $(li).length;
    var checked_length = $(li).find(":checkbox:checked").length;
    var id = $(obj).attr('name').charAt($(obj).attr('name').length - 1);
    var target = "searchConditionBean\\.govementProcurementOraganBean\\.area"
            + id;
    var items = $("#td_govementProcurementOragan_area").find(
            'input[id=' + target + ']');
    if (checked_length < total_length) {
        $(items).prop('checked', false);
    } else {
        $(items).prop('checked', true);
    }
}

function single_area_select(obj) {
    var target = "searchConditionBean\\.govementProcurementOrgBean\\.prefecture_"
            + $(obj).val();
    var items = $("#td_govementProcurementOrg").find(
            'input[name=' + target + ']');
    if ($(obj).parent().find("input").prop('checked')) {
        $(items).prop('checked', true);
    } else {
        $(items).prop('checked', false);
    }
}

function single_presures_select(obj) {
    var li = $(obj).parent().parent().parent().find('ul').find('li');
    var total_length = $(li).length;
    var checked_length = $(li).find(":checkbox:checked").length;
    var id = $(obj).attr('name').charAt($(obj).attr('name').length - 1);
    var target = "searchConditionBean\\.govementProcurementOrgBean\\.area" + id;
    var items = $("#td_govementProcurementOrg")
            .find('input[id=' + target + ']');
    if (checked_length < total_length) {
        $(items).prop('checked', false);
    } else {
        $(items).prop('checked', true);
    }
}

function single_govementProcurementOragan_area_select_English(obj) {
    var target = "searchConditionBeanEnglish\\.govementProcurementOraganBeanEnglish\\.prefecture_"
            + $(obj).val();
    var items = $("#td_govementProcurementOragan_area").find(
            'input[name=' + target + ']');
    if ($(obj).parent().find("input").prop('checked')) {
        $(items).prop('checked', true);
    } else {
        $(items).prop('checked', false);
    }
}

function single_govementProcurementOragan_presures_select_English(obj) {
    var li = $(obj).parent().parent().parent().find('ul').find('li');
    var total_length = $(li).length;
    var checked_length = $(li).find(":checkbox:checked").length;
    var id = $(obj).attr('name').charAt($(obj).attr('name').length - 1);
    var target = "searchConditionBeanEnglish\\.govementProcurementOraganBeanEnglish\\.area"
            + id;
    var items = $("#td_govementProcurementOragan_area").find(
            'input[id=' + target + ']');
    if (checked_length < total_length) {
        $(items).prop('checked', false);
    } else {
        $(items).prop('checked', true);
    }
}

function single_area_select_English(obj) {
    var target = "searchConditionBeanEnglish\\.govementProcurementOrgBeanEnglish\\.prefecture_"
            + $(obj).val();
    var items = $("#td_govementProcurementOrg").find(
            'input[name=' + target + ']');
    if ($(obj).parent().find("input").prop('checked')) {
        $(items).prop('checked', true);
    } else {
        $(items).prop('checked', false);
    }
}

function single_presures_select_English(obj) {
    var li = $(obj).parent().parent().parent().find('ul').find('li');
    var total_length = $(li).length;
    var checked_length = $(li).find(":checkbox:checked").length;
    var id = $(obj).attr('name').charAt($(obj).attr('name').length - 1);
    var target = "searchConditionBeanEnglish\\.govementProcurementOrgBeanEnglish\\.area" + id;
    var items = $("#td_govementProcurementOrg")
            .find('input[id=' + target + ']');
    if (checked_length < total_length) {
        $(items).prop('checked', false);
    } else {
        $(items).prop('checked', true);
    }
}

