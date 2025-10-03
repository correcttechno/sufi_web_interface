<aside class="sidebar d-print-none">
    <!-- sidebar close btn -->
    <button type="button"
        class="sidebar-close-btn text-gray-500 hover-text-white hover-bg-main-600 text-md w-24 h-24 border border-gray-100 hover-border-main-600 d-xl-none d-flex flex-center rounded-circle position-absolute"><i
            class="ph ph-x"></i></button>
    <!-- sidebar close btn -->

    <a href="<?=base_url("dashboard");?>"
        class="sidebar__logo text-center p-20 position-sticky inset-block-start-0 bg-white w-100 z-1 pb-10">
        <img src="<?=get_img("logo.png");?>" alt="Logo" style="height:150px;object-fit:contain">
    </a>

    <div class="sidebar-menu-wrapper overflow-y-auto scroll-sm">
        <div class="p-20 pt-10">
            <ul class="sidebar-menu">
                <li class="sidebar-menu__item <?=($this->user_model->userdata['status']!='user'?'':'has-dropdown');?> has-dropdown">
                    <a href="<?=($this->user_model->userdata['status']!='user'?'javascript:void(0)':'');?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-squares-four"></i></span>
                        <span class="text">Cədvəl</span>
                    </a>

                    <!-- Submenu start -->
                    <?php if($this->user_model->userdata['status']!='user'):?>
                    <ul class="sidebar-submenu">
                        <li class="sidebar-submenu__item">
                            <a href="<?=base_url("dashboard?groupType=bachelor");?>" class="sidebar-submenu__link">Bakalavr</a>
                        </li>

                        <li class="sidebar-submenu__item">
                            <a href="<?=base_url("dashboard?groupType=master");?>" class="sidebar-submenu__link">Magistratura </a>
                        </li>

                        <li class="sidebar-submenu__item">
                            <a href="<?=base_url("dashboard?groupType=doctorate");?>" class="sidebar-submenu__link">Doktorantura</a>
                        </li>

                        <li class="sidebar-submenu__item">
                            <a href="<?=base_url("audiences/schedules");?>" class="sidebar-submenu__link">Auditoriya</a>
                        </li>

                    </ul>
                    <?php endif;?>
                    <!-- Submenu End -->

                </li>
                <?php if($this->user_model->userdata['status']=='admin' or $this->user_model->userdata['status']=='vizitor'):?>
                <li class="sidebar-menu__item">
                    <a href="<?=base_url('audiences');?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-graduation-cap"></i></span>
                        <span class="text">Auditoriyalar</span>
                    </a>
                </li>

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("groups");?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-users-four"></i></span>
                        <span class="text">Qruplar</span>
                    </a>
                </li>


                <li class="sidebar-menu__item">
                    <a href="<?=base_url("departments");?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-list"></i></span>
                        <span class="text">Proqramlar</span>
                    </a>

                </li>

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("subjects");?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-list"></i></span>
                        <span class="text">Fənlər</span>
                    </a>

                </li>

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("teachers");?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-chalkboard-teacher"></i></span>
                        <span class="text">Müəllimlər</span>
                    </a>

                </li>

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("years");?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-calendar-check"></i></span>
                        <span class="text">Tədris ili</span>
                    </a>
                </li>

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("languages");?>" class="sidebar-menu__link">
                        <span class="icon">
                            <i class="ph ph-columns-plus-left"></i>
                        </span>
                        <span class="text">Tədris dili</span>
                    </a>
                </li>
                <?php endif;?>



                <li class="sidebar-menu__item">
                    <span
                        class="text-gray-300 text-sm px-20 pt-20 fw-semibold border-top border-gray-100 d-block text-uppercase">Settings</span>
                </li>
                <li class="sidebar-menu__item">
                    <a href="<?=base_url('profile');?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-gear"></i></span>
                        <span class="text">Hesab Ayarları</span>
                    </a>
                </li>



            </ul>
        </div>

    </div>

</aside>
<!-- ============================ Sidebar End  ============================ -->

<div class="dashboard-main-wrapper">