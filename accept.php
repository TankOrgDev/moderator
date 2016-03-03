<?php
include_once './libs/const.php';
$_pageid = 112;
session_start();
$vid=$_SESSION['vid'];
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
                if (empty($_GET) || (null == @$_GET['id'])) 
				{
                    $value = 'Unable to fetch request please try <a href="' . URL_SEARCH . '">again</a>';
                    ?>
                    <div class="alert alert-warning" role="alert"><?php echo $value ?></div>
                    <?php
                } 
				else if(empty($_GET) || (null == @$_GET['status'])) 
				{
                    $value = 'Unable to fetch request please try <a href="' . URL_SEARCH . '">again</a>';
                    ?>
                    <div class="alert alert-warning" role="alert"><?php echo $value ?></div>
                    <?php
                } 
				else 
				{
                    include './libs/request.php';
                    $data = run_query($_GET['id']);
                    //$data = $__data["request"][0];
                    //TODO: need to fix the query
					include './tags/request/requestdetail.php';
					?>
					<div style="margin-top: 30px"></div>
					<div class="col-md-12 text-center">
						<form action="myrequest.php" method="POST">
							<input value=" <?php echo $data["reqID"]?>" name="reqid" type="hidden"/>
							<input value=" <?php echo $data["Id"]?>" name="usrid" type="hidden"/>
							<input value=" <?php echo $vid?>" name="vid" type="hidden"/>
							<?php
							if($_GET['status']=="A")
							{
							 ?>
								<input value="<?php echo $_GET['status']?>"" name="status" type="hidden"/>
								<button type="submit" class="btn btn-success btn-larges ">Confirm</button>
							<?php
							}
							else if($data['status']!="P")
							{
								date_default_timezone_set('	Asia/Calcutta');
								$reqDate=$data["Requesteddate"];
								$today=date("Y-m-d H:i:s");
								if($data["Status"]=="A" && $reqDate>$today )
								{
									?>
									<input value="C" name="status" type="hidden"/>
									<button type="submit" class="btn btn-success btn-larges ">Cancel</button>
									<?php
								}
								else
								{
									?>
									<button type="buttom" disabled class="btn btn-success btn-larges ">Completed</button>
									<?php
								}
							}
							?>
						</form>
					</div>
					<?php
				}
				?>
			</div>
		</div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
        <?php include_once './tags/common/scripts.php'; ?>
    </body>
</html>
