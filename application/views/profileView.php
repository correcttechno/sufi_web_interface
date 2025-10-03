<div class="dashboard-body">
    <!-- Breadcrumb Start -->
    <div class="breadcrumb mb-24">
        <ul class="flex-align gap-4">
            <li><a href="index.html" class="text-gray-200 fw-normal text-15 hover-text-main-600">Home</a></li>
            <li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span> </li>
            <li><span class="text-main-600 fw-normal text-15">Setting</span></li>
        </ul>
    </div>
    <!-- Breadcrumb End -->

    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <div class="cover-img position-relative">
                <!-- <label for="coverImageUpload"
                            class="btn border-gray-200 text-gray-200 fw-normal hover-bg-gray-400 rounded-pill py-4 px-14 position-absolute inset-block-start-0 inset-inline-end-0 mt-24 me-24">
                            Edit
                            Cover
                        </label>-->
                <div class="avatar-upload">
                    <input type='file' id="coverImageUpload" accept=".png, .jpg, .jpeg">
                    <div class="avatar-preview">
                        <div id="coverImagePreview" style="background-image: url('<?=get_img('profile_bg.jpg');?>');">
                        </div>
                    </div>
                </div>
            </div>

            <div class="setting-profile px-24">
                <div class="flex-between">
                    <div class="d-flex align-items-end flex-wrap mb-32 gap-24">
                        <img src="<?=($this->user_model->userdata['photo']!=''?$this->user_model->userdata['photo']:get_img('user-img.png'));?>" alt=""
                            class="w-120 h-120 rounded-circle border border-white">
                        <div>
                            <h4 class="mb-8">
                                <?=$userdata['firstname'];?>
                                <?=$userdata['lastname'];?>
                            </h4>
                            <div class="setting-profile__infos flex-align flex-wrap gap-16">
                               
                                <div class="flex-align gap-6">
                                    <span class="text-gray-600 d-flex text-lg"><i
                                            class="ph ph-calendar-dots"></i></span>
                                    <span class="text-gray-600 d-flex text-15">
                                        <?=$userdata['date'];?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav common-tab style-two nav-pills mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-details-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-details" type="button" role="tab" aria-controls="pills-details"
                            aria-selected="true">Məlumatlarım</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-password" type="button" role="tab" aria-controls="pills-password"
                            aria-selected="false">Şifrə</button>
                    </li>

                </ul>
            </div>

        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <!-- My Details Tab start -->
        <div class="tab-pane fade show active" id="pills-details" role="tabpanel" aria-labelledby="pills-details-tab"
            tabindex="0">
            <div class="card mt-24">
                <div class="card-header border-bottom">
                    <h4 class="mb-4">Şəxsi Məlumatlar</h4>
                    <p class="text-gray-600 text-15">Zəhmət olmasa şəxsi məlumatları düzgün doldurun.</p>
                </div>
                <div class="card-body">
                    <form action="<?=base_url();?>profile/changeUserData" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <label for="firstname" class="form-label mb-8 h6">Ad <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control py-11" id="firstname" name="firstname"
                                    placeholder="Ad" value="<?=$this->user_model->userdata['firstname'];?>">
                                <span data-error="firstname" class="text-xs text-danger"></span>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="lastname" class="form-label mb-8 h6">Soyad <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control py-11" id="lastname" name="lastname"
                                    placeholder="Soyad" value="<?=$this->user_model->userdata['lastname'];?>">
                                <span data-error="lastname" class="text-xs text-danger"></span>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="email" class="form-label mb-8 h6">E-mail <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control py-11" id="email" name="email"
                                    placeholder="E-mail" value="<?=$this->user_model->userdata['email'];?>">
                                <span data-error="email" class="text-xs text-danger"></span>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="phone" class="form-label mb-8 h6">Telefon <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control py-11" id="phone" name="phone"
                                    placeholder="Telefon" value="<?=$this->user_model->userdata['phone'];?>">
                                <span data-error="phone" class="text-xs text-danger"></span>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <label for="address" class="form-label mb-8 h6">Ünvan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control py-11" id="address" name="address"
                                    placeholder="Ünvan" value="<?=$this->user_model->userdata['address'];?>">
                                <span data-error="address" class="text-xs text-danger"></span>
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <label for="birthday" class="form-label mb-8 h6">Doğum tarixi <span
                                        class="text-danger">*</span></label>
                                <input type="date" class="form-control py-11" id="birthday" name="birthday"
                                    placeholder="Doğum tarixi" value="<?=$this->user_model->userdata['birthday'];?>">
                                <span data-error="birthday" class="text-xs text-danger"></span>
                            </div>
                            <div class="col-sm-3 col-xs-3">
                                <label for="birthday" class="form-label mb-8 h6">Cins <span
                                        class="text-danger">*</span></label>
                                <select class="form-control py-11" id="gender" name="gender">
                                    <option <?=($this->user_model->userdata['gender']=="male"?"selected":"");?>
                                        value="male">Kişi</option>
                                    <option <?=($this->user_model->userdata['gender']=="female"?"selected":"");?>
                                        value="female">Qadın</option>
                                </select>
                                <span data-error="gender" class="text-xs text-danger"></span>
                            </div>


                            <div class="col-12">
                                <label for="imageUpload" class="form-label mb-8 h6">Your Photo</label>
                                <div class="flex-align gap-22">
                                    <div class="avatar-upload flex-shrink-0">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="image">
                                       
                                    </div>
                                    <div
                                        class="avatar-upload-box text-center position-relative flex-grow-1 py-24 px-4 rounded-16 border border-main-300 border-dashed bg-main-50 hover-bg-main-100 hover-border-main-400 transition-2 cursor-pointer">
                                        <label for="imageUpload"
                                            class="position-absolute inset-block-start-0 inset-inline-start-0 w-100 h-100 rounded-16 cursor-pointer z-1"></label>
                                        <span class="text-32 icon text-main-600 d-inline-flex"><i
                                                class="ph ph-upload"></i></span>
                                        <span class="text-13 d-block text-gray-400 text my-8">Click to upload or
                                            drag and drop</span>
                                        <span class="text-13 d-block text-main-600">SVG, PNG, JPEG OR GIF (max
                                            1080px1200px)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 text-danger h6" data-error="message"></div>
                            <div class="col-6">
                                <div class="flex-align justify-content-end gap-12 mt-10">
                                    <button type="submit" class="btn btn-main rounded-pill py-9">Düzəlişləri
                                        saxla</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- My Details Tab End -->


        <!-- Password Tab Start -->
        <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab"
            tabindex="0">
            <div class="card mt-24">
                <div class="card-header border-bottom">
                    <h4 class="mb-4">Şifrəni dəyiş</h4>
                    <p class="text-danger-600 text-15">Zəhmət olmasa yeni şifrənizi unutmayın !</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?=base_url();?>profile/changePassword" method="post">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <label for="current-password" class="form-label mb-8 h6">Mövcut şifrə</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control py-11" id="current-password"
                                                name="currentpass" placeholder="Mövcut şifrə">
                                            <span
                                                class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash"
                                                id="#current-password"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="new-password" class="form-label mb-8 h6">Yeni şifrə</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control py-11" id="new-password"
                                                name="pass" placeholder="Yeni şifrə">
                                            <span
                                                class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash"
                                                id="#new-password"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="confirm-password" class="form-label mb-8 h6">Təkrar yeni
                                            şifrə</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control py-11" id="confirm-password"
                                                name="retrypass" placeholder="Təkrar yeni şifrə">
                                            <span
                                                class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash"
                                                id="#confirm-password"></span>
                                        </div>
                                    </div>

                                    <div class="col-12 text-danger" data-error="message"></div>

                                </div>

                                <div class="col-12 mt-20">
                                    <div class="gap-8">
                                        <button type="submit" class="btn btn-main rounded-pill py-9">
                                            Şifrəni yadda saxla
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Password Tab End -->



    </div>
</div>