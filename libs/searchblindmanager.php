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
    
function ByFname() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user";
    if (isset($_POST["fname"]) && $_POST["fname"] != '') 
    {
        $where = " where first_name =".$_POST["fname"]."";
    }
    $order = " order by first_name asc";
    $query=$query.$where.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}
function ByLname() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user";
    if (isset($_POST["lname"]) && $_POST["lname"] != '') 
    {
        $where = " where last_name =".$_POST["lname"]."";
    }
    $order = " order by last_name asc";
    $query=$query.$where.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}
function ById() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user";
    if (isset($_POST["uid"]) && $_POST["uid"] != '') 
    {
        $where = " where user_id =".$_POST["uid"]."";
    }
    $order = " order by user_id asc";
    $query=$query.$where.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}
function ByEmail() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user";
    if (isset($_POST["email"]) && $_POST["email"] != '') 
    {
        $where = " where email_id =".$_POST["email"]."";
    }
    $order = " order by email_id asc";
    $query=$query.$where.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}
function ByPhone() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user";
    if (isset($_POST["phone"]) && $_POST["phone"] != '') 
    {
        $where = " where mobile_number =".$_POST["phone"]."";
    }
    $order = " order by mobile_number asc";
    $query=$query.$where.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}
function ByNewStatus() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user where status='N'";
    $order = " order by mobile_number asc";
    $query=$query.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}
function ByConfirmStatus() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user where status='C'";
    $order = " order by mobile_number asc";
    $query=$query.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}
function ByRejectStatus() {
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $phone = isset($_POST["phone"])?$_POST["phone"] : '';
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user where status='R'";
    $order = " order by mobile_number asc";
    $query=$query.$order;
        $dbHelper=new DB();
        $result=$dbHelper->runSelectQuery($query);
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
        return $DbStatus;
}

$possible_url = array( "byphone","byemail","byid","byfname","bylname","new","reject","confirm");
$value = "An error has occurred";
//$value = update_ratings();
//return JSON array
if (isset($_POST["action"]) && in_array($_POST["action"], $possible_url)) {
    switch ($_POST["action"]) {
        case "byphone":
            echo ByPhone();
            break;
        case "byemail":
            echo ByEmail();
            break;
        case "byid":
            echo ById();
            break;
        case "byfname":
            echo ByFname();
            break;
        case "bylname":
            echo ByLname();
        case "bylname":
            echo ByNewStatus();
        case "bylname":
            echo ByConfirmStatus();
        case "bylname":
            echo ByRejectStatus();
            break;
    }
    }
    else
    {
            return "NI";
    }
exit;
?>
