/**
 * ملف جافا سكربت الرئيسي
 *
 * @constructor
 */



var $LoadingIndectior = '<img alt="Loaded" style="width: 16px; height: 16px"  src="./images/load.gif" />';
var spinner;

//اضافة نوع جهاز


// عند التركيز على نوع الجهاز تعرض القائمة


function AddNewDevices() {


    headrTitle('الاجهزة');

    function escapeTags(str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
    }


    $("#Contener").load("form/newDevices.html", function () {


        $("form#addNewDevicesForm").submit(function () {


            $.ajax({
                type: 'POST',
                dataType: "json",
                // make sure you respect the same origin policy with this url:
                // http://en.wikipedia.org/wiki/Same_origin_policy
                url: 'json/insertNewDevices.php',

                data: $("form#addNewDevicesForm").serialize(),


                success: function (data) {
                    //called when successful
                    notie.alert(data.idMsg, data.msg, 2.5);

                },
                error: function (e) {
                    notie.alert(3, 'Error Respnse Paramter', 2.5);
                }


            });

            return false;
        });


        var btn = document.getElementById('uploadBtn'),
            progressBar = document.getElementById('progressBar'),
            progressOuter = document.getElementById('progressOuter'),
            msgBox = document.getElementById('msgBox');

        var uploader = new ss.SimpleUpload({
            button: btn,
            url: 'file_upload.php',
            name: 'uploadfile',
            multipart: true,
            hoverClass: 'hover',
            focusClass: 'focus',
            responseType: 'json',
            startXHR: function () {
                progressOuter.style.display = 'block'; // make progress bar visible
                this.setProgressBar(progressBar);
            },
            onSubmit: function () {
                msgBox.innerHTML = ''; // empty the message box
                btn.innerHTML = 'Uploading...'; // change button text to "Uploading..."
            },
            onComplete: function (filename, response) {
                btn.innerHTML = 'Choose Another File';
                progressOuter.style.display = 'none'; // hide progress bar when upload is completed

                if (!response) {
                    msgBox.innerHTML = 'Unable to upload file';
                    return;
                }

                if (response.success === true) {
                    $("#ImageUrl").val(escapeTags(filename))


                    msgBox.innerHTML = '<strong>' + escapeTags(filename) + '</strong>' + ' successfully uploaded.';

                } else {
                    if (response.msg) {
                        msgBox.innerHTML = escapeTags(response.msg);

                    } else {
                        msgBox.innerHTML = 'An error occurred and the upload failed.';
                    }
                }
            },
            onError: function () {
                progressOuter.style.display = 'none';
                msgBox.innerHTML = 'Unable to upload file';
            }
        });


    });


}


/**
 * add new custemer
 * @constructor
 */
function AddNewCustemer() {


    headrTitle('العملاء');
    $("#Contener").load("form/newCustemer.html", function () {


        var options = {
            url: "json/getCoustemersAutoCompleat.php",

            getValue: "Name",
            theme: "blue-light",
            ajaxSettings: {
                dataType: "json",
                method: "POST",
                data: {
                    dataType: "json"
                }
            },

            preparePostData: function (data) {
                data.c = $("#Name").val();
                return data;
            },
            list: {
                match: {
                    enabled: false
                },
                onSelectItemEvent: function () {


                    var vals = $("#Name").getSelectedItemData().MobileNumber;
                    $("#MobileNumber").val(vals).trigger("change");


                }
            }
        };


        $("#Name").easyAutocomplete(options);


        var options = {
            url: "json/getCoustemersAutoCompleat.php",
            theme: "blue-light",


            getValue: "MobileNumber",

            list: {
                match: {
                    enabled: false
                },
                onSelectItemEvent: function () {


                    var vals = $("#MobileNumber").getSelectedItemData().Name;
                    $("#Name").val(vals).trigger("change");


                }
            }
        };

        $("#MobileNumber").easyAutocomplete(options);


        // عرض نوع الاجهزة المتوفرة


        var options = {
            url: "json/gettypeDevicesAutoCompleat.php",
            theme: "blue-light",


            getValue: "NameDevices",


            ajaxSettings: {
                dataType: "json",
                method: "POST",
                data: {
                    dataType: "json"
                }
            },

            preparePostData: function (data) {
                data.d = $("#IDTypeDeviceTitle").val();
                return data;
            },

            template: {
                type: "iconRight",
                fields: {
                    iconSrc: "imageUrl"
                }
            },
            list: {
                maxNumberOfElements: 99,
                match: {
                    enabled: false
                },
                onSelectItemEvent: function () {


                    //
                    var v = $("#IDTypeDeviceTitle").getSelectedItemData().ID;
                    $("#IDTypeDevice").val(v).trigger("change");


                }
            }
        };
        $("#IDTypeDeviceTitle").easyAutocomplete(options);


        /**
         * اضافة عميل جديد مع جهاز
         */

        $("form#addNewCustemerForm").submit(function () {


            $.ajax({
                type: 'POST',
                dataType: "json",
                // make sure you respect the same origin policy with this url:
                // http://en.wikipedia.org/wiki/Same_origin_policy
                url: 'json/insertNewCustemer.php',

                data: $("form#addNewCustemerForm").serialize(),
                success: function (data) {

                    if (data.suc === true) {
                        notie.alert(1, 'تم العملية بنجاح!', 2.5);

                        console.log('Rest addNewCustemer Form');
                        $('#addNewCustemerForm')[0].reset();


                        popupwindow("printInVoice.php?d=" + data.idNewDevices, "printInVoice", 400, 600);
                        getLastCustemer();
                    }

                    else {
                        notie.alert(3, data.msg, 2.5);
                    }

                }
            });

            return false;
        });


    });


}


