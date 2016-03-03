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
                if (empty($_GET) || (null == @$_GET['id'])) {
                    $value = 'Unable to fetch request please try <a href="' . URL_SEARCH . '">again</a>';
                    ?>
                    <div class="alert alert-warning" role="alert"><?php echo $value ?></div>
                    <?php
                } else {
                    include './libs/request.php';
                    $__data = run_query($_GET['id']);
                    $data = $__data["request"][0];
                    //TODO: need to fix the query
                    ?>
                    <div class="row padd20-top-btm">
                        <div class="col-md-12 text-center">
                            <h4>
                                <?php echo $data["first_name"] . " " . $data["last_name"] ?>
                            </h4>
                            <p>
                                Type of service <b><?php echo $data["Description"] ?></b> 
                                <?php (isset($data["duration"]) ? " for " . $data["duration"] . "Hrs" : "") ?> on 
                                <code><?php echo $data["Requesteddate"] ?></code>
                                <?php if (isset($data["Location"])) { ?>
                                    at <a target="_blank" href="https://www.google.com/maps/place/<?php echo $data["latitude"] ?>,<?php echo $data["longitude"] ?>"><?php echo $data["Location"] ?></a>
                                    <?php
                                }
                                echo $data["Message"]
                                ?>
                            </p>

                            <div class="col-md-12">

                                <script>
                                    var myCenter = new google.maps.LatLng(<?php echo $data["latitude"] ?>, <?php echo $data["longitude"] ?>);

                                    function initialize()
                                    {
                                        var mapProp = {
                                            center: myCenter,
                                            zoom: 15,
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                        };

                                        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                                        var marker = new google.maps.Marker({
                                            position: myCenter,
                                        });

                                        marker.setMap(map);
                                    }

                                    google.maps.event.addDomListener(window, 'load', initialize);

                                </script>
                                <div id="googleMap" style="width:100%;height:380px;"></div
                            </div>
                            <div style="margin-top: 30px"></div>
                            <div class="col-md-12 text-center">
                                <form action="myrequest.php" method="POST">
                                    <input value=" <?php echo $data["reqID"]?>" name="reqid" type="hidden"/>
									<input value=" <?php echo $data["Id"]?>" name="usrid" type="hidden"/>
									<input value="12" name="vid" type="hidden"/>
									<input value="C" name="status" type="hidden"/>
									<?php 
									date_default_timezone_set('	Asia/Calcutta');
									?>
									<input value=" <?php echo $data["Requesteddate"] ?>" name="status1" type="hidden"/>
									<input value=" <?php echo date("Y-m-d H:i:s") ?>" name="status2" type="hidden"/>
									<input value=" <?php echo $data["Status"] ?>" name="tatus2" type="hidden"/>
									<?php 
									$reqDate=$data["Requesteddate"];
									$today=date("Y-m-d H:i:s");
									
										if($data["Status"]=="A" && $reqDate>$today )
										{
											?>
											<button type="submit" class="btn btn-success btn-larges ">Cancel</button>
											<?php
										}
										else
										{
											?>
											<button type="buttom" disabled class="btn btn-success btn-larges ">Completed</button>
											<?php
										}
                                    ?>
                                </form>
                            </div>
                        </div>
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
