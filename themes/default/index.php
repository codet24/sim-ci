 <!-- <?php echo theme_view('header'); ?>   -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('themes/adminpress/') ?>assets/images/favicon.png">
    <title> Sistem Informasi Management </title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('themes/adminpress/') ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('themes/adminpress/') ?>css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('themes/adminpress/') ?>css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<!-- <div class="container-fluid"> -->

<!-- Start of Main Container -->
    <?php
    echo Assets::js('modernizr-2.5.3.js');
    // echo theme_view('_sitenav');

    echo Template::message();
   echo isset($content) ? $content : Template::content();


    // echo theme_view('footer');


    ?>

  <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url('themes/adminpress/') ?>js/custom.min.js"></script>

    <!-- ajax offline -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/ajax-2.5.0.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('themes/adminpress/') ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <script type="text/javascript">
            $(document).ready(function() {
                $('#selectSubDistrict').change(function(){
                    var value = $(this).val();
                    if (value>0){
                        $.ajax({
                            type:"POST",
                            data:{id:value},
                            url: "<?php echo base_url('tjsl/get_kelurahan') ?>",
                            success: function(res) {
                                $("#SelectSubSubDistrict").html(res);
                            }
                        });
                    }
                });
            });
            </script>

</body>

</html>
