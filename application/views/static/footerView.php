<div class="dashboard-footer d-print-none">
        <input type="hidden" id="base_url" value="<?=base_url($_SERVER['REQUEST_URI']);?>"/>
        <div class="flex-between flex-wrap gap-16">
            <p class="text-gray-300 text-13 fw-normal"> &copy; <?=date('Y');?>, All Right Reserverd</p>
            <div class="flex-align flex-wrap gap-16">
                <a href="https://www.correcttechno.com/" target="_blank"
                    class="text-gray-300 text-13 fw-normal hover-text-main-600 hover-text-decoration-underline">
                    
                    Created By Correct Technology
                </a>
                
            </div>
        </div>
    </div>


</div>
      <!-- Jquery js -->
    <script src="<?=get_js('jquery-3.7.1.min.js');?>"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="<?=get_js('boostrap.bundle.min.js');?>"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Phosphor Js -->
    <script src="<?=get_js('phosphor-icon.js');?>"></script>
    <!-- file upload -->
    <script src="<?=get_js('file-upload.js');?>"></script>
    <!-- file upload -->
    <script src="<?=get_js('plyr.js');?>"></script>
    <!-- dataTables -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <!-- full calendar -->
    <script src="<?=get_js('full-calendar.js');?>"></script>
    <!-- jQuery UI -->
    <script src="<?=get_js('jquery-ui.js');?>"></script>
    <!-- jQuery UI -->
    <script src="<?=get_js('editor-quill.js');?>"></script>
    <!-- jvectormap Js -->
    <script src="<?=get_js('jquery-jvectormap-2.0.5.min.js');?>"></script>
    <!-- jvectormap world Js -->
    <script src="<?=get_js('jquery-jvectormap-world-mill-en.js');?>"></script>
    <!-- jquery form Js -->
    <script src="<?=get_js('jquery.form.js');?>"></script>
    <!-- Bootstrap select Js -->
    <script src="<?=get_js('bootstrap-select.js');?>"></script>
    <!-- Moment.js CDN Linki -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!--read more js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.0.2/readmore.min.js" integrity="sha512-llWtDR3k09pa9nOBfutQnrS2kIEG7M6Zm7RIjVVLNab1wRs8NUmA0OjAE38jKzKeCg+A3rdq8AVW41ZTsfhu5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <!-- main js -->
    <script src="<?=get_js('main.js');?>"></script>




    

    <script>    

    
        // Table Header Checkbox checked all js Start
        $('#selectAll').on('change', function () {
            $('.form-check .form-check-input').prop('checked', $(this).prop('checked')); 
        }); 
    
        // Data Tables
        new DataTable('#assignmentTable', {
            searching: false,
            lengthChange: false,
            info: false,   // Bottom Left Text => Showing 1 to 10 of 12 entries
            paging: false,
            "columnDefs": [
                { "orderable": false, "targets": [0,6] } // Disables sorting on the 7th column (index 6)
            ]
        });
    </script>
    
    </body>
</html>