<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Check login</title>
</head>
<body>
	<?php
	   error_reporting(~E_NOTICE);
		$email = $_POST['email'];
		$password = $_POST['password'];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "app_toolslearning";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		mysqli_set_charset($conn,'utf8');
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM admin WHERE admin_email ='$email' AND admin_password = '$password'";
		$p=mysqli_query($conn,$sql);
		$num = mysqli_num_rows($p);
		if($num <=0) {
			echo "ไม่พบชื่อผู้ใช้นี้ในฐานข้อมูล";
			echo "<meta http-equiv='refresh' content='2;URL=login.php' />";
		}    
		else {
			$row=mysqli_fetch_array($p);
			$_SESSION['ses_userid'] = session_id();
			$_SESSION['ses_Tel'] = $Tel;
			$_SESSION['ses_status']=0;
			$_SESSION['ses_adminid']=$row['admin_password'];
			echo "<meta http-equiv='refresh' content='0;URL=check_login2.php' />";
		}
	?>

</body>
</html>


	