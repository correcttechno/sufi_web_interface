<div class="dashboard-body">


    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb mb-24 d-print-none">
            <ul class="flex-align gap-4">
                <li>
                    <span class="text-main-600 fw-normal text-20">
                    Qruplar üzrə cədvəl <span class="text-white text-14 px-5 bg-success-600 transition-2 rounded-10 text-xl">
                    <?=$this->groups_model->groupTypes[$groupType];?> </span>
                    </span>
                </li>
            </ul>
        </div>
        <!-- Breadcrumb End -->

        <!-- Breadcrumb Right Start -->
        <div class="flex-align gap-8 flex-wrap">
            <?php if($groups):?>
            <div class="position-relative text-gray-500 flex-align gap-4 text-13">
                <span class="text-inherit">Qrup: </span>
                <div
                    class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-10 focus-border-main-600 bg-white">
                    <span class="text-lg"><i class="ph ph-caret-down"></i></span>
                    <select id="group"
                        class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">
                        <?php foreach ($groups as $group) : ?>
                        <option  <?=$selectGroup==$group['id']?'selected':'';?> value="<?=$group['id']; ?>">
                            <?=$group['title'];?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="position-relative text-gray-500 flex-align gap-4 text-13">
                <span class="text-inherit">Həftə: </span>
                <div
                    class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-10 focus-border-main-600 bg-white">
                    <span class="text-lg"><i class="ph ph-caret-down"></i></span>

                    <select id="weektype"
                        class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">
                        <option <?=$selectWeekType=='top'?'selected':'';?> value="top">Üst Həftə</option>
                        <option <?=$selectWeekType=='bottom'?'selected':'';?> value="bottom">Alt Həftə</option>
                    </select>
                </div>
            </div>
                        
            <?php if($this->user_model->userdata['status']!='vizitor'):?>
            <button type="button" class="btn btn-main text-sm btn-sm px-24 rounded-4 d-print-none" data-bs-toggle="modal"
                data-bs-target="#addModal">
                <i class="ph ph-plus me-4"></i>
                Əlavə et
            </button>
            <?php endif;?>

            <?php endif;?>

            <button type="button" class="btn btn-success text-sm btn-sm px-24 rounded-4 d-print-none" id="print_btn">
                <i class="ph ph-printer"></i>
                Çap et
            </button>
            
        </div>
        <!-- Breadcrumb Right End -->

    </div>




    <!-- Recommended Start -->
    <div class="card mt-24 bg-transparent">
        <div class="card-body p-0">
            <div id='wrap'>
                <div id='calendar' class="position-relative">

                </div>
                <div style='clear:both'></div>
            </div>
        </div>
    </div>
    <!-- Recommended End -->
</div>

<?php if($this->user_model->userdata['status']!='vizitor'):?>
<div class="modal fade" id="blockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xs modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content radius-16 bg-base">
            <div class="modal-body">
                <button style="float:right" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="col-12 content"></div>
                </div>
            </div>

            <div class="modal-footer">
                    <div class="d-flex align-items-center justify-content-center gap-8">
                      <!--   <button id="edit_event"
                                class="btn btn-xs bg-warning-600 hover-bg-warning-800 border-warning-600 hover-border-warning-800 text-md px-24 py-12 radius-4">
                                Redaktə et
                        </button> -->
                        <button id="delete_event" class="btn btn-xs bg-danger-600 hover-bg-danger-800 border-danger-600 hover-border-danger-800 text-md px-24 py-12 radius-4">
                        <i class="ph ph-trash text-white"></i>
                                Sil
                       </button>
                    </div>
            </div>


        </div>
  </div>
</div>



