<?php
include_once './libs/const.php';
$_pageid = 113;
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "My Request Service";
        include_once './tags/common/head.php';
        ?>
        <!-- end:tagline -->

        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </head>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: "POST",
                url: "/blinx/libs/acceptance.php",
                async: false,
                dataType: "json",
                data:
                        {
                            action: 'update_request',
                            status: '<?php echo $_POST['status'] ?>',
                            vid: <?php echo $_POST['vid'] ?>,
                            reqID: <?php echo $_POST['reqid'] ?>,
                            Uid: <?php echo $_POST["usrid"] ?>
                        },
                success: function (msg)
                {
                    console.log(msg);
                    $data=msg[0];
                    $status=$data["DBStatus"];
                    if($status=="1")
                    {
                            $("#success").show();
                            $("#failure").hide();
                    }
                    else
                    {
                            $("#success").hide();
                            $("#failure").show();
                    }
                },
                error: function (error) {
                    console.log(error);
                    $("#success").hide();
                    $("#failure").show();
                }
            });
            
        });
    </script>
    <body >
		<?php include_once './tags/global_header/header.php'; ?>
		<div class="heads" style="background: url(resources/img/bag-banner-1.jpg) center center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><span>//</span> My Service Request.</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div id="success">
						<?php
						//load the old request
						//TODO need to add new 
						include './libs/request.php';
						//hard coded till sitn in integration
						$data = run_query($_POST['reqid']);
						//$data = $__data["request"][0];
						$status=$_POST['status'];
						if($status=="A")
						{
							include './tags/request/accept.php';
                                                        include_once 'sendmail.php'; 
                                                        mailto('2',$_POST['reqid']);
                            
						}
						if($status=="C")
						{
							include './tags/request/cancel.php';
                                                        include_once 'sendmail.php'; 
                                                        mailto('3',$_POST['reqid']);
						}
						?>
						
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div id="failure">
                            <div class="alert alert-success" role="alert">Sorry we are unable to accept to help request . We will get back to you soon</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
