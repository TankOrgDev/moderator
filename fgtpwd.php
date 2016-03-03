<?php
include_once './libs/const.php';
$_pageid = 115;
?>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Change Password";
        include_once './tags/common/head.php';
        ?>
	<?php include_once './tags/common/scripts.php'; ?>
        <?php include_once('./libs/signup.php');?>
            </head>
    <style type="text/css"></style>
</head>
    <script>
        function showerrormessage(message) {
            $("#message").text(message);
            $("#message").show();
        };
        function validateEmail() 
        {
            var uemail = $("#email").val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!uemail.match(filter)) {
			showerrormessage('Please enter valid email address');
			return false;
			}
			return true;
        };
    </script>
<body >
    <?php include_once './tags/global_header/header.php'; ?>
    <div class="heads" style="background: url(resources/img/bag-banner-1.jpg) center center;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2><span>//</span> Forgot Password.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
            <div class="container">
    <div class='row'>
        <div class='col-sm-4 col-md-offset-4'>
          <form accept-charset="UTF-8" action="" 
                class="" id="fppassword" method="post" onsubmit="return validateEmail()">
              <p class="alert-danger" id="message" >
                <script>
                    showerrormessage
                    (
                    <?php 
                        if($status!='')
                        {
                                if($status[0]['DBStatus']=="0")
                                {
                                        $sql=$status[0]['Message'];
                                        echo "'".$sql."'";
                                }
                                else if($status[0]['DBStatus']=="2")
                                {
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
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>E-mail</label>
                <input class='form-control' type="text" name="email" id="email" size='4' type='text'>
                <input class='form-control' type="hidden" name="action" id="action" value="fpass" size='4' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary submit-button' type='submit'>Send password</button>                
              </div>
            </div>
          </form>
        </div>
    </div>
            </div>
    </div>
</body>

<?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
<?php include_once './tags/common/scripts.php'; ?>