<div class="modal fade" id="addModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni dərs əlavə et</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="<?=base_url('dashboard/add');?>" method="post">

                    <input type="hidden" name="group_id" value="<?=$selectGroup;?>">
                    <input type="hidden" name="weektype" value="<?=$selectWeekType;?>">
                    <div class="row">

                        <div class="col-6 mb-10">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Fənn: <span class="text-danger">*</span>
                            </label>
                            <?php if($subjects): ?>
                            <select name="subject_id" id="subject_id" type="text" class="selectpicker2 form-control radius-4 text-14"
                                placeholder="Fənn">
                                <?php foreach ($subjects as $t) : ?>
                                <option value="<?=$t['id']; ?>">
                                    <?=$t['title'];?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?php endif;?>
                        </div>

                        <div class="col-6 mb-10">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Dərsin növü: <span class="text-danger">*</span>
                            </label>
                            <select name="type" id="type" type="text" class="form-control radius-4 text-14">
                                <?php foreach($this->subjects_model->types as $key=>$value):?>
                                    <option value="<?=$key;?>"><?=$value;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>


                        <div class="col-4 mb-10">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Həftənin günü: <span class="text-danger">*</span>
                            </label>

                            <select name="day" type="text" class="form-control radius-4 text-14"
                                placeholder="Həftənin günü">
                                <option value="1">Bazar ertəsi</option>
                                <option value="2">Çərşənbə axşamı</option>
                                <option value="3">Çərşənbə</option>
                                <option value="4">Cümə axşamı</option>
                                <option value="5">Cümə</option>
                            </select>
                        </div>

                        <div class="col-4 mb-10">
                            <label for="startDate" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                Başlama Saatı <span class="text-danger">*</span>
                            </label>
                            <div class=" position-relative">
                                <select name="start" class="form-control radius-4 bg-base" id="startDate">
                                    <?php for($i=8;$i<=21;$i++): ?>
                                        <option value="<?=$i;?>:00"><?=$i;?>:00</option>
                                        <?php for($n=5;$n<=55;$n+=5): if($n==5){$n='05';}?>
                                            <option value="<?=$i.':'.$n;?>"><?=$i.':'.$n;?></option>
                                        <?php endfor;?>
                                    <?php endfor;?>
                                </select>
                                <span
                                    class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"></span>
                            </div>
                        </div>
                        <div class="col-4 mb-10">
                            <label for="endDate" class="form-label fw-semibold text-primary-light text-sm mb-8 text-14">
                                Bitmə Saatı <span class="text-danger">*</span>
                            </label>
                            <div class=" position-relative">
                                <select name="end" class="form-control radius-4 bg-base" id="endDate">
                                    <?php for($i=8;$i<=21;$i++): ?>
                                        <option value="<?=$i;?>:00"><?=$i;?>:00</option>
                                        <?php for($n=5;$n<=55;$n+=5): if($n==5){$n='05';}?>
                                            <option value="<?=$i.':'.$n;?>"><?=$i.':'.$n;?></option>
                                        <?php endfor;?>
                                    <?php endfor;?>
                                </select>
                                <span
                                    class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1"></span>
                            </div>
                        </div>

                        <div class="col-6 mt-10">
                            <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                <input class="form-check-input" type="checkbox" role="switch" id="dvider" name="dvider" value="true">
                                <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                    for="switch2">Qrupu böl</label>
                            </div>
                        </div>

                        <div class="col-6 mt-10">
                            <div class="form-switch switch-primary d-flex align-items-center gap-8 mb-16">
                                <input class="form-check-input" type="checkbox" role="switch" id="switch2" name="merge" value="true">
                                <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                    for="switch2">Patok dərs olaraq işarələ</label>
                            </div>
                        </div>


                        <div class="col-6 mb-10">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Müəllim: <span class="text-danger">*</span>
                            </label>
                            <select name="teacher_id" id="teacher_id" type="text" class="form-control radius-4 text-14"
                                placeholder="Müəllim">
                               
                            </select>
                        </div>


                        <div class="col-6 mb-10">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Auditoriya: <span class="text-danger">*</span>
                            </label>
                            
                            <?php if($audiences):?>
                            <select name="audience_id" type="text" class="form-control radius-4 text-14 selectpicker2"
                                placeholder="Auditoriya">
                                <option value="0">--seçim--</option>
                                <?php foreach ($audiences as $t) : ?>
                                <option value="<?=$t['id']; ?>">
                                    <?=$t['title'];?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?php endif;?>
                        </div>

                        <!--ikinci qrup-->
                        <div class="col-6 mb-10 d-none group2">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Müəllim:
                            </label>
                            <select name="teacher_id2" id="teacher_id2" type="text" class="form-control radius-4 text-14"
                                placeholder="Müəllim">
                               
                            </select>
                        </div>


                        <div class="col-6 mb-10 d-none group2">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Auditoriya:
                            </label>
                            
                            <?php if($audiences):?>
                            <select name="audience_id2" type="text" class="form-control radius-4 text-14 selectpicker2"
                                placeholder="Auditoriya">
                                <option value="0">--seçim--</option>
                                <?php foreach ($audiences as $t) : ?>
                                <option value="<?=$t['id']; ?>">
                                    <?=$t['title'];?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?php endif;?>
                        </div>


                         <!--ucuncu qrup-->
                         <div class="col-6 mb-10 d-none group2">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Müəllim:
                            </label>
                            <select name="teacher_id3" id="teacher_id2" type="text" class="form-control radius-4 text-14"
                                placeholder="Müəllim">
                               
                            </select>
                        </div>


                        <div class="col-6 mb-10 d-none group2">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Auditoriya:
                            </label>
                            
                            <?php if($audiences):?>
                            <select name="audience_id3" type="text" class="form-control radius-4 text-14 selectpicker2"
                                placeholder="Auditoriya">
                                <option value="0">--seçim--</option>
                                <?php foreach ($audiences as $t) : ?>
                                <option value="<?=$t['id']; ?>">
                                    <?=$t['title'];?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <?php endif;?>
                        </div>

                        

                        <div class="col-12 mb-10">
                            <label for="desc"
                                class="form-label fw-semibold text-primary-light text-sm mb-8">Qeyd</label>
                            <textarea class="form-control text-14" id="desc" name="note" rows="4" cols="50"
                                placeholder="Qeyd"></textarea>
                            <span data-error="msg" class="text-xs text-danger"></span>
                        </div>


                        <div class="d-flex align-items-center justify-content-center gap-8 mt-24">
                            <button type="reset"
                                class="btn bg-danger-600 hover-bg-danger-800 border-danger-600 hover-border-danger-800 text-md px-24 py-12 radius-4">
                                Ləğv et
                            </button>
                            <button type="submit"
                                class="btn bg-main-600 hover-bg-main-800 border-main-600 hover-border-main-800 text-md px-24 py-12 radius-4">
                                Saxla
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php $this->modal_model->delete("dashboard");?>
<?php endif;?>