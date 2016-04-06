<?php
date_default_timezone_set('Asia/Kolkata');
include 'dbconnection.php';
echo "shashi";
function signup()
{
    echo "are u happy";
    $dbHelper=new DB();
    $conn=$dbHelper->connect();
    //$abc->close();
    $firstname = isset($_POST["fname"])? mysqli_real_escape_string($conn,$_POST["fname"]):'';
    //echo "$firstname";
    $lastname = isset($_POST["lname"])? mysqli_real_escape_string($conn,$_POST["lname"]):'';
    //echo "$lastname";
    $email = isset($_POST["email"])? mysqli_real_escape_string($conn,$_POST["email"]):'';
    //echo "$email";
    $phone = isset($_POST["phone"])? mysqli_real_escape_string($conn,$_POST["phone"]):'';
    //echo "$phone";
    $ephone = isset($_POST["ephone"])? mysqli_real_escape_string($conn,$_POST["ephone"]):'';
    //echo "$ephone";
    $sex = isset($_POST["sex"])? mysqli_real_escape_string($conn,$_POST["sex"]):'';
    //echo "$sex";
    $pwd = isset($_POST["passwd"])? mysqli_real_escape_string($conn,$_POST["passwd"]):'';
    $dob = isset($_POST["dob"])? mysqli_real_escape_string($conn,$_POST["dob"]):'';
    //echo "date of birth $dob";
    $stblind = isset($_POST["stblind"])? mysqli_real_escape_string($conn,$_POST["stblind"]):'';
    //echo "status of blindness $stblind";
    $stmobility = isset($_POST["stmobility"])? mysqli_real_escape_string($conn,$_POST["stmobility"]):'';
    //echo "status of the mobility $stmobility";
    $optechno = isset($_POST["optechno"])? mysqli_real_escape_string($conn,$_POST["optechno"]):'';
    //echo "optinal_technology $optechno";
    $hobies = isset($_POST["hobies"])? mysqli_real_escape_string($conn,$_POST["hobies"]):'';
    //echo "hobies are $hobies";
    $language = isset($_POST["lang"])? mysqli_real_escape_string($conn,$_POST["lang"]):'';
    //echo "lang $language";
    $planguage = isset($_POST["plang"])? mysqli_real_escape_string($conn,$_POST["plang"]):'';
    //echo "planguage are $planguage";
    $profession = isset($_POST["profession"])? mysqli_real_escape_string($conn,$_POST["profession"]):'';
    //echo "profession are $profession";
    $qualification = isset($_POST["qualification"])? mysqli_real_escape_string($conn,$_POST["profession"]):'';
    //echo "qualification are $qualification";
    $iname = isset($_POST["iname"])? mysqli_real_escape_string($conn,$_POST["iname"]):'';
    //echo "iname is the $iname";
    $pcode = isset($_POST["pincode"])? mysqli_real_escape_string($conn,$_POST["pincode"]):'';
    //echo "pincode is $pcode";
    $paddress = isset($_POST["paddress"])? mysqli_real_escape_string($conn,$_POST["paddress"]):'';
    //echo "permanent address is the $paddress";
    $taddress = isset($_POST["taddress"])? mysqli_real_escape_string($conn,$_POST["taddress"]):'';
    //echo "temporary address $taddress";
    $place1= isset($_POST["latitude"])? mysqli_real_escape_string($conn,$_POST["latitude"]):'';
    //echo "place1 $place1";
    $place2= isset($_POST["longitude"])? mysqli_real_escape_string($conn,$_POST["longitude"]):'';
    //echo "place 2 is $place2";
    $location=isset($_POST["autocomplete"])? mysqli_real_escape_string($conn,$_POST["autocomplete"]):'';
    //echo "location is $location";
    $dream = isset($_POST["dream"])? mysqli_real_escape_string($conn,$_POST["dream"]):'';
    //echo " dream is the $dream"; 
    $signup = isset($_POST["signup"])? mysqli_real_escape_string($conn,$_POST["signup"]):'';
    //echo "sigup status $signup";
    /*$firstname = isset($_POST["fname"])? $_POST["fname"]:'';
    $lastname = isset($_POST["lname"])? $_POST["lname"]:'';
    $email = isset($_POST["email"])? $_POST["email"]:'';
    $phone = isset($_POST["phone"])? $_POST["phone"]:'';
    $pwd = isset($_POST["passwd"])? $_POST["passwd"]:'';
    $place1= isset($_POST["latitude"])? $_POST["latitude"]:'';
    $place2= isset($_POST["longitude"])? $_POST["longitude"]:'';
    $location=isset($_POST["autocomplete"])? $_POST["autocomplete"]:'';
    $address=isset($_POST["address"])? $_POST["address"]:'';
    $signup = isset($_POST["signup"])? $_POST["signup"]:'';*/
    $pwd=  password_hash($pwd, PASSWORD_DEFAULT);
    if($signup=="Signup")
    {
	$data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
        $DbStatus=$data['Status'];		
        if($firstname=='' || $lastname=='' || $email==''|| $phone=='' || $place1=='' || $place2==''||$location==''||$taddress=='')
        {
                //ChromePhp::log('Hello console!');
                $status=$data['Status'];
        }
        else
        {
            //ChromePhp::log('Hello Bonsole!');
            $sql1="select count(*)  as count from m_user where mobile_number='".$phone."' or email_id='".$email."'";
            $result=$dbHelper->runSelectQuery($sql1);
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
                    if(intval($count)==0)
                    {
                            $sql2="select COALESCE(MAX(user_id), 0) as id from m_user";
                            $result1=$dbHelper->runSelectQuery($sql2);
                            if (!is_array($result1)&&count($result1)<=0) 
                            {
                                    foreach($DbStatus as $key=>$bal) {
                                    $DbStatus[$key]['DBStatus']="0";
                                    $DbStatus[$key]['Message']="Failed to run query";
                                    }
                            } 
                            else
                            {
			      echo "ur in insertion stage";
                               $id = $result1[0]['id'];
 			       echo "id is the $id"; 
                               $bid=intval($id)+1;
                                echo "bid value $bid";
                               $date = date('Y-m-d H:i:s');
                               echo "date is the and time $date";
                               $rand=rand(100000,100000000);
                               $sql="INSERT INTO m_user("
                                                        ."user_id"
                                                        .",first_name"
                                                        .",last_name"
                                                        .",email_id"
                                                        .",mobile_number"
                                                        .",emergency_mobile_number"
                                                        .",date_of_birth"
                                                        .",gender"
                                                        .",language"
                                                        .",planguage"
							.",blindness"
							.",mobility"
							.",technology"
							.",hobbies"
							.",dream"
                                                        .",occupation"
                                                        .",qualification"
                                                        .",institution"
                                                        .",paddress"
                                                        .",address"
                                                        .",pincode"
                                                        .",location"
                                                        .",lat"
                                                        .",longi"
                                                        .",document_path"
                                                        .",create_time"
                                                        .",cud"
                                                        .",status"
                                                        .",m_id"
                                                        .")"
                                                       . "VALUES"
                                                       . "( ".$bid.",'".$firstname."',"
                                                       . "'".$lastname."','".$email."','".$phone."','"
                                                       . "".$ephone."','".$dob."','".$sex."','".$language."',"
                                                       . "'".$planguage."','".$stblind."','".$stmobility."','".$optechno."','".$hobies."','".$dream."','".$profession."','".$qualification."','".$iname."',"
                                                       . "'".$paddress."','".$taddress."','".$pcode."','".$location."',"
                                                       . "'".$place1."','".$place2."','','".$date."',"
                                                       . "'C','N','1')";
                                                       $affected=$dbHelper->runQuery($sql);
                                            if ($affected==0)
                                            {
                                                
                                                    foreach($DbStatus as $key=>$bal) {
                                                            $DbStatus[$key]['DBStatus']="0";
                                                            $DbStatus[$key]['Message']=$sql;
                                                    }
                                                    header("Location: ./aftersignin.php?status=JF");
                                            }
                                            else
                                            {
                                               foreach($DbStatus as $key=>$bal) {
                                                            $DbStatus[$key]['DBStatus']="1";
                                                            $DbStatus[$key]['Message']="Success";
                                                    }
                                                    session_start();
                                                    $_SESSION['vid']=$bid;
                                                    $_SESSION['email']=$email;
                                                    $_SESSION['mobile']=$phone;
                                                    $_SESSION['name']=$fname;
                                                    $_SESSION['start'] = time(); // Taking now logged in time.
                                                    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                                                    header("Location: ./aftersignin.php?status=JP");
                                            }
                            }
                    }
                    else
                    {
                                    foreach($DbStatus as $key=>$bal) {
                                    $DbStatus[$key]['DBStatus']="2";
                                    $DbStatus[$key]['Message']="User is already registered";
                            }
                    }

            }
            $status=$DbStatus;
        }
    }
    else
    {

    }
    return $status;
}

