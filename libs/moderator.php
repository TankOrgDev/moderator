<?php
date_default_timezone_set('Asia/Kolkata');
function get_all_volunteers()
{
	$value=all_volunteers();
	echo json_encode($value);
}
function get_all_blind()
{
	$value=all_blind();
	echo json_encode($value);
}
function usr_not_verified()
{
    include_once 'dbconnection.php';
    $where='';
    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user where status in('N')";
    if (isset($_GET["order"]) && isset($_GET["order"]) != '') {
        if (isset($_GET["order"]) == 'asc') {
            $order = " order by first_name asc";
        }
        $order = " order by first_name desc";
    } else {
        $order = " order by first_name desc";
    }
    $sql_final = $query . $where . $order;
    $result = mysqli_query($conn, $sql_final);
    if($result)
    {
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo json_encode($row);
    }
 else {
        echo $sql_final;
    }
    
}
function all_blind()
{
	 // including db connection details into search backend
    include_once 'dbconnection.php';
    $where='';
    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT user_id, first_name, last_name, email_id, mobile_number, emergency_mobile_number,".
			" date_of_birth, gender, qualification, institution, occupation, state, district, location, address,".
			" document_path, create_time, update_time, cud, status, m_id, verifier_mid ".
			" FROM m_user";

	if (isset($_GET["uid"]) && $_GET["uid"] != '') 
	{
		if (isset($_GET["searchType"]) && $_GET["searchType"] != '')
		{
			$searchType=$_GET["searchType"];
			if($searchType=="0")
				$where = " where user_id =".$_GET["uid"]."";
			else if($searchType=="1")
				$where="  where user_id like '".$_GET["uid"]."%'";
			else
				$where=" where user_id like '%".$_GET["uid"]."'";
		}
		else
		{
			$where = " where user_id =".$_GET["uid"]."";
		}
			
	}
	
	if (isset($_GET["email"]) && $_GET["email"] != '') 
	{
		if (isset($_GET["searchType"]) && $_GET["searchType"] != '')
		{
			$searchType=$_GET["searchType"];
			if($searchType=="0")
				$where = " where email_id =".$_GET["email"]."";
			else if($searchType=="1")
				$where=" where email_id like '".$_GET["email"]."%'";
			else
				$where=" where email_id like '%".$_GET["email"]."'";
		}
		else
		{
			$where = " where email_id =".$_GET["email"]."";
		}
			
	}
	if (isset($_GET["phone"]) && $_GET["phone"] != '') 
	{
		if (isset($_GET["searchType"]) && $_GET["searchType"] != '')
		{
			$searchType=$_GET["searchType"];
			if($searchType=="0")
				$where = "  where mobile_number =".$_GET["phone"]."";
			else if($searchType=="1")
				$where=" where mobile_number like '".$_GET["phone"]."%'";
			else
				$where=" where mobile_number like '%".$_GET["phone"]."'";
		}
		else
		{
			$where = "  where mobile_number =".$_GET["phone"]."";
		}
			
	}
	if (isset($_GET["name"]) && $_GET["name"] != '') 
	{
		if (isset($_GET["searchType"]) && $_GET["searchType"] != '')
		{
			$searchType=$_GET["searchType"];
			if($searchType=="0")
				$where = " where first_name =".$_GET["name"]."";
			else if($searchType=="1")
				$where=" where first_name like '".$_GET["name"]."%'";
			else
				$where=" where first_name like '%".$_GET["name"]."'";
		}
		else
		{
			$where = " where first_name =".$_GET["name"]."";
		}
			
	}
    //sort order comes here
    if (isset($_GET["order"]) && isset($_GET["order"]) != '') {
        if (isset($_GET["order"]) == 'asc') {
            $order = " order by first_name asc";
        }
        $order = " order by first_name desc";
    } else {
        $order = " order by first_name desc";
    }

    $sql_final = $query . $where . $order;

    $result = mysqli_query($conn, $sql_final);
    if (!$result) {
        echo "Could not successfully run query ($sql_final) from DB: " . mysql_error();
        exit;
    }
    $data['binfo'] = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($data['binfo'], $row);
    }
    //
    mysqli_close($conn);
    return $data['binfo'];
	//return $sql_final;
}
function all_volunteers()
{
	 // including db connection details into search backend
    include_once 'dbconnection.php';

   
    $where='';
    $conn = mysqli_connect($host, $user, $pass, $database) or die("Error " . mysqli_error($link));
    $query = "SELECT volunteer_id,first_name,last_name,email_id,mobile_number,longi,lati,create_time,update_time,cud FROM m_volunteer v ";

	  if (isset($_GET["vid"]) && $_GET["vid"] != '') {
		if (isset($_GET["searchType"]) && $_GET["searchType"] != '')
		{
			$searchType=$_GET["searchType"];
			if($searchType=="0")
				$where = " where volunteer_id =".$_GET["vid"]."";
			else if($searchType=="1")
				$where=" where volunteer_id like '".$_GET["vid"]."%'";
			else
				$where=" where volunteer_id like '%".$_GET["vid"]."'";
		}
		else
		{
			$where = " where volunteer_id =".$_GET["vid"]."";
		}
			
	  }

    //sort order comes here
    if (isset($_GET["order"]) && isset($_GET["order"]) != '') {
        if (isset($_GET["order"]) == 'asc') {
            $order = " order by v.first_name asc";
        }
        $order = " order by v.first_name desc";
    } else {
        $order = " order by v.first_name desc";
    }

    $sql_final = $query . $where . $order;

    $result = mysqli_query($conn, $sql_final);
    if (!$result) {
        echo "Could not successfully run query ($sql_final) from DB: " . mysql_error();
        exit;
    }
    $data['vinfo'] = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($data['vinfo'], $row);
    }
    //
    mysqli_close($conn);
    //return $data['vinfo'];
	return $sql_final;
}
$possible_url = array("vsearch", "bsearch","usr_not_verified","volunteer_not_verified");
if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)) {
    $_empty_call = false;

    switch ($_GET["action"]) {
        case "vsearch":
            $value = get_all_volunteers();
            break;
        case "bsearch":
                $value = get_all_blind();
            break;
        case "usr_not_verified":
                $value = usr_not_verified();
            break;
        case "volunteer_not_verified":
                $value = volunteer_not_verified();
            break;
    }
}
?>
