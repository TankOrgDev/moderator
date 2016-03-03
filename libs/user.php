<?php

// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.
date_default_timezone_set('Asia/Kolkata');

function blind_confirm()
{
	$data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
	$DbStatus=$data['Status'];
	$date = date('Y-m-d H:i:s');
	$usrId= isset($_POST["usrID"])? $_POST["usrID"] : '';
	$status=isset($_POST["status"])? $_POST["status"] : '';
	$mid=isset($_POST["mid"])? $_POST["mid"] : '';
	if ($usrId != '' && $status!=''&& $mid!='' ) 
	{
		$query = "update m_user set usr_status='".$status."' ,update_time='".$date."' where user_id='".$usrId."'";
		$query_log="INSERT INTO m_usr_log(UsrId,CUD_Mid ,Datetime,Status) ".
					" VALUES ( ".$usrId .",".$mid.",'".$date."','".$status."')";
		include_once 'dbconnection.php';
		$conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
		mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
		$value = mysqli_query($conn, $query);
		$result=mysqli_query($conn, $query_log);
        if($value && $result )
        {
            mysqli_commit($conn);
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$value;
                    $DbStatus[$key]['Message']="Success";
              }
        }
        else
        {
            mysqli_rollback($conn);
        }	
        mysqli_close($conn);
	}
	 echo json_encode($DbStatus);
}
function update_usr_details() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $date = date('Y-m-d H:i:s');
	$fname = isset($_POST["fname"]) ? $_POST["fname"] : '';
	$lname = isset($_POST["lname"]) ? $_POST["lname"] : '';
    $Uid = isset($_POST["Uid"]) ? $_POST["Uid"] : '';
    $email = isset($_POST["email"])?$_POST["email"] : '';
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
	$emergency_mobile_number=isset($_POST["ephone"])?$_POST["ephone"] : '';
    $dob = isset($_POST['dob'])?$_POST['dob']:'';
	$qualification = isset($_POST['qual'])?$_POST['qual']:'';
	$institution = isset($_POST['inst'])?$_POST['inst']:'';
	$occupation = isset($_POST['occ'])?$_POST['occ']:'';
	$address = isset($_POST['address'])?$_POST['address']:'';
	$state = isset($_POST['state'])?$_POST['state']:'';
//$pic = $_POST['form-pic'];
//$doc = $_POST['form-doc'];
	$district = isset($_POST['dist'])?$_POST['dist']:'';
	$location = isset($_POST['geo'])?$_POST['geo']:'';
	$mid=isset($_POST["mid"])? $_POST["mid"] : '';
    
    if($Uid=='' && $email=='' && $phone ==''&& $address==''&&$mid=='')
    {
        echo json_encode($data['Status']);;
    }
    else
    {
        $query = "Update m_user SET first_name='".$fname."' , last_name='".$fname."' , email_id='".$email."',mobile_number='".$phone."',".
				 "emergency_mobile_number=".$emergency_mobile_number." , date_of_birth='".$dob."' , qualification='".$qualification."',".
				 "institution='".$institution."', occupation='".$occupation."', address='".$address."' , state='".$state."' ,district='".$district."',".
				 "location='".$location."' where user_id=". $Uid."";
       $query_log="INSERT INTO m_usr_log(UsrId,CUD_Mid ,Datetime,Status) ".
					" VALUES ( ".$Uid .",".$mid.",'".$date."','U')";
		include_once 'dbconnection.php';
		$conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
		mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_WRITE);
		$value = mysqli_query($conn, $query);
		$result=mysqli_query($conn, $query_log);
        if($value && $result )
        {
            mysqli_commit($conn);
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$value;
                    $DbStatus[$key]['Message']="Success";
              }
        }
        else
        {
            mysqli_rollback($conn);
        }	
        mysqli_close($conn);
		echo json_encode($DbStatus);
    }
}
function change_passsword() 
{
    include 'dbconnection.php';
    $dbHelper=new DB();
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $date = date('Y-m-d H:i:s');
    $vid = isset($_POST["vid"]) ? $_POST["vid"] : '';
    $pwdold = isset($_POST["oldpwd"]) ? $_POST["oldpwd"] : '';
    $pwdNew = isset($_POST["pwd"]) ? $_POST["pwd"] : '';
    
    if($vid=='' || $pwdold=='' || $pwdNew =='')
    {
        echo json_encode($data['Status']);;
    }
    else
    {
        $query = "select count(*) as count,pwd as password from m_volunteer where mobile_number='".$vid."' and pwd='".$password."'";  
        $result=$dbHelper->runSelectQuery($query);
        if (!is_array($result)&&count($result)<=0) 
        {
            foreach($DbStatus as $key=>$bal) {
                  $DbStatus[$key]['DBStatus']="0";
                  $DbStatus[$key]['Message']=$sql1;
              }
        }
        else
        {
            $count = $result[0]['count']; 
            $pwd = $result[0]['password']; 
            if(intval($count)==1)
            {   
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="User Not Available";
                      }
            }
            else if($pwd!=$pwdold )
            {
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="Old Password is not correct.";
                      }
            }
            else if($pwd!=$pwdNew )
            {
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="Old Password and New password cannot be same.";
                      }
            }
            else
            {
                
            }
                
            }
        }
}

