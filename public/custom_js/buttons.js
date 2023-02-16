// Class definition
var KTSelect2 = (function () {
    // Private functions
    var demos = function () {
        // basic
        $("#kt_select2_status, #kt_select2_status_validate").select2({
            placeholder: "Select Status",
        });
        $("#kt_select2_bank, #kt_select2_bank_validate").select2({
            placeholder: "Select Bank",
        });
        $("#kt_select2_bank_sec, #kt_select2_bank_sec_validate").select2({
            placeholder: "Select Bank",
        });
        $("#kt_select2_type, #kt_select2_type_validate").select2({
            placeholder: "Select Type",
        });
        $("#kt_select2_policy, #kt_select2_policy_validate").select2({
            placeholder: "Select Policy",
        });
        // multi select
        $("#kt_select2_3").select2({
            placeholder: "Select a state",
        });
    };

    // Public functions
    return {
        init: function () {
            demos();
        },
    };
})();

// Initialization
jQuery(document).ready(function () {
    KTSelect2.init();
});

var nbtn = KTUtil.getById("newButton");
KTUtil.addEvent(nbtn, "click", function () {
    KTUtil.btnWait(
        nbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(nbtn);
    }, 1000);
});

//Save Buton Js
var sbtn = KTUtil.getById("kt_search");
KTUtil.addEvent(sbtn, "click", function () {
    KTUtil.btnWait(
        sbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(sbtn);
    }, 1000);
});

var rbtn = KTUtil.getById("kt_reset");
KTUtil.addEvent(rbtn, "click", function () {
    KTUtil.btnWait(
        rbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(rbtn);
    }, 1000);
});

var svbtn = KTUtil.getById("saveButton");
KTUtil.addEvent(svbtn, "click", function () {
    KTUtil.btnWait(
        svbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(svbtn);
    }, 1000);
});

var svbtn = KTUtil.getById("newButton");
KTUtil.addEvent(svbtn, "click", function () {
    KTUtil.btnWait(
        svbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(svbtn);
    }, 1000);
});

var svbtn = KTUtil.getById("importButton");
KTUtil.addEvent(svbtn, "click", function () {
    KTUtil.btnWait(
        svbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(svbtn);
    }, 1000);
});

var clbtn = KTUtil.getById("cancelButton");
KTUtil.addEvent(clbtn, "click", function () {
    KTUtil.btnWait(
        clbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(clbtn);
    }, 1000);
});

var bkbtn = KTUtil.getById("backButton");
KTUtil.addEvent(bkbtn, "click", function () {
    KTUtil.btnWait(
        bkbtn,
        "spinner spinner-right spinner-white pr-15",
        "Please wait"
    );

    setTimeout(function () {
        KTUtil.btnRelease(bkbtn);
    }, 1000);
});
