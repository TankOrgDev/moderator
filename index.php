<?php
include_once './libs/const.php';
$_pageid = 3;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $_TITLE = "Blinx Home page";
        //var_dump($_SESSION['login_user']);
        include_once './tags/common/head.php';
        ?>
    </head>
    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <div id="tagline">
            <div class="container">
                <div class="row">
                </div>
            </div>
        </div>
        <?php include_once './tags/home/service.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <?php include_once './tags/home/testimonials.php'; ?>
                </div>
                <!--<div class="col-sm-6">
                    <?php include_once './tags/home/twitter.php'; ?>
                </div>-->
            </div>
        </div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </body>
</html>