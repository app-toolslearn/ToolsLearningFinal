<?php
	session_start();
    include "connectdb.php";
    $email = mysql_escape_string($email);
    $password = mysql_escape_string($password);
	$strSQL = "SELECT * FROM admin WHERE admin_email = '".mysql_real_escape_string($_POST['email'])."' 
	and admin_password = '".mysql_real_escape_string($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Email and Password Incorrect!";
	}
	else
	{
			$_SESSION["admin_id"] = $objResult["admin_id"];
			$_SESSION["admin_email"] = $objResult["admin_email"];
            $_SESSION["admin_password"] = $objResult["admin_password"];

			session_write_close();
			
			if($objResult["admin_id"] == $_SESSION["admin_id"])
			{
				header("location:home.php");
			}
			else
			{
				header("location:login.php");
			}
	}
	mysql_close();
?>