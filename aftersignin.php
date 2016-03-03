<?php
include_once './libs/const.php';
$_pageid = 112;
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Request Service";
        include_once './tags/common/head.php';
        ?>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
    </head>

    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                            <div style="margin-top: 60px"></div>
                    </div>
                </div>
				<?php
                                $status=$_GET["status"];
                                if($status=="JP")
                                {
                                 $value=false;
                                $value1=false;
                                $included_files=get_included_files();
                                foreach ($included_files as $filename) {
                                $pieces = explode("\\", $filename);
                                $value=in_array("sendmail.php", $pieces);
                                if($value==true)
                                {
                                    $value1=true;
                                };
                                };
                                if(!$value1)
                                    include '.\sendmail.php';
                                                              
                                ?>
                                    <div class="row padd20-top-btm">
                                    <div class="col-md-12 text-center">
                                    <h4>
                                            Thank you for joining with us. 
                                    </h4>
                                    <p>
                                            Our team will verify and confirm your registration details . 
                                            We will update your registration confirmation , after your registration is confirmed you can continue with helping blind.
                                    </p>
                                    <div class="col-md-12">
                                    </div>
                                    </div>
                                    </div>
                                <?php
                                session_start();
                                $vid=$_SESSION['vid'];
                                mailto(1,$vid);
                                }
                                else if($status=="JF")
                                {
                                ?>
                                    <div class="row padd20-top-btm">
                                    <div class="col-md-12 text-center">
                                    <h4>
                                        Sorry failed to do registration
                                    </h4>
                                    <p>
                                        Please try after some time. 
                                        Our team will get it fixed. For further assistance contact us.
                                    </p>
                                    <div class="col-md-12">
                                    </div>
                                    </div>
                                    </div>
                                <?php
                                }
                                else if($status=="CP")
                                {
                                ?>
                                    <div class="row padd20-top-btm">
                                    <div class="col-md-12 text-center">
                                    <h4>
                                        Password changed successfully.
                                    </h4>
                                    <p>
                                        Please login with new password.
                                    </p>
                                    <div class="col-md-12">
                                    </div>
                                    </div>
                                    </div>
                                <?php
                                }
                                else if($status=="CF")
                                {
                                ?>
                                    <div class="row padd20-top-btm">
                                    <div class="col-md-12 text-center">
                                    <h4>
                                        Sorry failed to do update password
                                    </h4>
                                    <p>
                                        Please try after some time. 
                                        Our team will get it fixed. For further assistance contact us.
                                    </p>
                                    <div class="col-md-12">
                                    </div>
                                    </div>
                                    </div>
                                <?php
                                }
                                else if($status=="FP")
                                {
                                $value=false;
                                $value1=false;
                                $included_files=get_included_files();
                                foreach ($included_files as $filename) {
                                $pieces = explode("\\", $filename);
                                $value=in_array("sendmail.php", $pieces);
                                if($value==true)
                                {
                                    $value1=true;
                                };
                                };
                                if(!$value1)
                                    include '.\sendmail.php';
                                ?>
                                    <div class="row padd20-top-btm">
                                    <div class="col-md-12 text-center">
                                    <h4>
                                        Password reset link sent to your email ID
                                    </h4>
                                    <p>
                                        Please rest your password.
                                    </p>
                                    <div class="col-md-12">
                                    </div>
                                    </div>
                                    </div>
                                <?php
                                $email=$_GET["email"];
                                mailto(5,$email);
                                }
                                else if($status=="FF")
                                {
                                ?>
                                    <div class="row padd20-top-btm">
                                    <div class="col-md-12 text-center">
                                    <h4>
                                        Sorry email is not not correct.
                                    </h4>
                                    <p>
                                        Plesae enter correct email ID
                                    </p>
                                    <div class="col-md-12">
                                    </div>
                                    </div>
                                    </div>
                                <?php
                                }
                                else
                                {
                                    
                                }
                    //include './tags/user/usersignup.php';
                            ?>
			</div>
		</div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </body>
</html>
