<?php

/**
 * 
 * @return array
 */
function run_query($_reqId) {

    //error_reporting(E_ALL ^ E_NOTICE);
    // including db connection details into search backend
    $value=false;
    $value1=false;
    $included_files = get_included_files();
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
    
 
    $_id = $_reqId;
    $dbHelper=new DB();

    //$conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT  h.Id, h.Description, u.first_name, u.last_name, u.mobile_number, u.gender, u.user_id, req.Id as reqID, req.Message,req.Address,req.Location,req.Createddate,req.Requesteddate,req.latitude,req.longitude,req.duration,req.Status FROM  t_help_request req, m_user u , f_help h where req.userId = u.user_id and h.Id = req.helpId  and req.Id = $_id";
	//$query = "SELECT  h.Id, h.Description, u.first_name, u.last_name, u.mobile_number, u.gender, u.user_id, req.Id, req.Message,req.Address,req.Location,req.Createddate,req.Requesteddate,req.latitude,req.longitude,req.duration FROM  t_help_request req, m_user u , f_help h where req.userId = u.user_id and h.Id = req.helpId and req.Id=1"

    $result = $dbHelper->runSelectQuery($query);
    if (!$result) {
        echo "Could not successfully run query ($query) from DB: " . mysql_error();
        exit;
    }
    //
    /*$data["request"] = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($data["request"], $row);
        break; //only one request.
    }*/
    return $result[0];
}

/**
 * 
 * @return array
 */
function getAllList($_id) {

    // including db connection details into search backend
    include_once 'dbconnection.php';

    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT   *  FROM  t_help_request req, m_user u , f_help h  where req.userId = u.user_id and h.Id = req.helpId and req.userId = $_id;";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Could not successfully run query ($query) from DB: " . mysql_error();
        exit;
    }
    //
    $data["request"] = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($data["request"], $row);
    }
    return $data;
}
function getUserInformation($_id) {

    // including db connection details into search backend
    include_once 'dbconnection.php';

    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT   *  FROM  m_user usr usr.user_Id = $_id;";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Could not successfully run query ($query) from DB: " . mysql_error();
        exit;
    }
    //
    $data["request"] = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($data["request"], $row);
    }
    return $data;
}
