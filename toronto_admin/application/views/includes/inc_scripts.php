<!--begin::Base Scripts -->
<script src="<?php echo base_url()?>template/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>template/assets/demo/demo2/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<script>
    <?php if ($this->session->flashdata('flashdata_msg') != "")
    {?>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.<?php echo $this->session->flashdata('flashdata_type')?>("<?php echo $this->session->flashdata('flashdata_msg')?>","<?php echo $this->session->flashdata('flashdata_title')?>");
    <?php } ?>
</script>