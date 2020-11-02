<?php $this->view("includes/inc_page_head_".$user_role);



$this->db->select('*')->from('gallery');
$this->db->where('delete_status',0);
$gallery = $this->db->get()->num_rows();


?>

<!-- begin::Body -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver	m-container m-container--responsive m-container--xxl m-page__container">
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            Dashboard
                        </h3>
                    </div>
                    <div>
									<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
										<span class="m-subheader__daterange-label">
											<span class="m-subheader__daterange-title"></span>
											<span class="m-subheader__daterange-date m--font-brand"></span>
										</span>
										<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
											<i class="la la-angle-down"></i>
										</a>
									</span>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                <!--begin:: Widgets/Stats-->
                <div class="m-portlet ">
                    <div class="m-portlet__body  m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <!--begin::New Feedbacks-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                           Registration
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
														All Registrations
													</span>
                                        <span class="m-widget24__stats m--font-info">
														<?php echo $registration ?>
													</span>
                                        <div class="m--space-10"></div>

                                    </div>
                                </div>
                                <!--end::New Feedbacks-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <!--begin::New Orders-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                           Gallery
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
														All Gallery
													</span>
                                        <span class="m-widget24__stats m--font-danger">
														<?php echo $gallery ?>
													</span>
                                        <div class="m--space-10"></div>

                                    </div>
                                </div>
                                <!--end::New Orders-->
                            </div>
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <!--begin::New Users-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Video
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
														All
													</span>
                                        <span class="m-widget24__stats m--font-success">
														<?php echo $video ?>
													</span>
                                        <div class="m--space-10"></div>

                                    </div>
                                </div>
                                <!--end::New Users-->
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

<!--begin::Page Snippets -->
<script src="<?php echo base_url()?>template/assets/app/js/dashboard.js" type="text/javascript"></script>
<!--end::Page Snippets -->
    <script>
        // Menu Active
        $("#menu_dashboard").addClass('m-menu__item--active');
    </script>
