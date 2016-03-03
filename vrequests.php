<?php
include_once './libs/const.php';
$_pageid = 113;
session_start();
$vid=$_SESSION['vid'];
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
	<style type="text/css">
		#table1 td:hover {
			cursor: pointer;
		}
	</style>

	<script>
	$(document).ready(function(){
		$.ajax({
					type: "GET",
					url:"/blinx/libs/search.php",
					async:false,
					dataType :"json",
					data: 
					{
						action : 'volunteer_requests',
						vid : <?php echo $vid ?>
					},
					success: function (msg) 
					{
						console.log(msg);
						if (msg) 
						{
							$.each(msg, function(key, value) 
							{
								$("#table1").append(
										"<tr>"+
										"<td><a href=accept.php?id="+ value.reqID+"&status="+ value.Status+">Link</a></td>"+
										"<td>"+ value.first_name+ " "+value.last_name+"</td>"+
										"<td>" + value.statusDesc + "</td>"+
                                                                                "<td>" + value.Cstatus + "</td>"+
										"<td>" + value.Requesteddate + "</td>"+
										"<td>" + value.Datetime + "</td>"+
										"</tr>");
							});
							
						}
						else 
						{
							//TODO Display No Rocords message.
							console.log("error");
						}
					},
					error : function(error) {
						//TODO Display Technical issue so not able to get the history.
						console.log(error);
					},
					
                });
				 // Hide the first cell for JavaScript enabled browsers.
				  $('#table1 td:first-child').hide();

				  // Apply a class on mouse over and remove it on mouse out.
				  //$('#table1 tr').hover(function ()
				  //{
					//$(this).toggleClass('Highlight');
				  //});
			  
				  // Assign a click handler that grabs the URL 
				  // from the first cell and redirects the user.
				  $('#table1 tr').click(function ()
				  {
					location.href = $(this).find('td a').attr('href');
				  });
			});
	
		/*function updateTable()
		{
			$.ajax({
					type: "GET",
					url:"/blinx/libs/search.php",
					async:false,
					dataType :"json",
					data: 
					{
						action : 'volunteer_requests',
						vid : '12'
					},
					success: function (msg) 
					{
						console.log(msg);
						if (msg) 
						{
							$.each(msg, function(key, value) 
							{
								$("#table1").append(
										"<tr>"+
										"<td>"+ value.first_name+ " "+value.last_name+"</td>"+
										"<td>" + value.statusDesc + "</td>"+
										"<td>" + value.Requesteddate + "</td>"+
										"<td>" + value.Datetime + "</td>"+
										"</tr>");
							});
							
						}
						else 
						{
							//TODO Display No Rocords message.
							console.log("error");
						}
					},
					error : function(error) {
						//TODO Display Technical issue so not able to get the history.
						console.log(error);
					},
					
                });
		};*/
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
				$vid=isset($_POST['vid'])?$_POST['vid']:'12';
                if ((empty($vid)) || ('' == @$vid)) {
					$value = 'Unable to fetch request please try <a href="' . URL_SEARCH . '">again</a>';
                    TODO //update db 
                    ?>
					<div class="alert alert-warning" role="alert"><?php echo $value ?></div>
                    <?php
                }
				else
				{?>
                    <div class="alert alert-success" role="alert">Your Requests</div>
					<?php
				}	
                ?>
                    <div class="row sr-br-div">
                        <div class="col-xs-12">
							<table id="table1" class="table table-hover">
								<thead>
									<tr>
										<th>Beneficiary Name</th>
										<th>Action</th>
                                                                                <th>current status</th>
										<th>Requested Date</th>
										<th>Date</th>
									</tr>
								</thead>
							</table>
                        </div>
                    </div>
            </div>
        </div>
          <?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