function changepasssword()
{
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
        $status=$data['Status'];
    }
    else
    {
        $query = "select count(*) as count,pwd as password from m_volunteer where volunteer_id='".$vid."'";  
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
            
            if(intval($count)==0)
            {   
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="User Not Available";
                      }
            }
            else 
            {
                $query = "select count(*) as count,pwd as password from m_volunteer where volunteer_id='".$vid."' and pwd='".$pwdold."'";  
                $result=$dbHelper->runSelectQuery($query);
                $pwd = $result[0]['password']; 
            if($pwd!=$pwdold )
            {
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="Old Password is not correct.";
                      }
            }
            else if($pwd==$pwdNew )
            {
                foreach($DbStatus as $key=>$bal) {
                          $DbStatus[$key]['DBStatus']="0";
                          $DbStatus[$key]['Message']="Old Password and New password cannot be same.";
                      }
            }
            else
            {
                $query = "update m_volunteer set pwd='".$pwdNew."' where volunteer_id='".$vid."'";  
                $affected=$dbHelper->runQuery($query);
                if (!$affected>0)
                {
                        foreach($DbStatus as $key=>$bal) {
                                $DbStatus[$key]['DBStatus']="0";
                                $DbStatus[$key]['Message']=$sql;
                        }
                        header("Location: ./aftersignin.php?status=CF");
                }
                else
                {
                   foreach($DbStatus as $key=>$bal) {
                                $DbStatus[$key]['DBStatus']="1";
                                $DbStatus[$key]['Message']="Success";
                        }
                        header("Location: ./aftersignin.php?status=CP");
                }
            }
             $status=$DbStatus;   
            }
        }
            
        }
        $status=$DbStatus;   
        return $status;
    }
    function restpasssword()
    {
    $dbHelper=new DB();
    $data['Status'] = array(
        array("DBStatus" => "2", "Message" => "Values are Empty")
            );
    $DbStatus=$data['Status'];
    $date = date('Y-m-d H:i:s');
    $vid = isset($_POST["vid"]) ? $_POST["vid"] : '';
    $pwdNew = isset($_POST["pwd"]) ? $_POST["pwd"] : '';
    if($vid=='' || $pwdNew =='')
    {
        $status=$data['Status'];
    }
    else
    {
                $query = "update m_volunteer set pwd='".$pwdNew."' where volunteer_id='".$vid."'";  
                $affected=$dbHelper->runQuery($query);
                if (!$affected>0)
                {
                        foreach($DbStatus as $key=>$bal) {
                                $DbStatus[$key]['DBStatus']="0";
                                $DbStatus[$key]['Message']=$sql;
                        }
                        header("Location: ./aftersignin.php?status=CF");
                }
                else
                {
                   foreach($DbStatus as $key=>$bal) {
                                $DbStatus[$key]['DBStatus']="1";
                                $DbStatus[$key]['Message']="Success";
                        }
                        header("Location: ./aftersignin.php?status=CP");
                }
            
       }
        $status=$DbStatus;   
        return $status;
    }
    function getUserPass() {
    
    $email = isset($_POST["email"]) ? $_POST["email"] : '';;
    if($email!='')
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
    $result=$dbHelper->runSelectQuery("SELECT volunteer_id as vid,email_id as email FROM  m_volunteer v where v.email_id = '".$email."'");
    $emailDb=$result[0]['email'];
    $vid=$result[0]['vid'];
    if($emailDb==$email)
    {
        header("Location: ./forgotpassword.php?vid=".$vid."");
    }
    else
    {
        return '';
    }
    }
}
$possible_url = array("changepass", "signup","fpass","passreset");
if (isset($_POST["action"]) && in_array($_POST["action"], $possible_url)) 
{
    switch ($_POST["action"]) 
    {
	case "changepass":
            $status=changepasssword();
            break;
        case "signup":
            $status=signup();
            break;
        case "fpass":
            getUserPass();
        case "passreset":
            $status=restpasssword();
            break;
    }
    echo $status;
}
?>		
