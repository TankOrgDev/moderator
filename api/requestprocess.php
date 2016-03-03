<?php
function logToFile($msg)
 { 
   try
   {
   //$filename='\wamp\www\log.txt';
   // open file
  // $fd = fopen($filename, "a");
   // append date/time to message
   $str = "[" . date("Y/m/d h:i:s", time()) . "] " . $msg; 
   // write string
  // fwrite($fd, $str . "\n");
   // close file
  // fclose($fd);
   }
   catch(Exception $e)
   {
	//logToFile($e->getMessage());
   }
 }
 //logToFile("aa");
 //alert("SUCCESS PAGE");
 print_r($_REQUEST);
$Uid = $_POST["Uid"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$helpdId = $_POST["helpId"];
$requestdate = $_POST["requesteddate"];
$place1="";
$place1= $_POST["location1"];
$place2= $_POST["location2"];
$message= $_POST["message"];
$address= $_POST["address"];
$education = $_POST["education"];
$latitude = $_POST["lat"];
$logitude = $_POST["long"];
$duration = $_POST["duration"];
InsertBenificiaryData($Uid,$email,$phone,$helpdId,$requestdate,
        $place1,$place2,$address,$message,$education,$latitude,$logitude,$duration);
function InsertBenificiaryData($Uid1,$email1,$phone1,$helpdId1,$requestdate1,
        $place1,$place2,$address1,$message1,$education1,$latitude1,$logitude1,$duration1) 
{
try
{
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$database = "blinx"; 
logToFile($database);
$conn = mysqli_connect($host ,$user ,$pass ,$database ) or die("Error " . mysqli_error($link)); 
                $sql2="select COALESCE(MAX(Id), 0) as MaxID from t_help_request";
                logToFile($sql2);
				$result = mysqli_query($conn,$sql2);
                if (!$result) 
               {
                   logToFile("Failed");
                   echo 'Failed Registration';
               } 
               else
               {
                        $row= mysqli_fetch_array( $result,MYSQLI_ASSOC);
                        $txnid=intval($row["MaxID"])+1;
						$Uid1=intval($Uid1);
						$current_date = date("Y-m-d H:i:s");
						$requestdate1=date("Y-m-d H:i:s",strtotime($requestdate1));
						$helpvalue1=intval($helpvalue1);
						logToFile($requestdate1);
       		        $sql="INSERT INTO t_help_request (Id,phone,email,UserId,helpId,Message,Address,"
                                . "Location,Requesteddate,Createddate,latitude,longitude,Duration,status,volunteer_id)"
                                . "VALUES( $txnid,'$phone1','$email1',$Uid1,$helpdId1,"
                                . "'$message1','$address1','$place1','$requestdate1',"
                                . "'$current_date','$latitude1','$logitude1','$duration1','Pending','')";
                     logToFile($sql);
					 console.log($sql);
 		        if (!mysqli_query($conn,$sql))
		        {
		            logToFile(mysql_error());
                            echo 'Request Failed';
		        }
		        else
		        {
			       logToFile("callsid added");
                               echo 'Request Success';
		        }
              }
	

}
catch(Exception $e)
{
		logToFile($e->getMessage());
		logToFile(mysql_close($con));
        echo 'fail';
}
}
?>	
<html>
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

		