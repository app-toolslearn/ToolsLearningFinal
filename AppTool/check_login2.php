<?php
session_start();
$ses_status = $_SESSION['ses_status'];
$ses_userid =$_SESSION['ses_userid'];
$ses_email = $_SESSION['ses_email'];
if($ses_userid <> session_id() or  $ses_email ==" "){
	echo "คุณยังไม่ได้ทำการ Log in";
	echo "<meta http-equiv='refresh' content='2;URL=login.php' />";
}
else if($ses_email == "9999999999"){
	?>
	<meta http-equiv='refresh' content='0;URL=admin.php'>
	<?php
}
else {
	$_SESSION['ses_status']=1;
?>
	<meta http-equiv='refresh' content='0;URL=header.php'>
<?php
}
?>