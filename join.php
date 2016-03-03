<?php
include_once './libs/const.php';
$_pageid = 113;
?>
<!DOCTYPE html>
<html lang="en">
    <head>   
        <?php
        $_TITLE = "Join Us";
        include_once './tags/common/head.php';
        ?>
        <?php include_once('./libs/signup.php');?>
        <?php include_once './libs/masterdata.php'; 
        $edu = getEducation();
        $job = getProfession();
        $languages = getLanguages();
        ?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    </head>
	<style type="text/css">
	</style><script>
		var lati='';
		var lngi='';
                $("document").ready(function() {
                    $("#dob").datepicker();
                });
                function initialize()
		{
                    var input = document.getElementById('autocomplete');
                    var options = {componentRestrictions: {country: 'in'}};
                    var autocomplete=new google.maps.places.Autocomplete(input, options);
                    google.maps.event.addListener(autocomplete,'place_changed', function()
                    {
                        var inputA = document.getElementById('autocomplete').value;
                        var geocoder = new google.maps.Geocoder();
                                        geocoder.geocode({
                                        'address': inputA
                                        }, function(results, status) {
                                                if (status === google.maps.GeocoderStatus.OK) 
                                                {
                                                        lati=results[0].geometry.location.lat();    
                                                        lngi=results[0].geometry.location.lng(); 
                                                        $('#latitude').val(lati);
                                                        $('#longitude').val(lngi);
                                                }
                                        });
                    });
                };
                function showerrormessage(message) 
                {
                    $("#message").text(message);
                    $("#message").show();
                }
		function validateForm()
		{
			var firstname = $("#fname").val();
			var lastname=$("#lname").val();
			var mobile = $("#phone").val();
			var pwd = $("#passwd").val();
			var cpwd = $("#conpasswd").val();
			var uemail = $("#email").val();
                        var addr = $("#address").val();
                        var lat = $("#latitude").val();
                        var lng = $("#longitude").val();
			if(validateUsername(firstname,lastname))
			{
                            if(allLetter(firstname,lastname))
                            {
                                if(checkEmail(uemail))
                                {
                                    if(validatePhone(mobile))
                                    {
                                        if(validatePassword(pwd,cpwd))
                                        {
                                            if(validateLocation(lat,lng))
                                            {
                                                if(validateAddress(addr))
                                                {
                                                    return true;
                                                }
                                            }
                                        }
                                    }
                                }
                            }	
			}
			return false;
		};
                function validateLocation(lat,lng)
                {
                    if(lat=='' && lng=='')
                    {
                        error = "Please enter Location";
			showerrormessage(error);
			return false;
                    }
                    return true;
                }
                function validateAddress(addr)
                {
                    if(addr=='')
                    {
                        error = "Please enter address";
			showerrormessage(error);
			return false;
                    }
                    return true;
                }
		function validateUsername(fld,fld2) 
		{
			var error = "";
			var illegalChars = /\W/; // allow letters, numbers, and underscores

			if (fld == "") {
				error = "Please enter first name";
				showerrormessage(error);
				return false;

			}
			else if (fld2 == "") {
				error = "Please enter last name";
				showerrormessage(error);
				return false;

			}
			else if ((fld.length < 2) || (fld.length > 30)) {
				error = "The username is the wrong length.\n";
				showerrormessage(error);
				return false;

			} else if (illegalChars.test(fld)) {
				error = "The username contains illegal characters.\n";
				showerrormessage(error);
				return false;

			} else {
				return true;
			}
			return true;
		};
		function validatePassword(pwd,cpwd) 
		{
                    var error = "";
                    var illegalChars = /[\W_]/; // allow only letters and numbers
                    var re = /[0-9]/;
                    var small = /[a-z]/;
                    var caps = /[A-Z]/;
                    if (pwd == "") {
                            error = "Please enter password.\n";
                            showerrormessage(error);
                            return false;

                    } else if ((pwd.length < 5) || (pwd.length > 15)) {
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
                    else {
                            return true;
                    }
                    return true;
		};
		function allLetter(fname,lname)
		{
			var letters = /^[A-Za-z]+$/;
			var re = new RegExp(letters);
			if(fname.match(re))
			{
				return true;
			}
			else
			{
				showerrormessage('FirstName must have alphabet characters only');
				return false;
			}
			if(lname.match(re))
			{
				return true;
			}
			else
			{
				showerrormessage('LastName must have alphabet characters only');
				return false;
			}
		};
		function alphanumeric(uadd)
		{
			var letters = /^[0-9a-zA-Z]+$/;
			if(uadd.match(letters))
			{
				return true;
			}
			else
			{
				showerrormessage('User address must have alphanumeric characters only');
				return false;
			}
		};
		function validatePhone(phone)
		{
			if(phone=='')
			{
				showerrormessage('Please enter Phone Number');
				return false;
			}
			else if(phone!='' && !allnumeric(phone))
			{
				showerrormessage('Phone Number must have numeric only');
				return false;
			}
			else
			{
				return true;
			}
		}
		function allnumeric(number)
		{
			var numbers = /^[0-9]+$/;
			
			if(number.match(numbers))
			{
				return true;
			}
			else
			{
				return false;
			}
		};
		function checkEmail(uemail) {
			var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (!uemail.match(filter)) {
			showerrormessage('Please enter valid email address');
			return false;
			}
			return true;
		}
     
                
   
	</script>
    <style>
        label.invalid
        {
            color: Red;
            padding: 1px;
            font-size: 12px;
            font-weight: normal;
            margin: 0px 0px 0px 45px;
        }
        secHeading{font-size:20px;font-weight:300;word-spacing:normal;letter-spacing:normal}
    </style>
    <body onLoad="initialize()">
        <?php include_once './tags/global_header/header.php'; ?>
        <div class="page-content" style="margin-top:80px ">
            <div class="container">
                <form method="POST"  class="section" id="regform" action="" onsubmit="return validateForm()">
                    <div class="form-group">
                          <label for="firstname" class="col-md-2">
                        First Name:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">
                      </div>
                     </div>

                    <div class="form-group">
                      <label for="lastname" class="col-md-2">
                        Last Name:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="laname" name="lname" placeholder="Enter Last Name">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="useremail" class="col-md-2">
                        Email address:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address">
                        <p class="help-block">
                          Example: yourname@domain.com
                        </p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="phone" class="col-md-2">
                        MobilePhone:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Monbile Phone" Maxlength="20">
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="phone" class="col-md-2">
                        Guardian Number:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="ephone" name="ephone" placeholder="Enter Guardian Monbile Phone" Maxlength="20">
                      </div>
                     </div>

                    <div class="form-group">
                         <label for="sex" class="col-md-2">
                        Sex:
                      </label>
                      <div class="col-md-10">
                        <label class="radio">
                          <input type="radio" name="sex" id="sex" value="male" checked>
                          Male
                        </label>
                        <label class="radio">
                          <input type="radio" name="sex" id="sex" value="female">
                          Female
                        </label>
                      </div>
                     </div>

                    <div class="form-group">
                      <label for="dob" class="col-md-2">
                        DateOfBirth:
                      </label>
                      <div class="col-md-10">
                       <input type="text" class="form-control" id="dob" name="dob" placeholder="DateOfBirth">
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="lang" class="col-md-2">
                        Mothe Toungue:
                      </label>
                      <div class="col-md-10">
                          <select name="lang" id="lang" name="lang" class="form-control">
                          <?php
                            foreach ($languages as $lang) {
                                echo '<option value="'.$lang['Id'].'">'.$lang['Description'].'</option>';
                            }
                            ?>
                        </select>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="plang" class="col-md-2">
                        Languages:
                      </label>
                      <div class="col-md-10">
                          <select name="plang" id="plang" name="plang" class="form-control">
                          <?php
                            foreach ($languages as $lang) {
                                echo '<option value="'.$lang['Id'].'">'.$lang['Description'].'</option>';
                            }
                            ?>
                        </select>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="profession" class="col-md-2">
                        Profession:
                      </label>
                      <div class="col-md-10">
                          <select name="profession" id="profession" name="profession" class="form-control">
                          <?php
                            foreach ($job as $jb) {
                                echo '<option value="'.$jb['Id'].'">'.$jb['Description'].'</option>';
                            }
                            ?>
                        </select>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="qualification" class="col-md-2">
                        Qualification:
                      </label>
                      <div class="col-md-10">
                          <select name="qualification" id="qualification" name="qualification" class="form-control">
                          <?php
                            foreach ($job as $jb) {
                                echo '<option value="'.$jb['Id'].'">'.$jb['Description'].'</option>';
                            }
                            ?>
                        </select>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="iname" class="col-md-2">
                        Institution Name
                      </label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="iname" name="iname" placeholder="DateOfBirth">
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="pincode" class="col-md-2">
                        PINCODE:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="PINCODE" Maxlength="6">
                      </div>
                    </div>
                     
                    <div class="form-group">
                      <label for="paddress" class="col-md-2">
                        Permanent Address:
                      </label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="paddress" name="paddress" placeholder="Permanent Address">
                      </div>
                     </div>
                     
                    <div class="form-group">
                      <label for="taddress" class="col-md-2">
                        Temperory Address:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="taddress" name="taddress" placeholder="Temperory Address">
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="location" class="col-md-2">
                        Location
                      </label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="autocomplete" name="autocomplete" placeholder="Choose Location" value="123123">
                        <input name="latitude"  id="latitude" type="hidden" value="111" />
                        <input  name="longitude" id="longitude" type="hidden" value="1223"/>
                        <input id="action" type="hidden" name="action" value="signup">
                      </div>
                     </div>
                <input id="signup" type="hidden" name="signup" value="Signup">
                <div class="section fieldset" style="margin-top:20px">
                   <button type="submit" class="btn btn-success submit" style="Height:30px;width:90%;
                                                           border: 1px solid;  border-radius: 4px" tabindex="8" >JOIN US</button>
                </div>
                <p class="" style="margin-top:10px; margin-left:50px " >
By signing up, I agree to the <a href="/termsOfUse" target="_blank">Terms of Service</a> and <a href="/privacy" target="_blank">Privacy Policy</a>.
                        </p>
                </form>
            </div>
        </div>
          <?php include_once './tags/global_header/footer.php'; ?>
    </body>
</html>
