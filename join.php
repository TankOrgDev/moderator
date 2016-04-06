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
        $stblind = getStatusblindness();
        $stmobility=getStatusMobility();
        $optechno = getOptechnology();
        $hobies   = getHobies();
        ?> 
   <?php
        $_TITLE = "Join Us";
        include_once './tags/common/head.php';
        ?>
        <?php include_once('./libs/signup.php');?>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
  <script>
        function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
          return true;
      }
</script>
<script>
// JS validation for the file

/* run the init() after the page get loaded 
* Run init() after page get loaded
*/
window.onload = init;

/*
initialiation for the init
*/

function init(){
	//Bind onsubmit event handler
	document.getElementById("regform").onsubmit = validateForm;

	// Bind the evaent handler function

	document.getElementById("btnreset").onclick = clearForm;

	// Bind the on focus event handler

	document.getElementById("fname").focus();
}

function validateForm(theForm){
	with(theForm){
	return(isNotEmpty(fname, "please enter the firstname " ,elmFNameError)
	&& isNotEmpty(lname, "please enter the lastname" , elmLNameError)
	&& isValidEmail(email ,"please enter email or email not in the format",elmemailError)
	&& isNumeric(phone, "please enter phone number",elmphoneError)
	&& isNumeric(ephone, "please enter guardian number" , elmephoneError)
	&& isChecked("sex", "please select the sex", elmsexError)
	&& isNotEmpty(datepicker, "please enter the date of the birth" , elmdatepickerError)
	&& isNotEmpty(stblind , "select you status" , elmstblindError)
	&& isNotEmpty(stmobility , "select status of mobility" , elmstmobilityError)
	&& isNotEmpty(optechno, "select the operating technology" , elmoptechnoError)
	&& isNotEmpty(hobies, "select the hobies" , elmhobiesError)
	&& isNotEmpty(lang , "please select mother tougue" , elmlangError)
	&& isChecked("plang", "please select languages" , elmplangError)
	&& isNotEmpty(profession , "please select profession" , elmprofessionError)
	&& isNotEmpty(qualification , "please enter the qualification", elmqualificationError)
	&& isNotEmpty(iname, "please enter the institution name" , elminameError)
	&& isLengthMinMax(pincode,6,6,"please enter the pincode",elmpincodeError)
	&& isNotEmpty(paddress, "please enter permanent address",elmpaddressError)
	&& isNotEmpty(taddress, "please enter the temporary address",elmtaddressError)
	&& isNotEmpty(autocomplete, "please enter Your location",elmautocompleteError)
	&& isNotEmpty(dream , "please enter your dream " , elmdreamError)
	);
     }
}

function isLengthMinMax(inputElm,minLength,maxLength,errMsg,errElm){
	var inputValue = inputElm.value.trim();
	var isValid    = (inputValue.length >=minLength) && (inputValue.length <=maxLength);
	postValidate(isValid,errMsg,errElm,inputElm);
	return isValid;
}


function isNotEmpty(inputElm,errMsg,errElm){
	var isValid = (inputElm.value.trim() !== "");
	postValidate(isValid,errMsg,errElm,inputElm);
	return isValid;
}

function isValidEmail(inputElm,errMsg,errElm){
	var isValid = (inputElm.value.trim().match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) !== null);
	postValidate(isValid,errMsg,errElm,inputElm);
	return isValid;
}

function isChecked(inputElm,errMsg,errElm){
	var elms=document.getElementsByName(inputElm);
	var isChecked=false;
	for ( var i = 0; i < elms.length ; i++){
		if(elms[i].checked){
			isChecked=true;
			break;
		}
	}
	postValidate(isChecked,errMsg,errElm);//pass the null it's not focus any where
	return isChecked;
}

function isNumeric(inputElm,errMsg,errElm){
	var isValid = (inputElm.value.trim().match(/^\d+$/) !== null);
	postValidate(isValid,errMsg,errElm,inputElm);
	return isValid;
}

