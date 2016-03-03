<?php
$mail=$_GET['mail'];
//mailto(1,"9538088668");
function mailto($mail,$id)
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
        include '.\libs\dbconnection.php';
    //Join
    if($mail=="1")
    {
        $dbHelper=new DB();
        $query = "SELECT * FROM  m_volunteer v where v.volunteer_id = '".$id."'";
        $result=$dbHelper->runSelectQuery($query);
        $to= $result[0]['email_id'];
        $vid= $result[0]['volunteer_id'];
        $confirmCode= $result[0]['confirmcode'];
        $subject = 'Thanks for joining & Email Verification';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
        $message.='Verification mail';
        $message.='</div>';
        $message.='<p>Dear '. $result[0]['first_name'] . $result[0]['last_name']." <br></br>".
                "<br></br>".
            "Firstly, a heartfelt 'Thank you' for having registered on BLINX a Volunteer..".
            "It means you believe in the power of good, in our country's '".
            "future and your ability to make a change.".
            "I look forward to hearing from you! </P>";
        $message.="<div style=font-family: Arial><br/>";
        $message.="click on the below link to verify your account ";
        $message.="<a href=".$_SERVER['SERVER_NAME']."/vconfirmation.php?id=".$vid."&email=".$to."&confirmation_code=".$confirmCode.">click</a>";
        $message.='</div>';
        $message.='</body></html>';
        require './libs/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'blinx.app@gmail.com';                 // SMTP username
        $mail->Password = 'tou9901715885';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->SMTPDebug  = 0;// TCP port to connect to
        $mail->setFrom('blinx.app@gmail.com', 'blinx');
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->addAddress($to, '');     // Add a recipient
        $mail->Subject = 'Thanks for joining & Email Verification';
        $mail->Body = $message;
        if(!$mail->send()) {
                     return $mail->ErrorInfo;
                    } else {
                        echo "0";
                    }
       }
	//RequestAcceptance
    if($mail=="2")
    {
        $value=false;
        $value1=false;
        $included_files=get_included_files();
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("dbconnection.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\dbconnection.php';
        $value=false;
        $value1=false;
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("request.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\request.php';
        $dbHelper=new DB();
        $data=run_query($id);
        session_start();
        //$vid=$_SESSION['mobile'];
        $vid='9538088668';
		//$uid=$data['uid'];
		$uid=1;
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$vid."'";
        $resultVol=$dbHelper->runSelectQuery($query);
		$query = "SELECT * FROM  m_user u where u.user_id = '".$uid."'";
        $resultUsr=$dbHelper->runSelectQuery($query);
        $to= $resultVol[0]['email_id'];
        $vid= $resultVol[0]['volunteer_id'];
        $subject = 'Request Acceptance';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<p>Dear '. $resultVol[0]['first_name'] . $resultVol[0]['last_name']." <br></br>".
            "Thanks you for accepting the request. The below are request details.".
            '</P>';
        $message.='<h4> Name :'.$data['first_name'] ." ". $data['last_name'].'</h4>'.
                    '<h4> Mobile :'. $data["mobile_number"]. '</h4>'.
                    '<h4> Type of service :'. $data["Description"]. '</h4>'.
					'<h4> Duration : '.$data["duration"].'Hrs </h4>'.
                    '<h4> Requested Date :'.$data["Requesteddate"].'</h4>'.
                    '<h4> Location : '.$data["Location"].'</h4>'.
                    '<h4> Location : https://www.google.com/maps/place/'. $data["latitude"].','.$data["longitude"].'<h4>'.
                    '<h4> Message : '.$data["Message"].'</h4>'.
                    '<h4> Address : '.$data["Address"].'</h4>';
        $message.='</body></html>';
		require './libs/PHPMailerAutoload.php';
                $mail = new PHPMailer();
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'blinx.app@gmail.com';                 // SMTP username
                $mail->Password = 'tou9901715885';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;
                $mail->SMTPDebug  = 2;// TCP port to connect to
                $mail->setFrom('blinx.app@gmail.com', 'blinx');
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->addAddress($to, '');     // Add 
                $mail->Subject = 'Thanks for joining & Email Verification';
                $mail->Body    = $message;
                if(!$mail->send()) {
                            return $mail->ErrorInfo;
                    } else {
                        return "0";
                    }
		$message='';
		$message = '<html><body>';
                $message.='<p>Dear '. $resultUsr[0]['first_name'] . $resultUsr[0]['last_name']." <br></br>".
                    "Your Request is accepted. The below are Volunteer details.".
                    '</P>';
                        $message.='<h4> Name :'.$resultVol[0]['first_name'] ." ". $resultVol['last_name'].'</h4>'.
                            '<h4> Mobile :'. $resultVol["mobile_number"]. '</h4>'.
                            '<h4> E-mail :'. $resultVol["email_id"]. '</h4>'.
                                                '<h4> Address : '.$resultVol["address"].'Hrs </h4>';
                        $message.="<br></br>".
                    "The below are Request details.".
                    '</P>';
                $message.='<h4> Name :'.$data['first_name'] ." ". $data['last_name'].'</h4>'.
                    '<h4> Mobile :'. $data["mobile_number"]. '</h4>'.
                    '<h4> Type of service :'. $data["Description"]. '</h4>'.
					'<h4> Duration : '.$data["duration"].'Hrs </h4>'.
                    '<h4> Requested Date :'.$data["Requesteddate"].'</h4>'.
                    '<h4> Location : '.$data["Location"].'</h4>'.
                    '<h4> Location : https://www.google.com/maps/place/'. $data["latitude"].','.$data["longitude"].'<h4>'.
                    '<h4> Message : '.$data["Message"].'</h4>'.
                    '<h4> Address : '.$data["Address"].'</h4>';
                $message.='</body></html>';
		$html1=$message;
                $mail->addAddress($to, '');     // Add a recipient
                $mail->Subject = 'Thanks for joining & Email Verification';
                $mail->Body    = $message;
                if(!$mail->send()) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                    } else {
                        echo 'Message has been sent';
                    }
            }
	//Request Cancelled.
    if($mail=="3")
    {
        $value=false;
        $value1=false;
        $included_files=get_included_files();
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("dbconnection.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\dbconnection.php';
        $value=false;
        $value1=false;
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("request.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\request.php';
   
        $dbHelper=new DB();
        $data=run_query($id);
        session_start();
        //$vid=$_SESSION['mobile'];
        $vid='9538088668';
		//$uid=$data['uid'];
		$uid=1;
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$vid."'";
        $resultVol=$dbHelper->runSelectQuery($query);
		$query = "SELECT * FROM  m_user u where u.user_id = '".$uid."'";
        $resultUsr=$dbHelper->runSelectQuery($query);
        $to= $resultVol[0]['email_id'];
        $vid= $resultVol[0]['volunteer_id'];
        $subject = 'Request Acceptance';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<p>Dear '. $resultVol[0]['first_name'] . $resultVol[0]['last_name']." <br></br>".
            "The request is cancelled. The below are request details.".
            '</P>';
        $message.='<h4> Name :'.$data['first_name'] ." ". $data['last_name'].'</h4>'.
                    '<h4> Mobile :'. $data["mobile_number"]. '</h4>'.
                    '<h4> Type of service :'. $data["Description"]. '</h4>'.
					'<h4> Duration : '.$data["duration"].'Hrs </h4>'.
                    '<h4> Requested Date :'.$data["Requesteddate"].'</h4>'.
                    '<h4> Location : '.$data["Location"].'</h4>'.
                    '<h4> Location : https://www.google.com/maps/place/'. $data["latitude"].','.$data["longitude"].'<h4>'.
                    '<h4> Message : '.$data["Message"].'</h4>'.
                    '<h4> Address : '.$data["Address"].'</h4>';
        $message.='</body></html>';
		$html=$message;
		echo $html;
        //mail($to, $subject, $message, $headers);
		$message='';
		$message = '<html><body>';
        $message.='<p>Dear '. $resultUsr[0]['first_name'] . $resultUsr[0]['last_name']." <br></br>".
            "Your Request is cancelled. The below are Volunteer details cancelled the request.".
            '</P>';
		$message.='<h4> Name :'.$resultVol[0]['first_name'] ." ". $resultVol['last_name'].'</h4>'.
                    '<h4> Mobile :'. $resultVol["mobile_number"]. '</h4>'.
                    '<h4> E-mail :'. $resultVol["email_id"]. '</h4>'.
					'<h4> Address : '.$resultVol["address"].'Hrs </h4>';
		$message.="<br></br>".
            "The below are Request details.".
            '</P>';
        $message.='<h4> Name :'.$data['first_name'] ." ". $data['last_name'].'</h4>'.
                    '<h4> Mobile :'. $data["mobile_number"]. '</h4>'.
                    '<h4> Type of service :'. $data["Description"]. '</h4>'.
					'<h4> Duration : '.$data["duration"].'Hrs </h4>'.
                    '<h4> Requested Date :'.$data["Requesteddate"].'</h4>'.
                    '<h4> Location : '.$data["Location"].'</h4>'.
                    '<h4> Location : https://www.google.com/maps/place/'. $data["latitude"].','.$data["longitude"].'<h4>'.
                    '<h4> Message : '.$data["Message"].'</h4>'.
                    '<h4> Address : '.$data["Address"].'</h4>';
		
        $message.='</body></html>';
		$html1=$message;
		echo $html1;
    }
	//Chnage Password
    if($mail=="4")
    {
        $value=false;
        $value1=false;
        $included_files=get_included_files();
        foreach ($included_files as $filename) 
        {
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
        session_start();
        $vid=$_SESSION['mobile'];
        $vid='9538088668';
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$vid."'";
        $result=$dbHelper->runSelectQuery($query);
        $to= $result[0]['email_id'];
        $vid= $result[0]['volunteer_id'];
        $confirmCode= $result[0]['confirmCode'];
        $subject = 'Change Password';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
        $message.='Request ACceptance';
        $message.='</div>';
        $message.='<p>Dear '. $result[0]['first_name'] . $result[0]['last_name']." <br></br>".
            "Your password is changed.".
            '</P>';
        $message.='</body></html>';
        mail($to, $subject, $message, $headers);
    }
	//ForgotPassword
	if($mail=="5")
    {
        $dbHelper=new DB();
        $query = "SELECT * FROM  m_volunteer v where v.email_id = '".$id."'";
        $result=$dbHelper->runSelectQuery($query);
        $to= $result[0]['email_id'];
        $vid= $result[0]['volunteer_id'];
        $confirmCode= $result[0]['confirmcode'];
        $subject = 'Thanks for joining & Email Verification';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
        $message.='Verification mail';
        $message.='</div>';
        $message.='<p>Dear '. $result[0]['first_name'] . $result[0]['last_name']." <br></br>".
                "<br></br>".
            "Firstly, a heartfelt 'Thank you' for having registered on BLINX a Volunteer..".
            "It means you believe in the power of good, in our country's '".
            "future and your ability to make a change.".
            "I look forward to hearing from you! </P>'";
        $message.='<div style=font-family: Arial;><br/>';
        $message.='click on the below link to verify your account ';
        $message.="<a href=".$_SERVER['SERVER_NAME']."/reset.php?id=".$vid."&email=".$to."&confirmation_code=".$confirmCode."'>click</a>'";
        $message.='</div>';
        $message.='</body></html>';
        mail($to, $subject, $message, $headers);
    }
	//ContactUs
	if($mail=="4")
    {
        $value=false;
        $value1=false;
        $included_files=get_included_files();
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("dbconnection.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\dbconnection.php';
        $value=false;
        $value1=false;
        foreach ($included_files as $filename) 
        {
            $pieces = explode("\\", $filename);
            $value=in_array("request.php", $pieces);
            if($value==true)
            {
                $value1=true;
            };
        };
        if(!$value1)
            include '.\libs\request.php';
   
        $dbHelper=new DB();
        $data=run_query($id);
        session_start();
        $vid=$_SESSION['mobile'];
        $vid='9538088668';
        $query = "SELECT * FROM  m_volunteer v where v.mobile_number = '".$vid."'";
        $result=$dbHelper->runSelectQuery($query);
        $to= $result[0]['email_id'];
        $vid= $result[0]['volunteer_id'];
        $confirmCode= $result[0]['confirmCode'];
        $subject = 'Request Acceptance';
        $headers = "From: blinx.app@gmail.com \r\n";
        $headers .= "Reply-To: email@domain.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $message = '<html><body>';
        $message.='<div style="width:550px; background-color:#CC6600; padding:15px; font-weight:bold;">';
        $message.='Request ACceptance';
        $message.='</div>';
        $message.='<p>Dear '. $result[0]['first_name'] . $result[0]['last_name']." <br></br>".
                "<br></br>".
            "your request is cancelled. The below are request details.".
            '</P>';
        $message.='<h4> Name :'.$data['first_name'] ." ". $data['last_name'].'</h4>'.
                    '<h4> Mobile :'. $data["mobile_number"]. '</h4>'.
                    '<h4> Type of service :'. $data["Description"]. '</h4>'.
		    '<h4> Duration : '.$data["duration"].'Hrs </h4>'.
                    '<h4> Requested Date :'.$data["Requesteddate"].'</h4>'.
                    '<h4> Location : '.$data["Location"].'</h4>'.
                    '<h4> Location : https://www.google.com/maps/place/'. $data["latitude"].','.$data["longitude"].'<h4>'.
                    '<h4> Message : '.$data["Message"].'</h4>'.
                    '<h4> Address : '.$data["Address"].'</h4>'.
                    '</p>';
        $message.='<div style=font-family: Arial;><br/>';
        $message.='</div>';
        $message.='</body></html>';
        mail($to, $subject, $message, $headers);
    }
}
?>
