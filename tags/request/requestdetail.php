<div class="row padd20-top-btm">
	<div class="col-md-12 text-center">
		<h4>
			<?php echo $data['first_name'] . " " . $data['last_name'] ?>
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
			<div id="googleMap" style="width:100%;height:380px;"></div>
		</div>
	</div>
</div>
