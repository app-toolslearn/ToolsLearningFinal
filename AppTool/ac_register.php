<?php
   if(!isset($_POST['send']))
   {
    ?>
	
    <?php }
else 
{  
     
      $email = $_POST['email'];
     


	  $password = $_POST['password'];

    $link = mysqli_connect("localhost","root","","app_toolslearning");
    mysqli_set_charset($link,'utf8');
    $sql = "app_toolslearning";
   /* if (!$link)
    {
        echo "ไม่สามารถเชื่อต่อได้";
    }
    else
    {
        //echo"เชื่อมต่อสำเร็จ";
    }*/
    
    
   if(isset($_POST['send'])){
    $sql = "SELECT admin_email FROM admin WHERE admin_email = '$email';";
    $result = mysqli_query($link, $sql);
       $num = mysqli_num_rows($result);
       
       if($num > 0)
       {
        echo "<script>alert('ไม่สามารถสมัครได้ อีเมลล์ของคุณซ้ำ');</script>";
        ?>
        <meta http-equiv='refresh' content='2;URL=register.php'>
        <?php
        }
    	else{
   		    $sql2 = "INSERT INTO admin(admin_email, admin_password) VALUES ('$email', '$password');";
               $result = mysqli_query($link,$sql2);
               if($result)
               {
                echo "<script>alert('สมัครเรียบร้อยเเล้ว โปรดเข้าสู่ระบบ');</script>";
                //exit();
                   //echo "การเพิ่มข้อมูลลงในฐานข้อมูลประสบความสำเร็จ<br>";
                   ?>
                   <meta http-equiv='refresh' content='2;URL=login.php'>
                   <?php
               }
               else {
                echo "<script>alert('เกิดข้อผิดพลาด');</script>";
                   //echo "ไม่สามารถเพิ่มข้อมูลใหม่ลงในฐานข้อมูลได้<br>";
                   //error_reporting(E_ALL);
               }
              
   	    }
       mysqli_close($link);
   }
  
       
       ?>
       <meta http-equiv='refresh' content='2;URL=register.php'>
       <?php

}

?>
