<?php
include_once './libs/const.php';
$_pageid = 2;
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Request Service";
        include_once './tags/common/head.php';
        ?>
    </head>

    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="heads" style="background: url(resources/img/bag-banner-1.jpg) center center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><span>//</span> How it works</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo URL_HOME ?>">Home</a></li>
                            <li class="active">How it works</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3>Purpose</h3>
                        <p>Blinx, the Web and Mobile Technology based service to Blind and volunteers, help both the volunteers and the blind to get mutual benefits.  Through BLINX, the volunteers get the opportunity to offer their service and the blind too can easily access the services of the volunteers.
                        </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <img src="resources/photo/1.jpg" class="img-responsive img-rounded" alt="assisting blind person">
                    </div>
                </div>

                <div class="row padd20-top-btm">
                    <div class="col-md-4 col-sm-4">
                        <img src="resources/photo/2.png" class="img-responsive img-rounded" alt="helping student to study">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3>Functionality</h3>

                        <p><ol><li>Volunteer can view history of help requests he served.</li>
                            <li>Volunteer can cancel accepted requests.</li>
                            <li>Volunteer can give his feedback.</li>
                            <li>A volunteer has direct access to blind.</li>
                            <li>Volunteer can offer the service basing on his/her convenient location , time and expertise.</li><li>A blind will get a suitable volunteer according to his requirement.</li></ol>


                        </p>
                    </div>
                </div>

                <div class="row padd20-top-btm">
                    <div class="col-md-12 text-center">
                        <h3>Result</h3>
                        <p><li>A blind will get a suitable volunteer according to his requirement.</li>
                        <li>A volunteer has direct access to blind.</li>
                        <li>Volunteer can offer the service based as per his/her convenient location , time and expertise.</li>
                        Hence it is proved with the help of blinx  "A blind can get assistant for his necessities  and his network will grow by connecting with different volunteers."


                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </body>
</html>