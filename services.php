<?php
include_once './libs/const.php';
$_pageid = 6;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $_TITLE = "About Us";
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
                            <li class="active">Services</li>
                        </ol>
                    </div>
                </div>
                <div class="row padd20-top-btm">
                    <div class="col-md-12 t-center">
                        <h3>Become a sighted volunteer</h3>
                        <p>
                            Blinx could not exist without sighted volunteers. If you have time, help today.
                        </p>
                    </div>
                </div>
                <div class="row padd20-top-btm">
                    <div class="col-md-12 t-center">
                        <h3>Donate to the project</h3>
                        <p>
                            If you want to help us reach millions of people, who are estimated to be visually impaired worldwide, you can donate to the project.
                        </p>
                    </div>
                </div>
                <div class="row padd20-top-btm">
                    <div class="col-md-12 t-center">
                        <h3>Register to ask for a help</h3>
                        <p>
                            Blinx could not exist without people asking for help. If you need help register TODAY! Its free.
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <a href="<?php echo URL_SEARCH ?>" class="btn btn-lg sr-explor">Explore..</a>
                        </center>
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