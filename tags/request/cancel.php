	<div class="alert alert-success" role="alert">
		Cancellation of request completed successfully. the request details are below.
	</div>
	<div class="row sr-br-div">
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
