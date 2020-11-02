<?php $this->view("includes/inc_page_head_".$user_role);?>

<!--begin::Page Styles -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>template/assets/vendors/custom/DataTables/datatables.min.css"/>
<link href="<?php echo base_url() ?>template/main/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Businessinsigts
                        </h3>
                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                            <li class="m-nav__item m-nav__item--home">
                                <a href="<?php echo base_url()?>dashboard" class="m-nav__link m-nav__link--icon">
                                    <i class="m-nav__link-icon la la-home"></i>
                                </a>
                            </li>
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Create
											</span>
                                </a>
                            </li>
                            <li class="m-nav__separator">
                                -
                            </li>
                            <li class="m-nav__item">
                                <a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												    Businessinsigts
											</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div style="max-width: 800px">
                        <?php if ($this->session->flashdata('flashdata_msg') != "")
                        {?>
                            <div class="alert alert-<?php echo $this->session->flashdata('alert_type')?> alert-dismissible fade show   m-alert m-alert--air m-alert--outline m-alert--outline-2x" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    <?php echo $this->session->flashdata('flashdata_title')?>
                                </strong>
                                <?php echo $this->session->flashdata('flashdata_msg')?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                
                <div class="m-portlet m-portlet--mobile m-portlet--mobile m-portlet--info m-portlet--head-solid-bg m-portlet--bordered m-portlet--rounded">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    List of Photos
                                </h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">

                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <!--begin: Search Form -->
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="row align-items-center">
                                <div class="col-xl-8 order-2 order-xl-1">
                                    <div class="form-group m-form__group row align-items-center">


                                    </div>
                                </div>
                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                    <a href="#" data-toggle="modal" data-target="#businessinsigt_add_modal" class="btn btn-focus m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                        <span>
                                            <i class="la la-plus"></i>
                                            <span>
                                                ADD
                                            </span>
                                        </span>
                                    </a>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                        <!--end: Search Form -->
                        <!--begin: Datatable -->
                        <table width="100%" class="table m-table nowrap table-header-fixed table-striped table-bordered table-hover table-header-fixed" id="businessinsigt_view_table">
                            <thead>
                            <tr class="">
                                <th>ID</th>
                                <th style="display: none">Image</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Write By</th>
                                <th>Pdf file</th>
                                <th>Date</th>

                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!--end: Datatable -->

                        <div class="modal fade" tabindex="-1" id="businessinsigt_add_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document" style="max-width: 675px">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #36a3f7;border-radius: 4px">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #ffffff" >
                                            Create
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                                        </button>
                                    </div>
                                    <form id="form_businessinsigt_add" method="post" action="<?php echo base_url().$user_directory.'businessinsigt/create'?>" class="m-form m-form--fit m-form--state m-form--label-align-right " enctype="multipart/form-data" >
                                        <div class="modal-body">
                                            <div class="m-form__content">
                                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert" id="form_businessinsigt_add_msg">
                                                    <div class="m-alert__icon">
                                                        <i class="la la-warning"></i>
                                                    </div>
                                                    <div class="m-alert__text">
                                                        Oh snap! Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="m-alert__close">
                                                        <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                           
                                            <div class="row">
                                             
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Image:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                            <label class="custom-file col-lg-12">
                                                                <input   type="file" name="uploaded_file">
                                                                <span class="custom-file-control"></span>
                                                            </label>

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Title:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                           
                                                         <input type="text" name="title" class="col-lg-12" > 

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>

                                            </div>



                                              <div class="row">
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Descriptin:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                           
                                                       <!--   <input type="text" name="description" class="col-lg-12" >  -->

                                                       <textarea name="description" class="col-lg-12"></textarea>

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>

                                            </div>



                                             <div class="row">
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Write By:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                           
                                                         <input type="text" name="write_by" class="col-lg-12" > 

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>

                                            </div>



                                            
                                            <div class="row">
                                             
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Pdf:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                            <label class="custom-file col-lg-12">
                                                                <input   type="file" name="uploaded_pdf">
                                                                <span class="custom-file-control"></span>
                                                            </label>

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>
                                            </div>











                                            <div class="m-form__seperator m-form__seperator--dashed"></div><br/>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--start edit modal -->


                         
                        <div class="modal fade" tabindex="-1" id="businessinsigt_edit_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document" style="max-width: 675px">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #00c5dc;border-radius: 4px">
                                        <h5 class="modal-title" id="exampleModalLabel" style="color: #ffffff" >
                                            Edit
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">
                                                &times;
                                            </span>
                                        </button>
                                    </div>
                                    <form id="form_businessinsigt_edit" method="post" action="<?php echo base_url().$user_directory.'businessinsigt/update'?>" class="m-form m-form--fit m-form--state m-form--label-align-right " enctype="multipart/form-data" >
                                        <div class="modal-body">
                                            <div class="m-form__content">
                                                <div class="m-alert m-alert--icon alert alert-warning m--hide" role="alert" id="form_businessinsigt_edit_msg">
                                                    <div class="m-alert__icon">
                                                        <i class="la la-warning"></i>
                                                    </div>
                                                    <div class="m-alert__text">
                                                        Oh snap! Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="m-alert__close">
                                                        <button type="button" class="close" data-close="alert" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>


                                           


 


                                           



                                            <div class="row">
                                             
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Image:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                            <label class="custom-file col-lg-12">
                                                                <input   type="file" name="uploaded_file" id="image">
                                                                <span class="custom-file-control"></span>
                                                            </label>

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>
                                            </div>



                                           



                                            






                                            


                                              <div class="row">
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Title:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                           
                                                       

                                                          <input type="text" name="title" id="title" class="col-lg-12" >

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>

                                            </div>




                                               <div class="row">
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Description:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                           
                                                       

                                                          <!-- <input type="text" name="description" id="description" class="col-lg-12" > -->
                                                          <textarea name="description" id="description" class="col-lg-12"></textarea>

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>

                                            </div>




                                            <div class="row">
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Write By:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                           
                                                       

                                                          <input type="text" name="write_by" id="write_by" class="col-lg-12" >

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>

                                            </div>




                                            <div class="row">
                                             
                                                <div class="col-lg-12" >
                                                    <label class="col-lg-2 col-form-label">
                                                        Pdf:
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <div class="form-group m-form__group">
                                                            <label class="custom-file col-lg-12">
                                                                <input   type="file" name="uploaded_pdf" id="pdf">
                                                                <span class="custom-file-control"></span>
                                                            </label>

                                                        </div>
                                                    </div>

                                                    <span class="m-form__help"></span>
                                                </div>
                                            </div>




                                            

                                             <input type="hidden" name="id" id="id">
                                            <div class="m-form__seperator m-form__seperator--dashed"></div><br/>

                                        </div>
                                       


                                        <div class="modal-footer">
                                            
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary" >
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   

                        <!-- end edit modal -->

                        
                        <div class="modal fade" tabindex="-1" id="businessinsigt_delete_modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document" >
                                <form id="user_delete_form" action="<?php echo base_url().$user_directory.'businessinsigt/delete'?>" method="post" class="form-horizontal">
                                    <div class="modal-content">
                                        <div class="alert alert-danger" role="alert" style="margin-bottom: 0px">
                                            <button type="button" class="close" data-dismiss="modal"></button>
                                            <br/>
                                            <h4 class="alert-heading">Warning! Please Confirm Your Action</h4>
                                            <br/>
                                            <p> Are You Sure to Delete this Data ?. All the Associated Data will Lost. </p>
                                            <p>
                                                <button class="btn btn-danger " type="submit" name="submit">Confirm & Delete</button>
                                                <button type="button" class="btn btn-primary modal-dismiss" data-dismiss="modal">Cancel</button>
                                            </p>
                                            <input type="hidden" id="deleteid" name="deleteid">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end::Body -->
<?php $this->view("includes/inc_footer");?>

</div>
<!-- end:: Page -->
<!-- begin::Quick Sidebar -->
<?php $this->view("includes/inc_sidebar");?>
<!-- end::Quick Sidebar -->
<?php $this->view("includes/inc_quick_navigation");?>
<!--begin::Base Scripts -->
<?php $this->view("includes/inc_scripts");?>
<script src="<?php echo base_url() ?>template/main/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>template/assets/vendors/custom/DataTables/datatables.min.js"></script>
<script>
    // Menu Active
    $("#menu_businessinsigt").addClass('m-menu__item--active');

$("#category").select2({
  placeholder: "Select Category"
});
</script>
<script>


    $('#summernote_3').summernote({height: 300});
</script>
<!--begin::Page Snippets -->
<?php $this->view("custom_scripts/businessinsigt_scripts");?>
<!--end::Page Snippets -->