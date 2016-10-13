$(document).ready(function () {

//create add form for ae_mapping
    $('.ae-category').on('click', function () {
        var table = $(this).attr('id');
        var data = 'table=' + table;
        $.ajax({
            type: "POST",
            url: window.base_url + "generic/get_table_fields",
            data: data,
            success: function (postBack)
            {
                var fields = $.parseJSON(postBack);
                var form = '';
                form += '<div class="form-lable"><h2 class="capitalize">Add New ' + table.replace(/_/g, ' ') + '</h2></div>';
                form += '<div class="form-control editor">';
                form += '<form action="' + window.base_url + 'ae_mapping/add_new" method="post" class="form">';
                form += '<input name="table"  type="hidden" value="' + table + '">';
                form += '<div class="form-inner">';
                $.each(fields, function (i, v) {
                    form += '<div class="form-group" id="section-2">';
                    form += '<label class="capitalize">' + v.replace(/_/g, " ") + '</label>';
                    form += '<input name="' + v + '"  type="text">';
                    form += '</div>';
                });

                form += '<div class="sub-btn" >';
                form += '<input id="submit" type="submit" value="Add">';
                form += '</div>';
                form += '<div class="clearfix"></div>';
                form += '</div>';
                form += '</form>';
                form += '</div>';

//  insret into dom
                $('#add-section').html(form);
            }
        });
    });


    $('.report-sortable-table').DataTable({
        "paging": false,
        "ordering": true,
        "info": false,
        "filter": false
    });

    $('.pagination-table').DataTable({
        "paging": true,
        "ordering": true,
        "info": false,
        "filter": false,
        "bLengthChange": false,
        "iDisplayLength": 3,
        "oLanguage": {
            "oPaginate": {
                "sPrevious": "<<", // This is the link to the previous page
                "sNext": ">>" // This is the link to the next page
            }
        }
    });

    var table = $('.user-log-pagination-table').DataTable({
        "paging": true,
        "ordering": false,
        "info": false,
        "filter": false,
        "bLengthChange": true,
        "iDisplayLength": 30,
        "dom": '<"top"i>rt<"bottom"plf><"clear">',
        "oLanguage": {
            "sLengthMenu": "Show entries per page _MENU_",
            "oPaginate": {
                "sPrevious": "<<", // This is the link to the previous page
                "sNext": ">>", // This is the link to the next page
            }
        }
    });

    //edit-log-row click show details

    $('.edit-log-row').click(function () {
        var currentRow = $(this);
        var target = $(this).children('td:nth-child(2)').text();

        $('.details-table').parents('tr').remove();
        if (table.row($(this)).child.isShown()) {
            table.row($(this)).child.hide();
            return;
        }
        var data = $(this).find('.data-hidden');
        var staticObj = data[0].innerHTML;
        var array = $.parseJSON(staticObj);
        var obj = [];
        $.each(array, function (i, v) {
            var index = $.trim(i).replace(/^`|`$/g, '');
            var v = $.trim(v).replace(/^`|`$/g, '');
            var val = $.trim(v).replace(/^'|'$/g, '');
            obj[index] = val;
        });
        var newObj = $.extend({}, obj);
        var details = "";
        details += "<table class='details-table table-bordered' style='margin:0;'>";

        $.each(newObj, function (i, v) {
            if (i.indexOf("id") >= 0){
                $(currentRow).find('.edit-log-icon').attr('targetId',v);
                return;
            }
            details += "<tr style='background-color:#EFEFEF;' >";
            details += "<td style='border:1px solid #ccc;'>" + i + "</td>";
            details += "<td style='border:1px solid #ccc;'>" + v + "</td>";
            details += "</tr>";
            
        });
        details += "</table>";
        var row = table.row($(this));
        var child = row.child(details);
        row.child.show();

//        $(details).appendTo($(this));
    });
$('.details-table').on('click',function(){
    alert('lkl');
});


    $('.datetime').datepicker({
        dateFormat: 'dd/mm/yy'
    });

//print html in reports
    $('#print-html').click(function () {
        $("#report-view").printThis({
            debug: false,
            printContainer: false,
            pageTitle: 'PRINT REPORT',
            formValues: true,
            printDelay: 0
        })
    });
//print html in edit log
    $('#print-html-edit-log').click(function () {
        $("#log-view").printThis({
            debug: false,
            printContainer: false,
            pageTitle: 'PRINT REPORT',
            formValues: true,
            printDelay: 0
        })
    });

//download report as pdf
    $('#pdf-report').click(function () {
        var report = $("#report-view").html();
        var form = '';
        form += '<form method="post" action="' + window.base_url + 'generic/create_pdf" style="display:none;">';
        form += '<input name="fileName" value="pdf">';
        form += '<textarea name="report">' + report + '</textarea>';
        form += '</form>';
        $(form).appendTo('body').submit().detach();

    });
//download edit-log as pdf
    $('#pdf-edit-log').click(function () {
        var report = $("#log-view").html();
        
        var form = '';
        form += '<form method="post" action="' + window.base_url + 'generic/create_pdf" style="display:none;">';
        form += '<input name="fileName" value="pdf">';
        form += '<textarea name="report">' + report + '</textarea>';
        form += '</form>';
        $(form).appendTo('body').submit().detach();

    });

//download edit-log as excel
    $('#excel-edit-log').click(function () {
        var report = $("#log-view").html();
        var form = '';
        form += '<form method="post" action="' + window.base_url + 'generic/create_excel"  style="display:none;">';
        form += '<input name="fileName" value="pdf">';
        form += '<textarea name="report">' + report + '</textarea>';
        form += '</form>';
        $(form).appendTo('body').submit().detach();
    });

//download report as excel
    $('#excel-report').click(function () {
        var report = $("#report-view").html();
        var form = '';
        form += '<form method="post" action="' + window.base_url + 'generic/create_excel"  style="display:none;">';
        form += '<input name="fileName" value="pdf">';
        form += '<textarea name="report">' + report + '</textarea>';
        form += '</form>';
        $(form).appendTo('body').submit().detach();
    });


// implants delivery: num implants should not exceed...
    $('.delivery_implant_form #number_implants,#edit_batch_form').keyup(function () {
        var cur = $(this);
        var site = $('select[name=site]').val();
        var batchNum = $('#batch_number').val();
        var numImp = $(this).val();
        if (numImp == '' || site == '' || batchNum == '') {
            return false;
        }
        var data = 'site=' + site + '&batchNum=' + batchNum + '&numImp=' + numImp;
        $.ajax({
            type: "POST",
            url: window.base_url + "generic/calculate_implants",
            data: data,
            success: function (postBack)
            {
                var data = $.parseJSON(postBack);
                var dt = data['total']['0'];
                var totalImplants = (parseInt(dt.imp_admin) + parseInt(dt.imp_alloc_ct) + parseInt(dt.imp_alloc_qc) + parseInt(dt.wastages) + parseInt((dt.imp_del == null) ? 0 : dt.imp_del));
                var temp = implant_info_template(data);

                $(temp).insertBefore(cur);
                if (parseInt(numImp) > (parseInt(dt.total_implants) - parseInt(totalImplants))) {
                    var remaining = parseInt(dt.total_implants) - parseInt(totalImplants);
                    var error = '<label for="number_implants" generated="true" class="error error-total-implants">Enter a value less than or equal to ' + remaining + '</label>';
                    $(cur).addClass('error');
                    $(error).insertAfter(cur);
                } else {
                    $(cur).removeClass('error');
                }
            }
        });
    }).focusout(function () {
        $('#implants_info').remove()
    });



// implants wastages: num implants should not exceed...
    $('.check_wastage #batch_number,.check_wastage #site').change(function () {
        var site = $('select[name=site]').val();
        var batchNum = $('#batch_number').val();
        if (site == '' || batchNum == '') {
            return false;
        }
        var data = 'site=' + site + '&batchNum=' + batchNum;
        $.ajax({
            type: "POST",
            url: window.base_url + "generic/calculate_implants",
            data: data,
            success: function (postBack)
            {
                var data = $.parseJSON(postBack);
                var dt = data['total']['0'];
                var totalImplants = (parseInt(dt.imp_admin) + parseInt(dt.imp_alloc_ct) + parseInt(dt.imp_alloc_qc) + parseInt(dt.wastages) + parseInt((dt.imp_del == null) ? 0 : dt.imp_del));
                var temp = implant_info_template(data);

                $(temp).insertBefore('.info');
                if ((parseInt(dt.total_implants) - parseInt(totalImplants)) == 0) {
                    var error = '<label for="number_implants" generated="true" class="error error-total-implants">Total implants completed in this site and batch.</label>';
                    $('.info').addClass('error').html(error);
                } else {
                    $('.info').removeClass('error');
                }
            }
        });
    }).focusout(function () {
        $('#implants_info').remove()
    });





//implant delivery: delivery date Cannot be before the release date for specific batch as defined on Drug Batches table
    $('.manage-delivery select[name=batch_number],.manage-wastage select[name=batch_number]').on('change', function (e) {
        var cur = $(this);
        var batchVal = $(this).val();
        if (batchVal == '') {
            return false;
        }
        var data = 'batchVal=' + batchVal;
        $.ajax({
            type: "POST",
            url: window.base_url + "generic/get_batch_data",
            data: data,
            success: function (postBack)
            {
                var data = $.parseJSON(postBack);
                var d = new Date(data.release_date);
                release_date = [d.getDate(), (d.getMonth() + 1), d.getFullYear()].join('/');
                if ($(cur).parents('div').hasClass('manage-delivery')) {
                    $('input[name="delivery_date"]').datepicker("option", "minDate", release_date);
                } else if ($(cur).parents('div').hasClass('manage-wastage')) {
                    $('input[name="date_reported"]').datepicker("option", "minDate", release_date);
                }
            }
        });
    });


//    for implant batches man-date must be less than delivery date
    $('input[name="manufacture_date"]').datepicker({
        dateFormat: 'dd/mm/yy',
        onSelect: function (selected) {
            $('input[name="release_date"]').datepicker("option", "minDate", selected)
        }
    });

    $('input[name="release_date"],input[name="expiry_date"],input[name="extended_expiry_date"]').datepicker({
        dateFormat: 'dd/mm/yy',
        onSelect: function (selected) {
            $('input[name="manufacture_date"]').datepicker("option", "maxDate", selected);
            $('input[name="expiry_date"]').datepicker("option", "minDate", selected);
            $('input[name="extended_expiry_date"]').datepicker("option", "minDate", selected);
        }
    });




//pagination
//  $('.table-pagination').pagination({
//        items: 4,
//        itemsOnPage: 1,
//        cssStyle: 'light-theme'
//    });


//tipsy
    $('th').qtip({
        position: {
            my: 'bottom center', // Position my top left...
            at: 'center', // at the bottom right of...
        },
        style: {
            classes: 'qtip-dark qtip-jtools'
        }
    });

//submit search form only on search-btn click
    $('#search-btn').click(function (e) {
        e.preventDefault();
        var text = $('#search-text').val();
        if (text.length == 0) {
            $('#search-text').attr('placeholder', 'MUST WRITE SOMETHINK')
            return false;
        }
        $(this).closest('form').submit();
    });

//email checking
    $('#user_email').on('change blur', function () {
        var cur = $(this);
        var value = $(this).val();
        if (value.length)
            check_email(cur);
        else
            return false;
    });
////phone number masking
//    $.mask.definitions['~'] = '[+0-9 ]';
//    $(".phone_number").mask("(~9999) 999-99?99");



//check all checkboxes on checkall
    $('input[name="check_all"]').click(function () {
        if ($(this).is(':checked')) {
            $('.item_checkbox').prop('checked', true);
        } else {
            $('.item_checkbox').prop('checked', false);
        }
    });
//delete user/users
    $('.remove').on('click', function (e) {
        e.preventDefault();
        if ($('.item_checkbox:checked').length == 0) {
            return false;
        }
        $('#delModal').modal();
    });
    $('.confirm-del').on('click', function (e) {
        $(document).data('target', '')
        e.preventDefault();
        if ($('.item_checkbox:checked').length == 0) {
            return false;
        }

        ids = [];
        $('.item_checkbox:checked').each(function (i) {
            if (i === 0) {
                $(document).data('target', $(this).parents('tbody').attr('target'));
            }
            var itemId = $(this).parents('tr').attr('item_id');
            ids.push(itemId);
        });
        var postData = 'ids=' + ids + '&target=' + $(document).data('target');
        $.ajax({
            type: 'POST',
            url: window.base_url + 'generic/delete',
            data: postData,
            success: function (callBack) {
                window.location.reload();
            }
        });
    });

//edit 
    $('.edit-log-icon').on('click', function () {
        $(this).closest('.edit-log-row').click();
        var target = $(this).attr('target');
        var targetId = $(this).attr('targetid');
//        alert(target+'-'+targetId);return;
        window.location.href = window.base_url + 'generic/edit_from_log?t=' + target+'&tid='+targetId;
    });
    $('.user-row  td:not(:first-child)').on('click', function () {
        var userId = $(this).parent('tr').attr('item_id');
        window.location.href = window.base_url + 'users/edit_user?uid=' + userId;
    });
    $('.site-row  td:not(:first-child)').on('click', function () {
        var Id = $(this).parent('tr').attr('item_id');
        window.location.href = window.base_url + 'manage_sites/edit_site?id=' + Id;
    });
    $('.delivery-row  td:not(:first-child)').on('click', function () {
        var Id = $(this).parent('tr').attr('item_id');
        window.location.href = window.base_url + 'manage_delivery/edit_delivery?id=' + Id;
    });
    $('.wastage-row  td:not(:first-child)').on('click', function () {
        var Id = $(this).parent('tr').attr('item_id');
        window.location.href = window.base_url + 'manage_wastage/edit_wastage?id=' + Id;
    });
    $('.batch-row  td:not(:first-child)').on('click', function () {
        var Id = $(this).parent('tr').attr('item_id');
        window.location.href = window.base_url + 'batch/edit_batch?id=' + Id;
    });
    $('.batch-map-row  td:not(:first-child)').on('click', function () {
        var Id = $(this).parent('tr').attr('item_id');
        window.location.href = window.base_url + 'batch/edit_batch_map?id=' + Id;
    });
    $('.site-map-row  td:not(:first-child)').on('click', function () {
        var Id = $(this).parent('tr').attr('item_id');
        window.location.href = window.base_url + 'manage_sites/edit_site_map?id=' + Id;
    });

// for reports
    $('.report-row').on('click', function () {
        var id = $(this).attr('row_id');
        var target = $(this).parents('tbody').attr('target');
        var data = 'id=' + id + '&target=' + target;
        if (target == 'patient') {
            var siteId = $(this).attr('site_id');
            data = 'id=' + id + '&target=' + target + '&site_id=' + siteId;
        }
        window.location.href = window.base_url + 'reports/show?' + data;
    });

//username no space checking
    $.validator.addMethod("noSpace", function (value, element) {
        return value.indexOf(" ") < 0;
    }, "No space allowed.");

//search field text only
    $.validator.addMethod("textonly", function (value, element) {
        valid = false;
        check = /[^-\a-zA-Z]/.test(value);
        if (check == false)
            valid = true;
        return this.optional(element) || valid;
    }, $.format("Please only enter letters."));

//phone validation
    jQuery.validator.addMethod("phoneNum", function (phone_number, element) {
//    phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^[+-]?\d+$/);
    }, "Only + and digits, minimum 9.");


//search form validation
    $('#search-form').validate({
        igonore: [],
        rules: {
            //search            
            search: {
                textonly: true
            }
        },
        errorPlacement: function (error, element) {

            error.appendTo(element.parents('.search-cont'));

        }
    });


    //number of implants Cannot be greater than Total Implants for specific batch as defined by Drug Batches table
    jQuery.validator.addMethod("minimum", function (value, element, param) {
        var input = parseInt(value);
        return input <= param;
    }, function (param, element) {
        return 'This value must be less than or equal to ' + param + '.'
    });

//tOTAL Implants validation
    jQuery.validator.addMethod("total_implants", function (value, element) {
        var batch_number = $("#batch_number").val();
        var total_implants = parseInt($("#total_implants").val());
        var implant_all_qc = parseInt($("#implant_all_qc").val());
        var implant_all_ct = parseInt($("#implant_all_ct").val());
        var validation = false;
        $.ajax({
            type: 'POST',
            async: false,
            cache: false,
            url: window.base_url + 'batch/validate_implants',
            data: 'batch_number=' + batch_number + '&total_implants=' + total_implants + '&implant_all_qc=' + implant_all_qc + '&implant_all_ct=' + implant_all_ct,
            success: function (callBack) {
                var data = $.parseJSON(callBack);
                if (data.msg == 'ok') {
                    validation = true;
                }
                else
                {
                    /*var msg = '<label for="total_implants" generated="true" class="error form-group error-total-implants">'+data.msg+'.</label>';
                     $(msg).insertAfter('.sub-btn');*/
                    validation = false;
                }
            }
        });
        return validation;
    }, "Allocated implants and wastages must be less than total implant.");

// QC Allocated Implants validation
    jQuery.validator.addMethod("qc_implants", function (value, element) {
        var batch_number = $("#batch_number").val();
        var total_implants = parseInt($("#total_implants").val());
        var implant_all_qc = parseInt($("#implant_all_qc").val());
        var implant_all_ct = parseInt($("#implant_all_ct").val());
        var validation = false;
        $.ajax({
            type: 'POST',
            async: false,
            cache: false,
            url: window.base_url + 'batch/validate_implants',
            data: 'batch_number=' + batch_number + '&total_implants=' + total_implants + '&implant_all_qc=' + implant_all_qc + '&implant_all_ct=' + implant_all_ct,
            success: function (callBack) {
                var data = $.parseJSON(callBack);
                if (data.msg == 'ok') {
                    validation = true;
                }
                else
                {
                    validation = false;
                }
            }
        });
        return validation;
    }, "implant_all_qc+implant_all_ct should not exceed total implants.");

// Clinical Trials Allocated Implants validation
    jQuery.validator.addMethod("ct_implants", function (value, element) {
        var batch_number = $("#batch_number").val();
        var total_implants = parseInt($("#total_implants").val());
        var implant_all_qc = parseInt($("#implant_all_qc").val());
        var implant_all_ct = parseInt($("#implant_all_ct").val());
        var validation = false;
        $.ajax({
            type: 'POST',
            async: false,
            cache: false,
            url: window.base_url + 'batch/validate_implants',
            data: 'batch_number=' + batch_number + '&total_implants=' + total_implants + '&implant_all_qc=' + implant_all_qc + '&implant_all_ct=' + implant_all_ct,
            success: function (callBack) {
                var data = $.parseJSON(callBack);
                if (data.msg == 'ok') {
                    validation = true;
                }
                else
                {
                    validation = false;
                }
            }
        });
        return validation;
    }, "implant_all_qc+implant_all_ct should not exceed total implants.");

    function isNAN(val)
    {
        if (isNaN(val))
            return 0;
        else if (val == "") {
            return 0;
        }
        else
            return val;
    }
// Clinical Trials Allocated Implants ADD validation
    jQuery.validator.addMethod("add_implants", function (value, element) {
        var total_implants = parseInt(isNAN($("#total_implants").val()));
        var implant_all_qc = parseInt(isNAN($("#implant_all_qc").val()));
        var implant_all_ct = parseInt(isNAN($("#implant_all_ct").val()));
        var validation = false;
        if (total_implants >= (implant_all_ct + implant_all_qc))
        {
            validation = true;
        }
        return validation;
    }, "implant_all_qc+implant_all_ct should not exceed total implants.");


//add batch form validation
    $('.form').validate({
        igonore: [],
        rules: {
//batch
            total_implants: {
                required: true,
                min: 1,
                add_implants: true
            },
            imp_alloc_qc: {required: true, add_implants: true},
            imp_alloc_ct: {required: true, add_implants: true},
            manufacture_date: 'required',
            release_date: 'required',
            expiry_date: 'required',
            extended_expiry_date: 'required',
//wastage
            date_reported: 'required',
            reason: 'required',
//delivery            
            site: 'required',
            batch_number: 'required',
            delivery_date: 'required',
            "confirmed_by": {required: true},
            delivery_notes: 'required',
            number_implants: {
                required: true,
                number: true,
                minimum: function () {
                    var batchVal = $('select[name=batch_number]').val();
                    var data = 'batchVal=' + batchVal;
                    $.ajax({
                        type: "POST",
                        url: window.base_url + "generic/get_batch_data",
                        data: data,
                        success: function (postBack)
                        {
                            var data = $.parseJSON(postBack);
                            window.totalImp = parseInt(data.total_implants);
                        }
                    });
                    return window.totalImp;
                }
            },
//site            
            site_title: 'required',
            main_pharmacy_contact: 'required',
            contact_number: {
                required: true,
                phoneNum: true
            },
            country: 'required',
            user_role: 'required',
//user            
            user_name: {
                required: true,
                noSpace: true
            },
            user_email: {
                required: true,
                email: true
            },
            user_address: 'required',
            user_phone: {
                required: true,
                phoneNum: true
            },
            old_password: 'required',
            new_password: {
                required: true,
                equalTo: '#confirm_password'
            },
            confirm_password: {
                required: true,
                equalTo: '#new_password'
            }
        },
        messages: {
            user_role: "Must select a role.",
            user_name: {
                required: " User name is required."
            },
            user_email: {
                required: 'Email is required.',
                email: 'Must be of the type abc@test.com'

            },
            user_address: " Address is required.",
            user_phone: " Phone is required.",
            old_password: 'Old Password is required'

        }

    });


//EDIT Batch form validation
    $('#edit_batch_form').validate({
        igonore: [],
        rules: {
//batch
            total_implants: {
                required: true,
                min: 1,
                total_implants: true
            },
            imp_alloc_qc: {required: true, qc_implants: true},
            imp_alloc_ct: {required: true, ct_implants: true},
            manufacture_date: 'required',
            release_date: 'required',
            expiry_date: 'required',
            extended_expiry_date: 'required',
//wastage
            date_reported: 'required',
            reason: 'required',
//delivery            
            site: 'required',
            batch_number: 'required',
            delivery_date: 'required',
            number_implants: {
                required: true,
                number: true,
                minimum: function () {
                    var batchVal = $('select[name=batch_number]').val();
                    var data = 'batchVal=' + batchVal;
                    $.ajax({
                        type: "POST",
                        url: window.base_url + "generic/get_batch_data",
                        data: data,
                        success: function (postBack)
                        {
                            var data = $.parseJSON(postBack);
                            window.totalImp = parseInt(data.total_implants);
                        }
                    });
                    return window.totalImp;
                }
            },
//site            
            site_title: 'required',
            main_pharmacy_contact: 'required',
            contact_number: {
                required: true,
                phoneNum: true
            },
            country: 'required',
            user_role: 'required',
//user            
            user_name: {
                required: true,
                noSpace: true
            },
            user_email: {
                required: true,
                email: true
            },
            user_address: 'required',
            user_phone: {
                required: true,
                phoneNum: true
            },
            old_password: 'required',
            new_password: {
                required: true,
                equalTo: '#confirm_password'
            },
            confirm_password: {
                required: true,
                equalTo: '#new_password'
            }
        },
        messages: {
            user_role: "Must select a role.",
            user_name: {
                required: " User name is required."
            },
            user_email: {
                required: 'Email is required.',
                email: 'Must be of the type abc@test.com'

            },
            user_address: " Address is required.",
            user_phone: " Phone is required.",
            old_password: 'Old Password is required'

        }

    });
});

