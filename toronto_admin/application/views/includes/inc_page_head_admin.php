
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--wide m-header--fixed m-header--fixed-mobile m-footer--push m-aside--offcanvas-default" style="background-color: #f2f3f8" >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- begin::Header -->
    <header class="m-grid__item		m-header "  data-minimize="minimize" data-minimize-offset="200" data-minimize-mobile-offset="200" >
        <div class="m-header__top">
            <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- begin::Brand -->
                    <div class="m-stack__item m-brand">
                        <div class="m-stack m-stack--ver m-stack--general m-stack--inline">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="<?php echo base_url().$user_directory.'dashboard'?>" class="m-brand__logo-wrapper">
                                    <img alt="" style="width: 60px;" src="<?php echo base_url()?>template/assets/demo/demo2/media/img/logo/logotorento.jpeg"/>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- end::Brand -->
                    <!-- begin::Topbar -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-topbar__nav-wrapper">
                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-topbar__userpic m--hide">
														<img src="<?php echo base_url()?>template/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless m--img-centered" alt=""/>
													</span>
                                            <span class="m-topbar__welcome">
														Hello,&nbsp;
													</span>
                                            <span class="m-topbar__username">
														<?php echo $this->session->userdata('name') ?>
													</span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center" style="background: url(<?php echo base_url()?>template/assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                    <div class="m-card-user m-card-user--skin-dark">
                                                        <div class="m-card-user__pic">
                                                            <img src="<?php echo base_url()?>template/assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/>
                                                        </div>
                                                        <div class="m-card-user__details">
																	<span class="m-card-user__name m--font-weight-500">
																		<?php echo $this->session->userdata('user_name') ?>
																	</span>
                                                            <a href="" class="m-card-user__email m--font-weight-300 m-link">
                                                                <?php echo $this->session->userdata('user_name') ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
																		<span class="m-nav__section-text">
																			Section
																		</span>
                                                            </li>

                                                            <li class="m-nav__separator m-nav__separator--fit"></li>
                                                            <li class="m-nav__item">
                                                                <a href="<?php echo base_url()?>admin_login/logout" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                    Logout
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
													<span class="m-nav__link-icon m-nav__link-icon--aside-toggle">
														<span class="m-nav__link-icon-wrapper">
															<i class="flaticon-grid-menu"></i>
														</span>
													</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end::Topbar -->
                </div>
            </div>
        </div>
        <div class="m-header__bottom">
            <div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
                <div class="m-stack m-stack--ver m-stack--desktop">
                    <!-- begin::Horizontal Menu -->
                    <div class="m-stack__item m-stack__item--middle m-stack__item--fluid">
                        <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-light " id="m_aside_header_menu_mobile_close_btn">
                            <i class="la la-close"></i>
                        </button>
<!--                       Navigation Menu-->
                        <?php include "inc_navigation_admin.php";?>

                    </div>
                    <!-- end::Horizontal Menu -->
                    <!--begin::Search-->
                    <div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable m-header-search--skin-" id="m_quicksearch" data-search-type="default">

                        <!--begin::Search Results -->
                        <div class="m-dropdown__wrapper">
                            <div class="m-dropdown__arrow m-dropdown__arrow--center"></div>
                            <div class="m-dropdown__inner">
                                <div class="m-dropdown__body">
                                    <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200">
                                        <div class="m-dropdown__content m-list-search m-list-search--skin-light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Search Results -->
                    </div>
                    <!--end::Search-->
                </div>
            </div>
        </div>
    </header>
    <!-- end::Header -->