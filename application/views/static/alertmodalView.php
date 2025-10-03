<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-dialog modal-dialog-centered">
        <div class="modal-content radius-16 bg-base">
            
            <div class="modal-body p-24">
                <form action="<?=base_url($url);?>" method="post">
                    <div class="row">
                        <div class="col-12 mb-20 text-center">
                           <p><?=$content;?></p>
                           <input type="hidden" name="a_id" value="0"/>
                           <input type="hidden" name="b_id" value="0"/>
                           <input type="hidden" name="c_id" value="0"/>
                           <input type="hidden" name="d_id" value="0"/>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-center gap-8 mt-24">
                            <button type="reset"
                                class="btn bg-danger-600 hover-bg-danger-800 border-danger-600 hover-border-danger-800 text-md px-24 py-12 radius-8">
                                <?=$error;?>
                            </button>
                            <button type="submit"
                                class="btn bg-main-600 hover-bg-main-800 border-main-600 hover-border-main-800 text-md px-24 py-12 radius-8">
                                <?=$success;?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>