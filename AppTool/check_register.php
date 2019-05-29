<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
 <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
    <style type="text/css">
    #alert {
        width: 100%;
        height: 40px;
    }
    body {
        /* font-family: 'mitr-regular-webfont' !important; */
        background: url(img/bg.png);
        background-size: cover;
        font-family: 'PT Sans', sans-serif;
        font-family: 'Kanit', sans-serif;
    }
    #block {
        margin: auto auto;
        display: block;
        padding-top: 60px;
        display: flex;
        justify-content: center;
    }
    button {
        background:#129cff;
        color:white;
        border-radius: 5px;
        cursor: pointer;
        width: 300%;
        height: 40px;
    }
    .card {
        padding-top: 10px;
        background:#f7f7f7;
        height: 50%;
        width: 40%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        margin: auto auto;
        margin-top: 30px;
        /* display: flex;
        justify-content: center; */
        /* vertical-align: middle; */
        /* 5px rounded corners */
    }
    #form {
        margin: top;
    }

    .pic {
        margin-top: 20%;
        height: 25%;
        margin: auto auto;
        /* display: block; */
    }
    #text {
        font-size: 20px;
        text-align: center;
        margin-bottom:5px;
    }
    .a{
        text-align: center;
        margin-top: 15%;
    }
    </style>
    </head>
<?php
   if(!isset($_POST['send']))
   {
     
    ?>
	  
    <?php }
      $email = $_POST['email'];
      $password = $_POST['password'];
       if($email == "" or $password=="")
       {
        echo "<script>alert('โปรดกรอก อีเมล เเละรหัสผ่านของคุณ');</script>";
        ?>
		<meta http-equiv='refresh' content='2;URL=register.php'>
		<?php
       }

else 
{  
      $email = $_POST['email'];
      $password = $_POST['password'];
      
      $link = mysqli_connect("ssitconsultant.com","ssit_demo_tools","P@ssw0rd","app_toolslearning");
      mysqli_set_charset($link,'utf8');
      $sql = "app_toolslearning";
  
       $sql = "SELECT admin_email FROM admin WHERE admin_email = '$email';";
       $result = mysqli_query($link, $sql);
       $num = mysqli_num_rows($result);
       
       if($num > 0)
       {
       
       ?>
          <div id="alert">
            <div class='alert alert-danger'>
            ไม่สามารถสมัครได้ อาจเกิดการซ้ำของข้อมูล
            </div>
        </div>
       <?php
        }
    	else{
   		    $sql2 = "INSERT INTO admin(admin_email, admin_password) VALUES ('$email', '$password');";
               $result = mysqli_query($link,$sql2);
               if($result)
               {
                echo "<script>alert('สมัครเรียบร้อยเเล้ว โปรดเข้าสู่ระบบ');</script>";    
               }
               else {
                echo "<script>alert('เกิดข้อผิดพลาด');</script>";
                   
               }     
   	    }
       mysqli_close($link);
       ?>
		<meta http-equiv='refresh' content='2;URL=login.php'>
		<?php
      
}

?>
</body>

</html>