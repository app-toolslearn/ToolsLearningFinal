<?php
session_start();
error_reporting(~E_NOTICE);
$ses_status = $_SESSION['ses_status'];
$ses_userid =$_SESSION['ses_userid'];
$ses_email = $_SESSION['ses_email'];


if($ses_email ==" "){
	echo "<script>alert('Login เพื่อเข้าระบบ');</script>";
	echo "<meta http-equiv='refresh' content='2;URL=login.php' />";

}

else {
	$_SESSION['ses_status']=1;
?>
	<meta http-equiv='refresh' content='0;URL=home.php'>
<?php
}
?>