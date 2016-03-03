<html>
<body>
<?php
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
        include '.\libs\dbconnection.php';
$dbHelper=new DB();
if(isset($_GET['id']) && isset($_GET['confirmation_code']) && isset($_GET['email']))
{
$id=$_GET['id'];
$code=$_GET['confirmation_code'];
$email=$_GET['email'];
$result=$dbHelper->runSelectQuery("select * from m_volunteer where volunteer_id='$id' AND email_id='$email' AND confirmcode='$code' ");
$row=count($result[0]);
if($row > 1)
{
$result=$dbHelper->runQuery("update m_volunteer set verified='1' where volunteer_id='$id' AND email_id='$email' AND confirmcode='$code'");
if($result==1)
{
echo "You have verified your mail ID";
}
}
}
?>
</body>
</html>
