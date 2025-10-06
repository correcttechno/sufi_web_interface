<aside class="sidebar d-print-none">
    <!-- sidebar close btn -->
    <button type="button"
        class="sidebar-close-btn text-gray-500 hover-text-white hover-bg-main-600 text-md w-24 h-24 border border-gray-100 hover-border-main-600 d-xl-none d-flex flex-center rounded-circle position-absolute"><i
            class="ph ph-x"></i></button>
    <!-- sidebar close btn -->

    <a href="<?=base_url("dashboard");?>"
        class="sidebar__logo text-center p-20 position-sticky inset-block-start-0 bg-white w-100 z-1 pb-10">
       <!--  <img src="<?=get_img("logo.png");?>" alt="Logo" style="height:150px;object-fit:contain"> -->
    </a>

    <div class="sidebar-menu-wrapper overflow-y-auto scroll-sm">
        <div class="p-20 pt-10">
            <ul class="sidebar-menu">
                

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("conversations");?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-list"></i></span>
                        <span class="text">Dialoqlar</span>
                    </a>
                </li>

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("undefinedwords");?>" class="sidebar-menu__link">
                        <span class="icon"><i class="ph ph-list"></i></span>
                        <span class="text">Bilinməyən Sözlər</span>
                    </a>
                </li>

                <li class="sidebar-menu__item">
                    <a href="<?=base_url("languages");?>" class="sidebar-menu__link">
                        <span class="icon">
                            <i class="ph ph-columns-plus-left"></i>
                        </span>
                        <span class="text">Dillər</span>
                    </a>
                </li>



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