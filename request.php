<?php
include_once './libs/const.php';
?>

<html lang="en">
    <head>  


        <?php
        $_TITLE = "Request Service";
        include_once './tags/common/head.php';
        ?>
		
    <?php include_once './tags/common/scripts.php'; ?>
	<script type="text/javascript" src="resources/js/jquery.min.js"></script>
	<script type="text/javascript" src="resources/js/Moment.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap-datetimepicker.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    
	
    
	
	<link 	href="resources/css/bootstrap.css" rel="stylesheet">
	
     
    <script>
	
			//mphone=9538088669&email=pawan@gmail.com
	   		var mphone = "9538088669";
	   		var email="pawan@gmail.com"
			
			
            var Uid="";
            var place1;
            var latitude="";
            var place2;
			var locPlace;
            var longitude="";
	   function initialize()
	   {
            var input = document.getElementById('autocomplete');
            var options = {componentRestrictions: {country: 'in'}};
            var autocomplete=new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete,'place_changed', function()
               {
                /*Get place details*/
                var inputA = document.getElementById('autocomplete').value;
                place1 = autocomplete.getPlace().address_components[0].long_name;
                place2= autocomplete.getPlace().address_components[1].long_name;
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                        'address': inputA
                                 }, function(results, status) 
                                 {
                                        if (status === google.maps.GeocoderStatus.OK) 
                                        {
                                            latitude=results[0].geometry.location.lat();    
                                            longitude=results[0].geometry.location.lng(); 
                                            //alert("Latitude: " + latitude + "\nLongitude: " + longitude);
                                        }
                                });
                /*Do something with place information*/
              });
              FillHelpData();
              FillCourseData();
              FillDurationData();
              $('#location').hide();
              $('#autocomplete').show();
              $('#ruseremail').val(GetURLParameter('email'));
			  //TODO
	      $('#rphone').val(GetURLParameter('mphone'));
		  //$('#rphone').val(mphone);
              //var mphone=GetURLParameter('mphone');
              var dataString = {'searchdata':mphone,'searchMethod':'0'};
              $.ajax({
                        type: "POST",
                        url:"blindsearch.php",
                        data:dataString,
                        dataType: "json",
                        success: function (msg) 
                        {
                        	Uid=msg.data[0]['user_id'];
				$('#ruseremail').val(msg.data[0]['email_id']);
				$('#rphone').val(msg.data[0]['mobile_number']);
				console.log(msg.data[0]['mobile_number']+'------------');
				latitude=msg.data[0]['lati'];    
                longitude=msg.data[0]['longi'];
                console.log(longitude+'*****************');				
				getPlace(msg.data[0]['lati'],msg.data[0]['longi']);
				console.log(locPlace+'------------');
				//alert(loc);
				$('#location').val(locPlace);
				$('#address').val(msg.data[0]['address']);
                        }
                    });
            }

	function GetURLParameter(sParam)
	{
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) 
		{
			var sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] == sParam) 
			{
				return sParameterName[1];
			}
		}
	};
	
	function getPlace(latitude,longitude){
	
	var latlng = new google.maps.LatLng(latitude, longitude);
    var geocoder = geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
			alert(results[1].formatted_address);
			locPlace = results[1].formatted_address;
               //alert(place);
              //return place;
            }
        }
    });
	            
	
}

        function FillHelpData() 
        {
		
		$.ajax({
                            type: "POST",
                            url:"api/help.php",
                            data: {filter: "help"},
                            dataType: "json",
                            success: function (msg) 
                            {
                                $.each(msg.data,function(key,value)
								
                                {	
									console.log(msg.data);
                                     $("#service").append($("<option></option>").val(value['Id']).html(value['Description']));
                                });  
                            },
							error: function(error){
					console.log('ERROR',error);
				}
                    });
	};
        
        function FillDurationData() 
        {
		var numbers = [1, 2, 3, 4, 5,6,7,8,9,10];
                var option = '';
                for (var i=0;i<numbers.length;i++){
                   option += '<option value="'+ numbers[i] + '">' + numbers[i] + '</option>';
                }
                $('#duration').append(option);
	};
	function FillCourseData() 
        {
            $.ajax({
                    type: "POST",
                    url:"php/coursedata.php",
                    dataType: "json",
                    success: function (msg) 
                    {
                        $.each(msg.data,function(key,value)
                       {
                             $("#education").append($("<option></option>").val(value['Id']).html(value['Description']));
                             //alert(data[i].Description);
                       });  
                    }
                });
        };

	  $(document).ready(function()
          {
	  var newDate = new Date();
          newDate.setDate(newDate.getDate());
	  $("#servicedate").datetimepicker({ format: 'DD-MM-YYYY hh:mm:ss'});
	  $('input:radio[name="communicationdata"]').change
          (
            function()
            {
                if ($(this).val() == 'existingaddress') 
                {
                    $('#location').show();
					$('#location').val(locPlace);
                    $('#autocomplete').hide();
                    $('#rphone').val(GetURLParameter('mphone'));
                    $('#ruseremail').val(GetURLParameter('email'));
                 }
                else 
                {
                        $('#rphone').val('');
                        $('#ruseremail').val('');
                        $('#autocomplete').val('');
                        $('#location').hide();
                        $('#autocomplete').show();
                } 
           });
	  $("#submit").on("click",function(evt){
		evt.preventDefault();
			//alert('click');
			var service = document.getElementById("service");
			//var service = $("#service");
			var education = document.getElementById("education");
			var a=document.getElementById("message");
			var b=document.getElementById("address");
                        var c=document.getElementById("duration");
						var d=document.getElementById("autocomplete");
			var message=a.value;
			var address=b.value;
                        var time=c.value;
						var place = d.value;
						console.log(place+'++++++++')
			var strHelpID="";
			var strEducationID="";
			strHelpID = "1"//service.options[service.selectedIndex].value;
			strEducationID = "2";//education.options[education.selectedIndex].value;
			//alert($("#servicedate").find("input").val());
			var dataString = 'Uid='+ Uid+ '&email='+ $('#ruseremail').val()+
			'&phone=' + $('#rphone').val()+ '&helpId=' + strHelpID+'&message=' +message+
			'&address=' + address +'&location1='+ place+
			'&location2='+ place2+ '&requesteddate=' + $("#servicedate").find("input").val()+
			'&education=' +  strEducationID+ ' &duration=' +  time+ ' &lat=' + "12.9279232"+'&long=' + longitude+ "77.62710779999997";
					//alert(dataString);
					console.log(dataString);
			$.ajax({
				url:"api/requestprocess.php",
				type: "POST",
				datatype: "text",
				data:dataString,
				success: function (msg) {
					//alert("Success");
					$("#divMessage").text("SuccessFully Stored Data in DB.");
					document.getElementById("divMessage").style.fontSize = "xx-large";
					},
				error: function(error){
					console.log('ERROR',error);
				}
			});
			//
			return false;
		  });
		});

	  </script> 
	</head>
    <body>
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="heads" style="background: url(resources/img/bag-banner-3.jpg) center center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><span>//</span> Request Service</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- begin:tagline -->
        <div class="page-content contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="divMessage" name="divMessage">
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Contact Us</li>
                        </ol>
                    </div>
                </div>
                <div class="row padd20-top-btm">
                    <form mame="regFrom" method="post" action="">
                        <div class="col-md-5 col-sm-5">
                            <h3>Request Details</h3>
							<input type="radio" name="communicationdata" id="existing" value="existingaddress" checked>
                                      Use Registered Information
									  &nbsp;&nbsp;
							<input type="radio" name="communicationdata" id="new" value="newaddress">
                            New Information
							
							<div class='input-group date' id='servicedate'>
                                        <input type='text' class="form-control" placeholder="Service Date" id='servicedate' required="true"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                            </div>
							
				
                                    <input name="service" id="service" class="form-control" placeholder="Service" required="true">
									<input name="education" id="education" class="form-control" placeholder="Education" required="true">
                            <!--input type="text" name="name" class="form-control" placeholder="Service Date" required=""-->
                            <input type="email" name="ruseremail" id="ruseremail" class="form-control" placeholder="Enter your mail" required="true">
							<!--<input type="text" class="form-control" id="ruseremail" name="ruseremail" placeholder="email address" 
                            <input type="text" name="subject" class="form-control" placeholder="Enter your subject" required="">-->
							<textarea name="address" id="address" class="form-control" rows="7" cols="60" placeholder="Address" required=""></textarea>
                        </div>
                        <div class="col-md-7 col-sm-7">
						<h3>&nbsp</h3>
						
						    <input name="duration" id="duration" class="form-control" placeholder="Duration(Hr)" required="true">
                                    </input>
									
							<input type="text" class="form-control" id="autocomplete" name="autocomplete" placeholder="Choose Location">
                            <!--input type="text" class="form-control" id="location" name="location" placeholder="Choose Location"-->
							<input type="text" class="form-control" id="rphone" name="rphone" placeholder="Monbile Phone" Maxlength="20">
                            <textarea name="message" id="message" class="form-control" rows="7" cols="60" placeholder="Type your message" required=""></textarea>
							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-warning btn-block btn-lg">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end:tagline -->
        <?php include_once './tags/global_header/footer.php'; ?>
        <!-- end:copyright -->
       
    </body>
</html>