function postValidate(isValid,errMsg,errElm,inputElm){
	if(!isValid){
		// show the error message is its not proper field
	if(errElm !== undefined && errElm !== null && errMsg !== undefined && errMsg !== null){
		errElm.innerHTML = errMsg;
	}
	//set focus on input element currect this message
	if(inputElm !== undefined && inputElm !== null){
		inputElm.classList.add("errorBox"); // add the class for the styling
		inputElm.focus();
	}
}
	else{
	  //clear the if the previous error is working means
	if(errElm !== undefined && errElm !== null){
		errElm.innerHTML = "";
	}
	if(inputElm !== undefined && inputElm !== null){
		inputElm.classList.remove("errorBox");
	}
   }
}
</script>
    </head>
	<style type="text/css">
      .asterisk_input:after {
    content:"*";
    color:red;
 }
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
	</script>
    <style>
	.errorMsg{
		color:red;
	}
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
                <form method="POST"  class="section" id="regform" action="">
               <label style="margin-left: 5%">All  <span class="asterisk_input">  </span> fileds are required  </label>
               <br>
               <br>
                    <div class="form-group">
                          <label for="firstname" class="col-md-2">
                        First Name:
                        <span class="asterisk_input">  </span>
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name">
			<label id="elmFNameError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>

                    <div class="form-group">
                      <label for="lastname" class="col-md-2">
                        Last Name:
                        <span class="asterisk_input">  </span>
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
			<label id="elmLNameError" class="errorMsg">&nbsp;</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="useremail" class="col-md-2">
                        Email address:
                        <span class="asterisk_input">  </span>
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email address">
                        <p class="help-block">
                          Example: yourname@domain.com
			<label id="elmemailError" class="errorMsg">&nbsp;</label>
                        </p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="phone" class="col-md-2">
                        MobilePhone:
                        <span class="asterisk_input">  </span>
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Phone" Maxlength="20" onkeypress="return isNumberKey(event)">
			<label id="elmphoneError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="phone" class="col-md-2">
                        Guardian Number:
                        <span class="asterisk_input">  </span>
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="ephone" name="ephone" placeholder="Enter Guardian Mobile Phone" Maxlength="20" onkeypress="return isNumberKey(event)">
			<label id="elmephoneError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>

                    <div class="form-group">
                         <label for="sex" class="col-md-2">
                        Sex:
                      </label>
                      <div class="col-md-10">
                        <label class="radio">
                          <input type="radio" name="sex" id="sex" value="male">
                          Male
                        </label>
                        <label class="radio">
                          <input type="radio" name="sex" id="sex" value="female">
                          Female
                        </label>
			<label id="elmsexError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>

                    <div class="form-group">
                      <label for="dob" class="col-md-2">
                        DateOfBirth:
                      </label>
                      <div class="col-md-10">
                       <input type="text" class="form-control" id="datepicker" name="dob" placeholder="DateOfBirth">
		       <label id="elmdatepickerError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>

                     <div class="form-group">
                      <label for="stblind" class="col-md-2">
                        Status of blindness:
                      </label>
                      <div class="col-md-10">
                        <select name="stblind" id="stblind" class="form-control">
                        <?php
                          foreach ($stblind as $sb) {
                            echo '<option value="'.$sb['Id'].'">'.$sb['Description'].'</option>';
                          }
                          ?>
                          </select>
                          <label id="elmstblindError" class="errorMsg">&nbsp;</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="stmobility" class="col-md-2">
                          Status of mobility:
                        </label>
                        <div class="col-md-10">
                          <select name="stmobility" id="stmobility" class="form-control">
                            <?php
                              foreach ($stmobility as $stm) {
                                echo '<option value="'.$stm['Id'].'">'.$stm['Description'].'</option>';
                              }
                              ?>
                          </select>
                          <label id="elmstmobilityError" class="errorMsg">&nbsp;</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="optechno" class="col-md-2">
                          Operate technologie:
                        </label>
                        <div class="col-md-10">
                          <select name="optechno" id="optechno" class="form-control">
                            <?php
                              foreach ($optechno as $opt) {
                                echo '<option value="'.$opt['Id'].'">'.$opt['Description'].'</option>';
                              }
                              ?>
                          </select>
                          <label id="elmoptechnoError" class="errorMsg">&nbsp;</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="hobies" class="col-md-2">
                          Interests/Hobies:
                        </label>
                      <div class="col-md-10">
                        <select name="hobies" id="hobies" class="form-control">
                          <?php
                            foreach ($hobies as $hb) {
                              echo '<option value="'.$hb['Id'].'">'.$hb['Description'].'</option>';
                            }
                            ?>
                        </select>
                        <label id="elmhobiesError" class="errorMsg">&nbsp;</label>
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
                        <label id="elmlangError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="plang" class="col-md-2">
                        Languages:
                      </label>
                      <div class="col-md-10">
                      <input type="checkbox" name="plang" value="English">English<br>
                      <input type="checkbox" name="plang" value="English">Hindi<br>
                      <input type="checkbox" name="plang" value="English">Telugu<br>
                      <input type="checkbox" name="plang" value="English">Tamil<br>
                      <input type="checkbox" name="plang" value="English">Kannada<br>
                      <input type="checkbox" name="plang" value="English">Malayalam<br>
                      <input type="checkbox" name="plang" value="English">Gujarati<br>
                      <input type="checkbox" name="plang" value="English">Punjabi<br>
		      <label id="elmplangError" class="errorMsg">&nbsp;</label>
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
                        <label id="elmprofessionError" id="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="qualification" class="col-md-2">
                        Qualification:
                      </label>
                      <div class="col-md-10">
                          <select name="qualification" id="qualification" name="qualification" class="form-control">
                          <?php
                            foreach ($edu as $ed) {
                                echo '<option value="'.$ed['Id'].'">'.$ed['Description'].'</option>';
                            }
                            ?>
                        </select>
                        <label id="elmqualificationError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="iname" class="col-md-2">
                        Institution Name:
                      </label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="iname" name="iname" placeholder="Institution Name">
			  <label id="elminameError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="pincode" class="col-md-2">
                        PINCODE:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="PINCODE" Maxlength="6" onkeypress="return isNumberKey(event)">
			<label id="elmpincodeError" class="errorMsg">&nbsp;</label>
                      </div>
                    </div>
                     
                    <div class="form-group">
                      <label for="paddress" class="col-md-2">
                        Permanent Address:
                      </label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="paddress" name="paddress" placeholder="Permanent Address">
			  <label id="elmpaddressError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                     
                    <div class="form-group">
                      <label for="taddress" class="col-md-2">
                        Temperory Address:
                      </label>
                      <div class="col-md-10">
                        <input type="text" class="form-control" id="taddress" name="taddress" placeholder="Temperory Address">
                        <label id="elmtaddressError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                
                    <div class="form-group">
                      <label for="location" class="col-md-2">
                        Location:
                      </label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" id="autocomplete" name="autocomplete" placeholder="Choose Location" value="">
                        <input name="latitude"  id="latitude" type="hidden" value="" />
                        <input  name="longitude" id="longitude" type="hidden" value=""/>
                        <input id="action" type="hidden" name="action" value="signup">
			<label id="elmautocompleteError" class="errorMsg">&nbsp;</label>
                      </div>
                     </div>
                     
                  <div class="form-group">
                    <label for="dream" class="col-md-2">
                      Dream in life:
                    </label>
                    <div class="col-md-10">
                      <textarea class="dream" name="dream" id="dream" placeholder="Dream In Your life" rows="1" cols="50" wrap="physical"> 
                      </textarea>
		      <label id="elmdreamError" class="errorMsg">&nbsp;</label>
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
