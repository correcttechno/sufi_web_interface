<div class="top-navbar flex-between gap-16 d-print-none">

<div class="flex-align gap-16">
    <!-- Toggle Button Start -->
    <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500"><i
            class="ph ph-list"></i></button>
    <!-- Toggle Button End -->

    <form data-stop action="<?=base_url('audiences/search');?>" class="w-350 d-sm-block d-none">
        <div class="position-relative">
            <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none"><i
                    class="ph ph-magnifying-glass"></i></button>
            <input type="text" name="search" value="<?=$this->input->get('search');?>"
                class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-4 placeholder-15"
                placeholder="Search...">
        </div>
    </form>
</div>

<div class="flex-align gap-16">
    <div class="flex-align gap-8">
      

        <!-- Notification Start -->
        <div class="dropdown">
            <button
                class="dropdown-btn shaking-animation text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-4 text-xl flex-center"
                type="button" data-bs-toggle="dropdown" aria-expanded="false" id="noftButton">
                <span class="position-relative">
                    <i class="ph ph-bell"></i>
                    <?php if(count($this->user_model->notifications)>0):?>
                    <span id="alarm" class="alarm-notify position-absolute end-0"></span>
                    <?php endif;?>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                <div class="card border border-gray-100 rounded-4 box-shadow-custom p-0 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="py-8 px-24 bg-main-600">
                            <div class="flex-between">
                                <h5 class="text-xl fw-semibold text-white mb-0">Bildirişlər</h5>
                                <div class="flex-align gap-12">
                                   
                                    <button type="button"
                                        class="close-dropdown hover-scale-1 text-xl text-white"><i
                                            class="ph ph-x"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="p-24 max-h-270 overflow-y-auto scroll-sm">

                            <?php if(count($this->user_model->notifications)==0):?>
                                <div class="d-block">
                                    <div class="text-primary-600 text-center">
                                        Bildiriş yoxdur.
                                    </div>
                                </div>
                            <?php endif;?>

                            <?php foreach($this->user_model->notifications as $noft):?>
                            <div class="d-flex align-items-start gap-12">
                                <span class="flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl">
                                    <i class="ph ph-list-checks"></i>
                                </span>
                              
                                
                                <div class="border-bottom border-gray-100 mb-24 pb-24">
                                    <div class="flex-align gap-4">
                                        <a href="#" class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">
                                            Yeni tapşırıq əlavə olundu !
                                         </a>
                                        <!-- Three Dot Dropdown Start -->
                                        <!-- <div class="dropdown flex-shrink-0">
                                            <button class="text-gray-200 rounded-4" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ph-fill ph-dots-three-outline"></i>
                                            </button>
                                            <div
                                                class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                                                <div
                                                    class="card border border-gray-100 rounded-12 box-shadow-custom">
                                                    <div class="card-body p-12">
                                                        <div class="max-h-200 overflow-y-auto scroll-sm pe-8">
                                                            <ul>
                                                                <li class="mb-0">
                                                                    <a href="#"
                                                                        class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                        <span class="text">Mark as read</span>
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="#"
                                                                        class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                        <span class="text">Delete
                                                                            Notification</span>
                                                                    </a>
                                                                </li>
                                                                <li class="mb-0">
                                                                    <a href="#"
                                                                        class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                        <span class="text">Report</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- Three Dot Dropdown End -->
                                    </div>
                                    <!-- <div class="flex-align gap-6 mt-8">
                                        <img src="assets/images/icons/google-drive.png" alt="">
                                        <div class="flex-align gap-4">
                                            <p class="text-gray-900 text-sm text-line-1">Design brief and
                                                ideas.txt</p>
                                            <span class="text-xs text-gray-200 flex-shrink-0">2.2 MB</span>
                                        </div>
                                    </div>
                                    <div class="mt-16 flex-align gap-8">
                                        <button type="button"
                                            class="btn btn-main py-8 text-15 fw-normal px-16">Accept</button>
                                        <button type="button"
                                            class="btn btn-outline-gray py-8 text-15 fw-normal px-16">Decline</button>
                                    </div> -->
                                    <span class="text-gray-200 text-13 mt-8"><?=$noft['date'];?></span>
                                </div>
                            </div>
                        
                            <?php endforeach;?>
                        </div>
                       <!--  <a href="#"
                            class="py-13 px-24 fw-bold text-center d-block text-primary-600 border-top border-gray-100 hover-text-decoration-underline">
                            View All </a> -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Notification Start -->

       
    </div>


    <!-- User Profile Start -->
    <div class="dropdown">
        <button
            class="users arrow-down-icon border border-gray-200 rounded-4 p-4 d-inline-block pe-40 position-relative"
            type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="position-relative">
                <img src="<?=($this->user_model->userdata['photo']!=''?$this->user_model->userdata['photo']:get_img('user-img.png'));?>" alt="Image" class="h-32 w-32 rounded-circle">
                <span
                    class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
            <div class="card border border-gray-100 rounded-4 box-shadow-custom">
                <div class="card-body">
                    <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                        <img src="<?=($this->user_model->userdata['photo']!=''?$this->user_model->userdata['photo']:get_img('user-img.png'));?>" alt="" class="w-54 h-54 rounded-circle">
                        <div class="">
                            <h4 class="mb-0"><?=$this->user_model->userdata['firstname'];?> <?=$this->user_model->userdata['lastname'];?></h4>
                            <p class="fw-medium text-13 text-gray-200"><?=$this->user_model->userdata['email'];?></p>
                        </div>
                    </div>
                    <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                        <li class="mb-4">
                            <a href="<?=base_url('profile');?>"
                                class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                <span class="text-2xl text-primary-600 d-flex"><i class="ph ph-gear"></i></span>
                                <span class="text">Hesab Ayarları</span>
                            </a>
                        </li>
                     
                     
                        <li class="pt-8 border-top border-gray-100">
                            <a href="<?=base_url('login/logout');?>"
                                class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15">
                                <span class="text-2xl text-danger-600 d-flex"><i
                                        class="ph ph-sign-out"></i></span>
                                <span class="text">Çıxış</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- User Profile Start -->

</div>
</div>