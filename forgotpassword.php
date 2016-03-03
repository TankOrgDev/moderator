<?php
include_once './libs/const.php';
$_pageid = 115;
$vid=$_GET['vid'];
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
        function validatePassword() 
        {
            var pwd = $("#pwd").val();
            var cpwd=$("#cnpwd").val();
            var error = "";
            var illegalChars = /[\W_]/; // allow only letters and numbers
            var re = /[0-9]/;
            var small = /[a-z]/;
            var caps = /[A-Z]/;
            if (pwd == "") {
                error = "Please enter new password.\n";
                showerrormessage(error);
                return false;

            }else if (cpwd == "") {
                error = "Please enter confirm password.\n";
                showerrormessage(error);
                return false;

            }
            else if ((pwd.length < 5) || (pwd.length > 15)) {
                error = "Password must contain at least six characters! \n";
                showerrormessage(error);
                return false;

            } else if (!re.test(pwd)) {
                error = "password must contain at least one number (0-9)!\n";
                showerrormessage(error);
                return false;

            } else if (!small.test(pwd)) {
                error = "password must contain at least one lowercase letter (a-z)!\n";
                showerrormessage(error);
                return false;

            }else if (!caps.test(pwd)) {
                error = "password must contain at least one uppercase letter (A-Z)\n";
                showerrormessage(error);
                return false;
            }
            else if(cpwd!=pwd)
            {
                error = "password and confirm password didn't match\n";
                showerrormessage(error);
                return false;
            }
            else 
            {
                return true;
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
                    <h2><span>//</span> Reset Password.</h2>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-4 col-md-offset-4'>
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
          <form accept-charset="UTF-8" action="" 
                class="" id="changepassword" method="post" onsubmit="return validatePassword()">
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>New password</label>
                <input autocomplete='off'name="pwd" type="Password" id="pwd" class='form-control card-number' size='20' type='text'>
              </div>    
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Confirm password</label>
                <input autocomplete='off' name="cnpwd" type="Password" id="cnpwd" class='form-control' size='20' type='text'>
                <input id="action" type="hidden" name="action" value="passreset">
                <input id="vid" type="hidden" type="text" name="vid" value="<?php echo $vid ?>">
              </div>
            </div>    
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary submit-button' type='submit'>Reset password</button>                
              </div>
            </div>
          </form>
        </div>
    </div>
</body>

<?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
<?php include_once './tags/common/scripts.php'; ?>

