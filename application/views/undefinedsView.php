<div class="dashboard-body">

    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb mb-24">
            <ul class="flex-align gap-4">
                <li><span class="text-main-600 fw-normal text-20">Bilinməyən Cümlələr</span></li>
            </ul>
        </div>
        <!-- Breadcrumb End -->

        <!-- Breadcrumb Right Start -->
        <?php if($this->user_model->userdata['status']!='vizitor'):?>
        <!-- <div class="flex-align gap-8 flex-wrap">
            <button type="button" class="btn btn-main text-sm btn-sm px-24 rounded-pill" data-bs-toggle="modal"
                data-bs-target="#addModal">
                <i class="ph ph-plus me-4"></i>
                Əlavə et
            </button>
        </div> -->
        <?php endif;?>
        <!-- Breadcrumb Right End -->

    </div>


    <div class="card overflow-hidden">
        <div class="card-body p-0">

            <?php if($results):?>
            <table id="assignmentTable" class="table table-striped">
                <thead>
                    <tr>
                        <th class="fixed-width">
                            <div class="form-check">
                                <input class="form-check-input border-gray-200 rounded-4" type="checkbox"
                                    id="selectAll">
                            </div>
                        </th>
                        <th class="h6 text-gray-300">Сümlə</th>
                        <th class="h6 text-gray-300">Tarix</th>
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
                                <?=$r['word'];?>
                            </span>
                        </td>
                        <td>
                            <span class="mb-0 text-gray-300">
                                <?=$r['date'];?>
                            </span>
                        </td>


                        <td>
                        <?php if($this->user_model->userdata['status']!='vizitor'):?>
                            <button data-delete-id="<?=$r['id'];?>"
                                class="w-40 h-40 bg-danger-50 rounded-circle hover-bg-danger-100 transition-2">
                                <i class="ph ph-trash text-danger-700"></i>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Yeni proqram yarat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-24">
                <form action="<?=base_url('undefineds/add');?>" method="post">
                    <div class="row">
                        <div class="col-12 mb-20">
                            <input type="hidden" name="id" value="0"/>

                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Proqram adı:<span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title" class="form-control radius-8" placeholder="Proqram adı">
                            
                            <span data-error="title" class="text-xs text-danger"></span>
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

<?php $this->modal_model->delete("undefineds");?>
<?php endif;?>