<div class="dashboard-body">


    <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
        <!-- Breadcrumb Start -->
        <div class="breadcrumb mb-24 d-print-none">
            <ul class="flex-align gap-4">
                <li>
                    <span class="text-main-600 fw-normal text-20">
                    Dərs cədvəliniz
                    </span>
                </li>
            </ul>
        </div>
        <!-- Breadcrumb End -->

        <!-- Breadcrumb Right Start -->
        <div class="flex-align gap-8 flex-wrap">
            
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
                        
            <?php if(false):?>
            <button type="button" class="btn btn-main text-sm btn-sm px-24 rounded-4 d-print-none" data-bs-toggle="modal"
                data-bs-target="#addModal">
                <i class="ph ph-plus me-4"></i>
                Əlavə et
            </button>
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

