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
	$(document).ready{
				
				$.ajax({
					type: "GET",
					url:"/blinx/libs/search.php",
					async:false,
					dataType :"json",
					data: 
					{
						action : 'volunteer_requests',
						vid : <?php echo $_POST['vid'] ?>
					},
					success: function (msg) 
					{
						console.log(msg);
					},
					error : function(error) {
						console.log(error);
					}
                    });
	};
	</script>
    <body>
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
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo URL_HOME ?>">Home</a></li>
                            <li class="active">Accept Request</li>
                        </ol>
                    </div>
                </div>
                <?php
                if ((empty($_POST) || (null == @$_POST['reqid']))) {
					$value = 'Unable to fetch request please try <a href="' . URL_SEARCH . '">again</a>';
                    TODO //update db 
                    ?>
					<div class="alert alert-warning" role="alert"><?php echo $value ?></div>
                    <?php
                }
				else
				{?>
					<div class="alert alert-warning" role="alert"><?php echo $_POST['reqid'] . " " . $_POST["status"]. " " . $_POST["usrid"]. " " . $_POST["vid"] ?></div>
                    <div class="alert alert-success" role="alert">Request status updated</div>
					<?php
				}	
                //load the old request
                //TODO need to add new 
                include './libs/request.php';
                //hard coded till sitn in integration
                $__data = run_query($_POST['reqid'])
                //TODO: need to fix the query
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">Scan the QR code to get the route.</div>
						<div class="alert alert-success" role="alert"><?php echo  $output ?></div>
                    </div>
                </div>
                <?php
                foreach ($__data["request"] as &$data) {
                    $google_url = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode("https://www.google.com/maps/dir/12.9220774,77.6807421/" . $data["latitude"] . "," . $data["longitude"]);
                    ?> 
                    <div class="row sr-br-div">
                        <div class="col-xs-4">
                            <img style="width: 100%; height: 100%;max-width: 116px;" class="media-object" src="<?php echo $google_url ?>" alt="Scan to get the route.">
                        </div>
                        <div class="col-xs-8">
							<table class="table table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th>Status</th>
									<th>Requested Date</th>
									<th>Accepted Date</th>
								</tr>
							</thead>
                            <h4 class="media-heading"><?php echo $data["first_name"] . " " . $data["last_name"] ?></h4>
                            <p>
                                Type of service <b><?php echo $data["Description"] ?></b> 
                                <?php (isset($data["duration"]) ? " for " . $data["duration"] . "Hrs" : "") ?> on 
                                <code><?php echo $data["Requesteddate"] ?></code>
                                <?php if (isset($data["Location"])) { ?>
                                    at <a target="_blank" href="https://www.google.com/maps/place/<?php echo $data["latitude"] ?>,<?php echo $data["longitude"] ?>"><?php echo $data["Location"] ?></a>
                                    <?php
                                }
                                echo $data["Message"];
                                ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
          <?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
