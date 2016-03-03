<?php
include_once './libs/const.php';
$_pageid = 113;
?>

<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Sign In";
        include_once './tags/common/head.php';
        //include('./libs/login.php'); // Includes Login Script
        ?>
         <?php
            include_once('./libs/login.php');
            //include('./libs/login.php'); // Includes Login Script
        ?>
		<?php include_once './tags/common/scripts.php'; ?>
    </head>
	<style type="text/css">
	</style>
	<script>

  	$(document).ready(function()
        {
            //$("#message").hide();
        });
        function showerrormessage(message) {
            $("#message").text(message);
            $("#message").show();
        }
        function validateform()
        {
            var username = $("#username").val();
            var password = $("#password").val();   
            if(username=='')
            {
                //$("#message").text("Please enter username");
                //$("#message").show();
				showerrormessage("Please enter username");
                return false;
            }
            else if(password=='')
            {
                //$("#message").text("Please enter password");
				showerrormessage("Please enter username");
                return false;
            }
            else if(username=='' || password=='')
            {
                //$("#message").text("Please enter valid credentials");
		showerrormessage("Please enter username");
                return false;
            }
        };
    </script> 
    <style>
        label.invalid
        {
            color: Red;
            padding: 1px;
            font-size: 12px;
            font-weight: normal;
            margin: 0px 0px 0px 45px;
        }
        secHeading{font-size:20px;font-weight:300;word-spacing:normal;letter-spacing:normal}
    </style>
    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="heads" style="background: url(resources/img/bag-banner-1.jpg) center center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><span>//</span> Sign In</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                   <div class="control-group">
                        <div id="loginbox"  class="mainbox  col-md-offset-3 col-md-6">                    
                            <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Sign In</div>
                                </div>     
                                <div style="padding-top:30px" class="panel-body" >
                                    <form id="loginform" class="form-horizontal" action="" method="POST" onsubmit="return validateform()">
                                        <p class="alert-danger" id="message">
                                           <script>
                                                showerrormessage
                                                (
                                                <?php 
                                                        if($status!='')
                                                        {
                                                                if($status[0]['DBStatus']=="0")
                                                                {
                                                                        echo "'"."Sorry technical issue not able to login"."'";
                                                                }
                                                                else if($status[0]['DBStatus']=="2")
                                                                {
                                                                        $abc=$status[0]['Message'];
                                                                        echo "'".$status[0]['Message']."'";
                                                                }
                                                                else
                                                                {
                                                                        echo '';
                                                                }
                                                        }
                                                ?>
                                                );
                                           </script>
                                        </p> 
                                        <div style="margin-bottom: 5px" class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user icon"></i></i></span>
                                            <input id="username" type="text" class="form-control" name="username" value="" placeholder="E-mail or phone">                                        
                                        </div>
                                        <div style="margin-bottom: 2px" class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-key icon"></i></i></span>
                                            <input id="password" type="password" class="form-control" name="password" placeholder="password">
                                            <input id="signin" type="hidden" name="signin" value="Login">
                                        </div>
                                        <div style="margin-top:10px" class="form-group">
                                            <button id="btn-login" type="submit" class="btn btn-success col-md-offset-3 col-md-6">Login</button>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 control">
                                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:100%" >
                                                    Don't have an account! 
                                                    <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                                        Sign Up Here
                                                    </a>
                                                    <div style="float:right; padding-top:0px; font-size:100%"><a href="#">Forgot password?</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>     
                                </div>                     
                            </div>  
                        </div>
                    </div>
            </div>
        </div>
        <?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
