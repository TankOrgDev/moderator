<?php
session_start();
$vId=$_SESSION['vid'];
if(!isset($_SESSION['vid']))
{
    
}
else
{
    $now = time(); // Checking the time now when home page starts.
    if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
        }
 else {
     $vName='';
    session_start();
    $vName=$_SESSION['name'];
 }
}
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand visible-xs" href="<?php echo URL_HOME ?>">BLINX</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav nav-left">
                <li <?php echo ($_pageid == 3) ? 'class="active"' : '' ?>><a href="<?php echo URL_HOME ?>">Home</a></li>
                <li <?php echo ($_pageid == 5) ? 'class="active"' : '' ?>><a href="<?php echo URL_SEARCH ?>">Search</a></li>
            </ul>
            <a href="#" class="logo visible-lg visible-md">
                <img src="resources/img/logo.jpg" alt="blinx">
            </a>
            <div id="brand" class="visible-lg visible-md">&nbsp;</div>
            <ul class="nav navbar-nav nav-right">
				<li class="dropdown">
						<a href="#" class="dropdown-toggle <?php echo (($_pageid == 2) || ($_pageid == 1)) ? 'class="active"' : '' ?>" data-toggle="dropdown">Request<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li <?php echo ($_pageid == 2) ? 'class="active"' : '' ?>><a href="<?php echo URL_HOW_IT_WORK ?>">Create New</a></li>
							<li <?php echo ($_pageid == 1) ? 'class="active"' : '' ?>><a href="<?php echo URL_CONTACT ?>">Update/Confirm</a></li>
							<li <?php echo ($_pageid == 45) ? 'class="active"' : '' ?>><a href="<?php echo URL_FAQ ?>">Search</a></li>
						</ul>
					</li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle <?php echo (($_pageid == 2) || ($_pageid == 1)) ? 'class="active"' : '' ?>" data-toggle="dropdown">Beneficiary<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li <?php echo ($_pageid == 2) ? 'class="active"' : '' ?>><a href="<?php echo URL_HOW_IT_WORK ?>">Create New</a></li>
                        <li <?php echo ($_pageid == 1) ? 'class="active"' : '' ?>><a href="<?php echo URL_CONTACT ?>">Update/Confirm</a></li>
                        <li <?php echo ($_pageid == 45) ? 'class="active"' : '' ?>><a href="<?php echo URL_FAQ ?>">Search</a></li>
                    </ul>
                </li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle <?php echo (($_pageid == 2) || ($_pageid == 1)) ? 'class="active"' : '' ?>" data-toggle="dropdown">Volunteer<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li <?php echo ($_pageid == 1) ? 'class="active"' : '' ?>><a href="<?php echo URL_CONTACT ?>">Update/Confirm</a></li>
                        <li <?php echo ($_pageid == 45) ? 'class="active"' : '' ?>><a href="<?php echo URL_FAQ ?>">Search</a></li>
                    </ul>
                </li>
                <?php if($vName!='') { ?> <!-- some hide class or some magic -->
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle <?php echo (($_pageid == 2) || ($_pageid == 1)) ? 'class="active"' : '' ?>" data-toggle="dropdown"><?php echo $vName ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li <?php echo ($_pageid == 2) ? 'class="active"' : '' ?>><a href="<?php echo URL_HOW_IT_WORK ?>">Profile</a></li>
                        <li><a href="<?php echo URL_VREQUESTS ?>">Requests History</a></li>
                        <li <?php echo ($_pageid == 1) ? 'class="active"' : '' ?>><a href="<?php echo URL_CHPASS ?>">Change Password</a></li>
                        <li <?php echo ($_pageid == 1) ? 'class="active"' : '' ?>><a href="<?php echo URL_LOGOUT ?>">Logout</a></li>
                    </ul>
                 </li>
                <?php } else {
                     ?>
                <li><a href="<?php echo URL_SIGNIN ?>">Login</a></li>
                <?php }
                  ?>
            </ul>
                 
        </div>
    </div>
</nav>
