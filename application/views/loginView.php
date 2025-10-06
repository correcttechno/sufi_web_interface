<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Robot Sufi Control Panel</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=get_img(" logo.png");?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=get_css('bootstrap.min.css');?>">
    <!-- file upload -->
    <link rel="stylesheet" href="<?=get_css('file-upload.css');?>">
    <!-- file upload -->
    <link rel="stylesheet" href="<?=get_css('plyr.css');?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <!-- full calendar -->
    <link rel="stylesheet" href="<?=get_css('full-calendar.css');?>">
    <!-- jquery Ui -->
    <link rel="stylesheet" href="<?=get_css('jquery-ui.css');?>">
    <!-- editor quill Ui -->
    <link rel="stylesheet" href="<?=get_css('editor-quill.css');?>">
    <!-- apex charts Css -->
    <link rel="stylesheet" href="<?=get_css('apexcharts.css');?>">
    <!-- calendar Css -->
    <link rel="stylesheet" href="<?=get_css('calendar.css');?>">
    <!-- jvector map Css -->
    <link rel="stylesheet" href="<?=get_css('jquery-jvectormap-2.0.5.css');?>">
    <!-- Main css -->
    <link rel="stylesheet" href="<?=get_css('main.css');?>">
</head>

<body>

    <!--==================== Preloader Start ====================-->
    <div class="preloader">
        <div class="loader"></div>
    </div>
    <!--==================== Preloader End ====================-->

    <!--==================== Sidebar Overlay End ====================-->
    <div class="side-overlay"></div>
    <!--==================== Sidebar Overlay End ====================-->

    <section class="auth d-flex">

        <div class="auth-right py-40 px-24 flex-center flex-column">
            <div class="auth-right__inner mx-auto w-100">
                <!-- <a href="<?=base_url();?>" class="auth-right__logo">
                    <img height="50" style="height:150px;object-fit:contain" width="200" src="<?=get_img("logo.png");?>" alt="">
                </a> -->
                <h2 class="mb-8">Welcome to Back! &#128075;</h2>
                <p class="text-gray-600 text-15 mb-32">Please sign in to your account and start the working</p>

                <?php if(!empty($message)):?>
                    <div class="alert alert-warning">
                        <?=$message;?>
                    </div>
                <?php endif;?>
                    
                <form action="<?=base_url('login/submit');?>" method="POST">
                    <div class="mb-24">
                        <label for="fname" class="form-label mb-8 h6">Email or Username</label>
                        <div class="position-relative">
                            <input type="text" class="form-control py-11 ps-40" name="username" id="fname"
                                placeholder="Type your username">
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i
                                    class="ph ph-user"></i></span>
                        </div>
                    </div>
                    <div class="mb-24">
                        <label for="current-password" class="form-label mb-8 h6">Current Password</label>
                        <div class="position-relative">
                            <input type="password" class="form-control py-11 ps-40" name="password"
                                id="current-password" placeholder="Enter Current Password" value="">
                            <span
                                class="toggle-password position-absolute top-50 inset-inline-end-0 me-16 translate-middle-y ph ph-eye-slash"
                                id="#current-password"></span>
                            <span class="position-absolute top-50 translate-middle-y ms-16 text-gray-600 d-flex"><i
                                    class="ph ph-lock"></i></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-main rounded-pill w-100">Sign In</button>


                </form>
            </div>
        </div>

        <div class="auth-left bg-main-50 flex-center p-24" style="background-image:url(<?=get_img("login_bg.jpg");?>
            );background-position:center center;background-size:cover">

        </div>
    </section>

    <!-- Jquery js -->
    <script src="<?=get_js('jquery-3.7.1.min.js');?>"></script>
    <!-- Bootstrap Bundle Js -->
    <script src="<?=get_js('boostrap.bundle.min.js');?>"></script>
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
    <!-- apex charts -->
    <script src="<?=get_js('apexcharts.min.js');?>"></script>
    <!-- Calendar Js -->
    <script src="<?=get_js('calendar.js');?>"></script>
    <!-- jvectormap Js -->
    <script src="<?=get_js('jquery-jvectormap-2.0.5.min.js');?>"></script>
    <!-- jvectormap world Js -->
    <script src="<?=get_js('jquery-jvectormap-world-mill-en.js');?>"></script>

    <!-- main js -->
    <script src="<?=get_js('main.js');?>"></script>



</body>

</html>