/**
 * اعادة ناتج هتمل لعرض العملاء
 * @param val
 * @constructor
 */

function ListCustemerGenrats(val) {

    var v = '';


    v += '<a  onclick="showListDevices(' + val.ID + ');" href="#' + val.ID + '" class="showRight2"><img src="icons/custemers.png" alt=""><span>' + val.Name + '<small>' + val.DateAdded + '</small></span></a>';


    return v;


}


/*
 عرض العملاء في القائمة اليمنة
 */
//<a href="javascript:void(0);" class="showRight2"><img src="style/assets/images/avatar2.png" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
//

function getLastCustemer() {


    $("#cd-cart").html($LoadingIndectior);

    $.ajax({
        type: 'GET',
        dataType: "json",
        url: 'json/getLastCoustemers.php',
        success: function (data) {

            $("#listCustemers").html('');

            var items = [];

            $.each(data, function (key, val) {

                items.push(ListCustemerGenrats(val));

            });

            $("#listCustemers").html(items.join(''));


            //hideAllPopOver();
        }, error: function (e) {
            notie.alert(3, 'لايمكن تحميل قائمة العملاء', 2.5);

        }
    });


}


// Search By Name Or Mobile Number


$(".searchClassType").keyup(function () {


    //alert($('.searchClassType').text()+", "+$('.btn-select2').text());


    if ($(this).val().length == 0) {
        displayListMenu(false);


        return false;
    }


    var name = $(this).attr("dataSearch");
    var value = $(this).val();
    var dataObj = {};
    dataObj[name] = value;
    dataObj['by'] = $("#searchBy").val();


    if ($("#searchBy").val() == 's') {


        showListDevices('0&s=' + value);

        return;
    }

    if ($("#searchBy").val() == 'r') {


        showListDevices('0&r=' + value);

        return;
    }


    $("#ListItems").html($LoadingIndectior);

    $.ajax({
        type: 'GET',
        dataType: "json",
        url: 'json/getCoustemers.php',
        data: dataObj,
        success: function (data) {

            $("#listCustemers").html('');

            var items = [];

            $.each(data, function (key, val) {

                items.push(ListCustemerGenrats(val));


            });

            $("#listCustemers").html(items.join(''));
            displayListMenu(true);

        },
        error: function (e) {
            notie.alert(3, 'Error Respnse Paramter', 2.5);
        }

    });


});


/*
 عرض قائمة الاجهزة
 */
function showListDevices(ID) {

    headrTitle('اجهزة العملاء');


    $("#Contener").append(spinner.el);

    $("#Contener").load("json/getDevices.php?ID=" + ID, function () {

            $('[datadevice =Device]').each(function (index) {
                var val = $(this).attr('idDevices');
                $(this).load("json/getStatusDevices.php?ID=" + val, function () {

                    var loadingId = 'loading' + val;
                    $('#' + loadingId).html($LoadingIndectior);


                });


            });


        // Ajax get Status Devices


        $('*[data-poload]').popover({
            "html": true,
            placement: $(this).attr('data-placement'),
            title: '<span  class="text-info "><strong>حالة الجهاز</strong></span>' +
            '<a href="#Close"><i class="fa fa-times-circle fa-2 pull-right closeX"></i></a>',

            "content": function () {
                var div_id = "tmp-id-" + $.now();
                return details_in_popup($(this).attr('data-poload'), div_id);
                }
            });


        function details_in_popup(link, div_id) {


            var div = $('<div/>', {
                id: div_id,
                text: 'Loading!'
            });

            $.ajax({
                url: link,
                success: function (response) {
                    $('#' + div_id).html(response);
                }
            });
            return $(div).html(spinner.el);
        }


            $('[data-toggle="tooltip"]').tooltip();


        }
    )


}