function update_query($query) {
    include './dbconnection.php';
    
    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));


    //echo $query;

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Could not successfully run query ($query) from DB: " . mysql_error();
        exit;
    }
    mysqli_close($conn);
    return $result;
}

$possible_url = array("vconfirm", "bconfirm","vupdate","bupdate","vchangpass","bchangepass","userInfo","fpass");
$value = "An error has occurred";
//getUserInformation();
//$value = update_ratings();
//return JSON array
if (isset($_POST["action"]) && in_array($_POST["action"], $possible_url)) 
{
    switch ($_POST["action"]) 
    {
        case "vconfirm":
            blind_confirm();
            break;
        case "bconfirm" :
            blind_confirm();
            break;
        case "vupdate":
            create_request();
            break;
	case "bupdate":
            update_usr_details();
            break;
	case "vchangpass":
            change_passsword();
            break;
	case "bchangepass":
            create_request();
        case "userInfo":
            getUserInformation();
            break;
        case "fpass":
            getUserPass();
            break;
        }
    }
//echo create_request();
//exit(json_encode($value));	
function getUserInformation() {
    // including db connection details into search backend
    //session_id($username);
    session_start();
    //$id='9538088668';
    $id=$_SESSION['login_user'];
    if($id!='')
    {
        $path=getcwd();
        include '.\libs\dbconnection.php';
        $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($conn));
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$id."'";
        //$query = "SELECT  *  FROM  m_volunteer";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            $error=mysqli_error($result);
            mysqli_close($conn);
            echo "Could not successfully run query ($query) from DB: " . mysqli_error($conn);
        }
        else 
        {
            $data = array();
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
            {
                array_push($data, $row);
            }
            mysqli_close($conn);
        }
        //
        //$abc=$data;
        //$def=json_encode($abc);
        return $data;
    }
    else
    {
        return '';
    }
    
}
function getUserPass() {
    
    $email = isset($_POST["email"]) ? $_POST["email"] : '';;
    if($id!='')
    {
        $value=false;
    $value1=false;
    $included_files=get_included_files();
    foreach ($included_files as $filename) {
    $pieces = explode("\\", $filename);
    $value=in_array("dbconnection.php", $pieces);
    if($value==true)
    {
        $value1=true;
    };
    };
    if(!$value1)
        include 'dbconnection.php';
    $dbHelper=new DB();
    $result=$dbHelper->runSelectQuery("SELECT email_id as email FROM  m_volunteer v where v.mobile_number = '".$id."'");
    $email=$result['email'];
        
        //
        //$abc=$data;
        //$def=json_encode($abc);
        return $email;
    }
    else
    {
        return '';
    }
    
}
?>
