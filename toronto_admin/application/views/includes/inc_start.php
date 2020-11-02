<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
    WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>
<!--end::Web font -->
<!--begin::Base Styles -->
<link href="<?php echo base_url()?>template/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>template/assets/demo/demo2/base/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Base Styles -->
<link rel="shortcut icon" href="<?php echo base_url()?>template/assets/demo/demo2/media/img/logo/favicon.ico" />
<style>
    .m-wrapper{
        max-width: 100% !important;
    }
    .form-control, .form-control[readonly] {
        border-color: #bfc0c3;
    }
    .select2-container--default .select2-selection--single {
        border: 1px solid #bfc0c3;
    }
    .btn.btn-default, .btn.btn-secondary {
        border-color: #bfc0c3;
    }
    .form-control.m-input--solid {
        border-color: #bfc0c3;
    }
    .m-form .m-form__group > label {
        color: #1d1d20;
    }
    .dt-buttons{
        margin-bottom: 15px;
    }
</style>
<style>
    #customFile .custom-file-control:lang(en)::after {
        content: "Select file...";
    }

    #customFile .custom-file-control:lang(en)::before {
        content: "Click me";
    }

    /*when a value is selected, this class removes the content */
    .custom-file-control.selected:lang(en)::after {
        content: "" !important;
    }

    .custom-file {
        overflow: hidden;
    }
    .custom-file-control {
        white-space: nowrap;
    }
</style>