/*
 عرض مراحل تسليم الجهاز
 */
function loadStatUsBar(id) {


    $("#resultStatusBar").html($LoadingIndectior);
    $("#resultStatusBar").load("json/getstatUsBarDevices.php?ID=" + id);


}

/**
 *
 */
$(document).ready(function () {

    console.log("ready!");


    spinner = new Spinner().spin();


    getLastCustemer();
    showListDevices(0);
    //displayListMenu(true);

    $('[data-toggle="popover"]').popover({html: true});


    // اضافة للبادج

    $.getJSON("json/devices/getCollectionDevices.php", function (data) {


        var i = 0;
        $.each(data, function (key, val) {

            $("#dropdownMenuNotfction").append('<li onclick=showListDevices("&t=' + val.IDTypeDevice + '") > <a href="#"><div class="task-icon badge badge-success"><i class="fa fa-tablet"></i>  </div><span class="badge badge-roundless badge-default pull-right">' + val.count + '</span> <p class="task-details">' + val.type + '</p></a>  </li>');

            i++;

        });

        $("#dropdownMenuNotfctionBdg").html(i);

    });


});


/**
 * طباعة الفاتورة
 * @param ID  رقم الجهاز
 */
function printDevice(ID) {
    popupwindow("printInVoice.php?d=" + ID, "printInVoice", 400, 600);

}


/**
 * نافذة طباعة الفاتورة
 * @param url
 * @param title
 * @param w
 * @param h
 * @returns {Window}
 */
function popupwindow(url, title, w, h) {
    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}


/**
 * اضافة حالة الجهاز
 * @param IDdevices
 */
function showModel(IDdevices) {
    notie.input('اضافة الحالة', 'Submit', 'Cancel', 'text', 'الحالة:', function (value_entered) {

        $.ajax({
            type: "POST",
            url: 'json/insertStatusDevices.php',
            dataType: "json",

            data: {'ID': IDdevices, title: value_entered}, // serializes the form's elements.

            success: function (data) {

                notie.alert(data.idMsg, data.msg, 2.5);
            },
            error: function (e) {
                notie.alert(3, 'Error Respnse Paramter', 2.5);
            }


        });


    }, '');
}


/**
 * اضافة حالة الجهاز
 * @param IDdevices
 */
function deleteThisStatUs(IDdevices, idCustemer) {



    //$("div[name=parent" +IDdevices+ "]").hide();


    $.ajax({
        type: "POST",
        url: 'json/deleteStatusDevices.php',
        dataType: "json",

        data: {'ID': IDdevices}, // serializes the form's elements.

        success: function (data) {

            notie.alert(data.idMsg, data.msg, 2.5);
            $("div[name=parent" + IDdevices + "]").toggle("explode");


        },
        error: function (e) {
            notie.alert(3, 'Error Respnse Paramter', 2.5);
        }


    });


}


/**
 * تعديل حالة الجخهاز الى تم ايقافه
 * @param IDdevices رقم الجهاز
 */
function finshDevice(IDdevices) {

    $.ajax({
        type: "GET",
        url: 'json/editFinshStatusDevices.php',
        dataType: "json",

        data: {'ID': IDdevices}, // serializes the form's elements.

        success: function (data) {

            notie.alert(data.idMsg, data.msg, 2.5);
            $("div[name=parent" + IDdevices + "]").toggle("explode");


        },
        error: function (e) {
            notie.alert(3, 'Error Respnse Paramter', 2.5);
        }


    });


}

/**
 * اضافة مرجعية للجهاز
 * @param IDdevices
 */


/**
 * تعديل الرقم المرجعي لدى شركة الصيانة
 * @param IDdevices
 */
function editRefDevices(IDdevices) {

    notie.input('تعديل المرجع', 'Submit', 'Cancel', 'text', 'ارقم مرجع:', function (value_entered) {

        $.ajax({
            type: "POST",
            url: 'json/editRefDevices.php',
            dataType: "json",

            data: {'ID': IDdevices, title: value_entered}, // serializes the form's elements.

            success: function (data) {

                notie.alert(data.idMsg, data.msg, 2.5);
            },
            error: function (e) {
                notie.alert(3, 'Error Respnse Paramter', 2.5);
            }


        });


    }, '');


}


