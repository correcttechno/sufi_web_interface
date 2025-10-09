<div class="dashboard-body">

    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb mb-24">
            <ul class="flex-align gap-4">
                <li><span class="text-main-600 fw-normal text-20">Dialoqlar</span></li>
            </ul>
        </div>
        <!-- Breadcrumb End -->

        <!-- Breadcrumb Right Start -->
        <?php if($this->user_model->userdata['status']!='vizitor'):?>
        <div class="flex-align gap-8 flex-wrap">
            <button type="button" class="btn btn-main text-sm btn-sm px-24 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addModal">
                <i class="ph ph-plus me-4"></i>
                Əlavə et
            </button>
        </div>
        <?php endif;?>
        <!-- Breadcrumb Right End -->

    </div>


    <div class="card overflow-hidden">
        <div class="card-body p-0">

            <?php if($results):?>
            <table class="table table-striped dataTable">
                <thead>
                    <tr>
                        <th class="fixed-width">
                            <div class="form-check">
                                <input class="form-check-input border-gray-200 rounded-4" type="checkbox"
                                    id="selectAll">
                            </div>
                        </th>
                        <th class="h6 text-gray-300">Sual</th>
                        <th class="h6 text-gray-300">Cavab</th>
                        <th class="h6 text-gray-300">Səs</th>
                        <th class="h6 text-gray-300">Hərəkət</th>
                        <th class="h6 text-gray-300">Əməliyyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $r):?>
                    <tr>
                        <td class="fixed-width">
                            <div class="form-check">
                                <input class="form-check-input border-gray-200 rounded-4" type="checkbox">
                            </div>
                        </td>
                        <td>
                            <span class="mb-0 text-gray-300">
                                <?=$r['question'];?>
                            </span>
                        </td>
                        <td>
                            <span class="mb-0 text-gray-300">
                                <?=$r['answer'];?>
                            </span>
                        </td>

                        <td>
                            <?php if(!empty($r['sound'])):?>
                            <button data-src="<?=$r['sound'];?>" class="play-sound mt-30 flex-shrink-0 w-40 h-40 flex-center bg-main-two-600 text-white text-xl"><i class="ph-fill ph-play"></i></button>
                            <?php endif;?>
                        </td>

                        <?php $action=$this->actions_model->read_row($r['action_id']);?>

                        <td>
                            <?php if($action):?>
                            <span class="text-13 py-2 px-10 rounded-pill bg-success-50 text-success-600 mb-16">
                                <?=$action['title'];?>
                            </span>
                            <?php endif;?>
                        </td>


                        <td>
                        <?php if($this->user_model->userdata['status']!='vizitor'):?>
                            <button data-delete-id="<?=$r['id'];?>"
                                class="w-40 h-40 bg-danger-50 rounded-circle hover-bg-danger-100 transition-2">
                                <i class="ph ph-trash text-danger-700"></i>
                            </button>
                            <button data-edit-id="<?=$r['id'];?>"
                                class=" w-40 h-40 bg-main-50 rounded-circle hover-bg-main-100 transition-2">
                                <i class="ph ph-pencil-simple text-main-700"></i>
                            </button>
                        <?php endif;?>
                        </td>
                    </tr>

                    <?php endforeach;?>

                </tbody>
            </table>
            <?php else:?>
            <div class="p-lg-20 p-sm-3">
                <div class="alert alert-info">

                    <p><i class="ph-fill ph-info"></i>Məlumat tapılmadı</p>
                </div>
            </div>
            <?php endif;?>
        </div>

    </div>


</div>


<?php if($this->user_model->userdata['status']!='vizitor'):?>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni dialoq yarat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="<?=base_url('conversations/add');?>" method="post">
                    <div class="row">
                        <input type="hidden" name="id" value="0"/>
                        <div class="col-12">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Sual:<span class="text-danger">*</span>
                            </label>
                            <input type="text" name="question" class="form-control radius-8" placeholder="Sual">
                            <span data-error="question" class="text-xs text-danger"></span>
                        </div>

                        <div class="col-10">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Cavab:<span class="text-danger">*</span>
                            </label>
                            <textarea type="text" id="answer" name="answer" class="form-control radius-8" placeholder="Cavab"></textarea>
                            <span data-error="answer" class="text-xs text-danger"></span>
                        </div>

                        <div class="col-2">
                            <input type="hidden" name="sound" value=""/>
                            <button id="ai_generate" class="mt-30 flex-shrink-0 w-48 h-48 flex-center rounded-circle bg-main-two-600 text-white text-2xl"><i class="ph-fill ph-atom"></i></button>
                        </div>

                         <div class="col-12">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Hərəkət:
                            </label>
                            <select type="text" name="action_id" class="form-control radius-8" placeholder="Sual">
                                <option value="0">--seçim--</option>
                                <?php foreach($actions as $a):?>
                                    <option value="<?=$a['id'];?>"><?=$a['title'];?></option>
                                <?php endforeach;?>
                            </select>
                            <span data-error="action_id" class="text-xs text-danger"></span>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-8 mt-24">
                            <button type="reset"
                                class="btn bg-danger-600 hover-bg-danger-800 border-danger-600 hover-border-danger-800 text-md px-24 py-12 radius-8">
                                Ləğv et
                            </button>
                            <button type="submit"
                                class="btn bg-main-600 hover-bg-main-800 border-main-600 hover-border-main-800 text-md px-24 py-12 radius-8">
                                Saxla
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->modal_model->delete("conversations");?>
<?php endif;?>