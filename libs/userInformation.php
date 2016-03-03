<?php

/**
 * 
 * @return array
 */
function run_query($_reqId) {

    // including db connection details into search backend
    include_once 'dbconnection.php';

    $_id = $_reqId;

    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT  h.Id, h.Description, u.first_name, u.last_name, u.mobile_number, u.gender, u.user_id, req.Id as reqID, req.Message,req.Address,req.Location,req.Createddate,req.Requesteddate,req.latitude,req.longitude,req.duration,req.Status FROM  t_help_request req, m_user u , f_help h where req.userId = u.user_id and h.Id = req.helpId  and req.Id = $_id";
	//$query = "SELECT  h.Id, h.Description, u.first_name, u.last_name, u.mobile_number, u.gender, u.user_id, req.Id, req.Message,req.Address,req.Location,req.Createddate,req.Requesteddate,req.latitude,req.longitude,req.duration FROM  t_help_request req, m_user u , f_help h where req.userId = u.user_id and h.Id = req.helpId and req.Id=1"

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "Could not successfully run query ($query) from DB: " . mysql_error();
        exit;
    }
    //
    $data["request"] = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($data["request"], $row);
        break; //only one request.
    }
    return $data;
}

/**
 * 
 * @return array
 */
function getUserInformation($_id) {

    // including db connection details into search backend
    include_once 'dbconnection.php';

    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT   *  FROM  m_user req.user_Id = $_id;";

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