/**
 * تعديل رقم الشحنة
 * @param IDdevices
 */
function editTracNumber(IDdevices) {

    notie.input(' رقم شحنة', 'Submit', 'Cancel', 'text', 'رقم الشحنة:', function (value_entered) {

        $.ajax({
            type: "POST",
            url: 'json/editTracNumberDevices.php',
            dataType: "json",

            data: {'ID': IDdevices, tracNumber: value_entered}, // serializes the form's elements.

            success: function (data) {

                notie.alert(data.idMsg, data.msg, 2.5);
            },
            error: function (e) {
                notie.alert(3, 'Error Respnse Paramter', 2.5);
            }


        });


    }, '');


}


/**
 * تعديل مبلغ الصيانة
 * @param IDdevices
 */

function editMonyDevices(IDdevices) {

    notie.input('مبلغ الصيانة', 'Submit', 'Cancel', 'text', 'المبلغ:', function (value_entered) {

        $.ajax({
            type: "POST",
            url: 'json/editMonyDevices.php',
            dataType: "json",

            data: {'ID': IDdevices, Mony: value_entered}, // serializes the form's elements.

            success: function (data) {

                notie.alert(data.idMsg, data.msg, 2.5);
            },
            error: function (e) {
                notie.alert(3, 'Error Respnse Paramter', 2.5);
            }


        });


    }, '');


}


/**
 * متابعة حالة الاجهزة وعرضها
 */

function showDevicesIsNotFinsh() {

    $("#Contener").load("json/getDevicesIsNotFinsh.php", function () {

        $('#exported').DataTable();

    });


}


function displayListMenu(s) {


    if (s == true) {
        $('#cbp-spmenu-s1').addClass('cbp-spmenu-open');
    }
    else {

        $('#cbp-spmenu-s1').removeClass('cbp-spmenu-open');

    }

}


/**
 * حصول على بيانات الاجهزة رميا شارت
 */
function getChart() {


    $.ajax({
        type: "POST",
        url: 'json/getChart.php',
        dataType: "json",

        data: {'ID': null}, // serializes the form's elements.

        success: function (data) {

            notie.alert(data.idMsg, data.msg, 2.5);

            headrTitle('الاجهزة');


            $("#Contener").html(creatChart('myPieChart', 'بيانات الاجهزة'));
            $("#Contener").append(creatChart('myBarChart', 'العملاء'));

            var ctx = document.getElementById("myPieChart").getContext("2d");
            window.myPie = new Chart(ctx).Pie(data.Pia);


            var ctx = document.getElementById("myBarChart").getContext("2d");
            window.myBar = new Chart(ctx).Pie(data.Bar);


        },
        error: function (e) {
            notie.alert(3, 'Error Respnse Paramter', 2.5);
        }


    });
}


function creatChart(ID, t) {


    var h = ' <div class="col-md-6"> ';
    h += '<div class="panel panel-white">';
    h += ' <div class="panel-heading">';
    h += ' <h3 class="panel-title">' + t + '</h3>';
    h += '</div>';
    h += '  <div class="panel-body">';
    h += ' <div>';
    h += ' <canvas id="' + ID + '" height="200" width="200" style="width: 200px; height: 200px;"></canvas>';
    h += '</div>';
    h += '</div>';
    h += '</div>';
    h += '</div>';

    return h;

}


function headrTitle(t) {
    var h = '';
    h += '<div class="page-title">'
    h += ' <h3>' + t + '</h3>'
    h += ' <div class="page-breadcrumb">'
    h += '  <ol class="breadcrumb">'
    h += '<li><a href="index.html">Home</a></li>'
    h += ' <li><a href="#">' + t + '</a></li>'
    h += '  </ol>'
    h += ' </div>'
    h += '</div> '

    $('#titlePage').html(h)

}


function setSearchBy(s) {


    var v = 'm';
    var n = 'هاتف'

    if (s == 0) {
        v = 'n'
        n = 'اسم';
    }

    if (s == 1) {
        v = 'm'
        n = 'هاتف';

    }

    if (s == 2) {
        v = 's'
        n = 'سيريال';

    }

    if (s == 3) {
        v = 'r'
        n = 'رقم مرجعي';

    }

    $('[data-toggle="popover"]').popover('hide');


    var v = $("#searchBy").val(v);


    $("#labelSearch").html(n);
    displayListMenu(true);
    //showListDevices(v);

}


