<?php

function getEducation()
{
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
    $dbHelper=new DB();
    $query="Select Id,Description From f_education";
    $data=$dbHelper->runSelectQuery($query);       
    return $data;
}
function getProfession()
{
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
    $dbHelper=new DB();
    $query="Select Id,Description From f_jobfunction order by ID asc";
    $data=$dbHelper->runSelectQuery($query);       
    return $data;
}

function getLanguages()
{
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
    $dbHelper=new DB();
    $query="Select Id,Description From f_language order by ID asc";
    $data=$dbHelper->runSelectQuery($query);       
    return $data;
}

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)) {
    $_empty_call = false;
    switch ($_GET["action"]) {
        case "state":
            $value = getState();
            break;
        case "city":
            $value = getCity();
            break;
        case "profession":
            $value = getProfession();
            break;
        case "education":
            $value = getEducation();
            break;
    }
	echo $value;
}

?>

