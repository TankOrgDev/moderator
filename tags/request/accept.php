	<div class="alert alert-success" role="alert">
		Thanks for accepting help request from 
		<b><?php echo $data["first_name"] . " " . $data["last_name"] ?></b>
		. We have sent you contact and address details of  
		<b><?php echo $data["first_name"] . " " . $data["last_name"] ?></b>
		to your registered email address.
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success" role="alert">Scan the QR code to get the route.</div>
		</div>
	</div>
	<?php
	$google_url = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode("https://www.google.com/maps/dir/12.9220774,77.6807421/" . $data["latitude"] . "," . $data["longitude"]);
	?> 
	<div class="row sr-br-div">
		<div class="col-xs-2">
			<img style="width: 100%; height: 100%;max-width: 116px;" class="media-object" src="<?php echo $google_url ?>" alt="Scan to get the route.">
		</div>	
		<div class="col-xs-10">
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
