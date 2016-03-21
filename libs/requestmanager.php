<?php

// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.
date_default_timezone_set('Asia/Kolkata');

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


function CancelRequestByBlind() {
    $date = date('Y-m-d H:i:s');
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $mid = isset($_POST["mid"]) ? $_POST["mid"] : '';
    $vid = isset($_POST["vid"]) ? $_POST["vid"] : '';
    $reqId = isset($_POST["reqID"]) ? $_POST["reqID"] : '';
    $UsrId = isset($_POST["Uid"]) ? $_POST["Uid"] : '0';
    $mId='0';
    if($reqId=='' || $vid=='' || $status =='' )
    {
        echo json_encode($data['Status']);;
    }
    else
    {
        $mId=isset($_POST["Mid"]) ? $_POST["Mid"] : '0';
        $query = "UPDATE t_help_request set Status = 'CN' where Id = $reqId ";
        $query_log="INSERT INTO t_help_request_log(Id,UserId ,Datetime,Status,VolunteerId,Mid,InternalStaus) ".
            " VALUES ( ".$reqId .",".$UsrId.",'".$date."','CN',".$vid.",".$mId.",'BMCN')";
        $dbHelper=new DB();
        //$result=$dbHelper->runQuery($query);
        $result=$dbHelper->runMultipleQuery($query, $query_log);
        if($result)
        {
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$value;
                    $DbStatus[$key]['Message']="Success";
              }
        }
        else
        {
			foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']="Failed to run query";
              }
        }
       return json_encode($DbStatus);
    }
}
function CancelRequestByVolunteer() {
    $date = date('Y-m-d H:i:s');
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $mid = isset($_POST["mid"]) ? $_POST["mid"] : '';
    $reqId = isset($_POST["reqID"]) ? $_POST["reqID"] : '';
    $UsrId = isset($_POST["Uid"]) ? $_POST["Uid"] : '0';
    $mId='0';
    if($reqId=='' || $vid=='' || $status =='' )
    {
        echo json_encode($data['Status']);;
    }
    else
    {
        $mId=isset($_POST["Mid"]) ? $_POST["Mid"] : '0';
        $query = "UPDATE t_help_request set Status = 'CN' where Id = $reqId ";
        $query_log="INSERT INTO t_help_request_log(Id,UserId ,Datetime,Status,VolunteerId,Mid,InternalStaus) ".
            " VALUES ( ".$reqId .",".$UsrId.",'".$date."','CN',".$vid.",".$mId.",'VMCN')";
        $dbHelper=new DB();
        //$result=$dbHelper->runQuery($query);
        $result=$dbHelper->runMultipleQuery($query, $query_log);
        if($result)
        {
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$value;
                    $DbStatus[$key]['Message']="Success";
              }
        }
        else
        {
			foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']="Failed to run query";
              }
        }
       return json_encode($DbStatus);
    }
}
function CloseRequest() {
    $date = date('Y-m-d H:i:s');
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $mid = isset($_POST["mid"]) ? $_POST["mid"] : '';
    $reqId = isset($_POST["reqID"]) ? $_POST["reqID"] : '';
    $UsrId = isset($_POST["Uid"]) ? $_POST["Uid"] : '0';
    $mId='0';
    if($reqId=='' || $vid=='' || $status =='' )
    {
        echo json_encode($data['Status']);;
    }
    else
    {
        $mId=isset($_POST["Mid"]) ? $_POST["Mid"] : '0';
        $query = "UPDATE t_help_request set Status = 'CL' where Id = $reqId ";
        $query_log="INSERT INTO t_help_request_log(Id,UserId ,Datetime,Status,VolunteerId,Mid,InternalStaus) ".
            " VALUES ( ".$reqId .",".$UsrId.",'".$date."','CL',".$vid.",".$mId.",'MCL')";
        $dbHelper=new DB();
        //$result=$dbHelper->runQuery($query);
        $result=$dbHelper->runMultipleQuery($query, $query_log);
        if($result)
        {
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$value;
                    $DbStatus[$key]['Message']="Success";
              }
        }
        else
        {
			foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']="Failed to run query";
              }
        }
       return json_encode($DbStatus);
    }
}
function FailedRequest() {
    $date = date('Y-m-d H:i:s');
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $mid = isset($_POST["mid"]) ? $_POST["mid"] : '';
    $reqId = isset($_POST["reqID"]) ? $_POST["reqID"] : '';
    $UsrId = isset($_POST["Uid"]) ? $_POST["Uid"] : '0';
    $mId='0';
    if($reqId=='' || $vid=='' || $status =='' )
    {
        echo json_encode($data['Status']);;
    }
    else
    {
        $mId=isset($_POST["Mid"]) ? $_POST["Mid"] : '0';
        $query = "UPDATE t_help_request set Status = 'FA' where Id = $reqId ";
        $query_log="INSERT INTO t_help_request_log(Id,UserId ,Datetime,Status,VolunteerId,Mid,InternalStaus) ".
            " VALUES ( ".$reqId .",".$UsrId.",'".$date."','FA',".$vid.",".$mId.",'MFA')";
        $dbHelper=new DB();
        //$result=$dbHelper->runQuery($query);
        $result=$dbHelper->runMultipleQuery($query, $query_log);
        if($result)
        {
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$value;
                    $DbStatus[$key]['Message']="Success";
              }
        }
        else
        {
			foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']="0";
                    $DbStatus[$key]['Message']="Failed to run query";
              }
        }
       return json_encode($DbStatus);
    }
}
function create_request() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $date = date('Y-m-d H:i:s');
    $Uid = isset($_POST["Uid"]) ? $_POST["Uid"] : '';
    $email = isset($_POST["email"])?$_POST["email"] : '';
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $helpdId = isset($_POST["helpId"])?$_POST["helpId"] : '';
    $requestdate = isset($_POST["requesteddate"])?$_POST["requesteddate"] : '';
    $place1= isset($_POST["location1"])?$_POST["location1"] : '';
    $place2= isset($_POST["location2"])?$_POST["location2"] : '';
    $location=$place1.$place2;
    $message= isset($_POST["message"])?$_POST["message"] : '';
    $address= isset($_POST["address"])?$_POST["address"] : '';
    $latitide = isset($_POST["lat"])?$_POST["lat"] : '';
    $logitude = isset($_POST["long"])?$_POST["long"] : '';
    $duration = isset($_POST["duration"])?$_POST["duration"] : '';
    $status = isset($_POST["status"]) ? $_POST["status"] : '';
    $meetingType = isset($_POST["meeting"]) ? $_POST["meeting"] : '';
    $language = isset($_POST["language"])?$_POST["language"] : '';
    
    if($Uid=='' || $email=='' || $phone ==''||$helpdId==''||$latitide==''||$logitude=='' )
    {
        echo json_encode($data['Status']);;
    }
    else
    {
        $query = "select COALESCE(MAX(Id), 0) as MaxID from t_help_request";
        $value=  update_query($query);
        $row= mysqli_fetch_array( $value,MYSQLI_ASSOC);
        $txnid=intval($row["MaxID"])+1;
        $sql="INSERT INTO t_help_request (Id,phone,email,UserId,helpId,Message,Address,"
                                . "Location,Createddate,Requesteddate,latitude,longitude,Duration,Status,"
                                . "Language,Meetingtype)"
                                . "VALUES( $txnid,'$phone','$email','$Uid','$helpdId',"
                                . "'$message','$address','$location','$requestdate',"
                                . "'$date','$latitide','$logitude','$duration','NC','$language','$meetingType')";
        $query_log="INSERT INTO t_help_request_log(Id,UserId ,Datetime,Status,VolunteerId,Mid,InternalStatus) ".
            " VALUES ( ".$reqId .",".$UsrId.",'".$date."','NC',".$vid.",".$mId.",'BMC')";
        $result=  update_query($sql);
        if($result)
        {
            foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$result;
                    $DbStatus[$key]['Message']="Success";
              }
        }
        else
        {
             foreach($DbStatus as $key=>$bal) {
                    $DbStatus[$key]['DBStatus']=$result;
                    $DbStatus[$key]['Message']="Failure";
              }
        }
        //echo $sql;
        //echo json_encode($DbStatus);
        //return $data['Status'];
    }
}
$possible_url = array( "create_request","cancel_request_blind","cancel_request_volunteer","close_request","failed");
$value = "An error has occurred";
//$value = update_ratings();
//return JSON array
if (isset($_POST["action"]) && in_array($_POST["action"], $possible_url)) {
    switch ($_POST["action"]) {
        case "cancel_request_blind":
            echo CancelRequestByBlind();
            break;
        case "cancel_request_volunteer":
            echo CancelRequestByVolunteer();
            break;
        case "close_request":
            echo CloseRequest();
            break;
        case "create_request":
            echo CreateRequest();
            break;
        case "failed":
            echo FailedRequest();
            break;
    }
    }
    else
    {
            return "NI";
    }
exit;
?>