function check_email(cur) {
    var cur = cur;
    var email = $(cur).val();
    $.ajax({
        type: 'POST',
        url: window.base_url + 'users/check_email',
        data: 'email=' + email,
        success: function (callBack) {
            var data = $.parseJSON(callBack);
            $('label[for="user_email"]').remove();
            if (data.msg == 'exist') {
                var msg = '<label for="user_email" generated="true" class="error"> Email already taken.</label>';
                $(msg).insertAfter(cur);
            }
        }
    });
}

function implant_info_template(data) {
    var dt = data['total']['0'];
    var totalImplants = (parseInt(dt.imp_admin) + parseInt(dt.imp_alloc_ct) + parseInt(dt.imp_alloc_qc) + parseInt(dt.wastages) + parseInt((dt.imp_del == null) ? 0 : dt.imp_del));
    $('#implants_info').remove();
    $('label[for=number_implants]').remove();
    var temp = "";
    temp += "<div id='implants_info' style='background-color:yellow;border:thin solid black;z-index:5;position:absolute;left:-22%;'>";
    temp += "<table style='margin:0;'><tbody>";
    temp += "<tr style='border-bottom:1px solid #ccc;'><td>Total Implants</td><td>" + dt.total_implants + "</td></tr>";
    temp += "<tr><td>Imp Adm'n</td><td>" + dt.imp_admin + "</td></tr>";
    temp += "<tr><td>Imp Alloc QC</td><td>" + dt.imp_alloc_qc + "</td></tr>";
    temp += "<tr><td>Imp Alloc CT</td><td>" + dt.imp_alloc_ct + "</td></tr>";
    temp += "<tr><td>Wastages</td><td>" + dt.wastages + "</td></tr>";
    temp += "<tr><td>Deliveries</td><td>" + dt.imp_del;
    +"</td></tr>";
    temp += "<tr style='border-top:1px solid #ccc;'><td>Total</td><td>" + totalImplants + "</td></tr>";
    temp += "</tbody></table>";
    temp += "</div>";
    return temp;
}
