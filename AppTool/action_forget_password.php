<?php
//action.php
$connect = mysqli_connect("ssitconsultant.com", "ssit_demo_tools", "P@ssw0rd", "app_toolslearning");
mysqli_set_charset($connect, "utf8");
$param_email = $_GET['user_email'];

$sql = "SELECT * FROM user WHERE user_email = '" . $param_email . "'";
$result = mysqli_query($connect, $sql);
$rowuser = mysqli_fetch_assoc($result);
if (!empty($rowuser)) {

  // random พาสเวิร์ดใหม่ บรรทัด 13-19
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';

  for ($i = 0; $i < 8; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $randomString .= $characters[$index];
  }

  // อัพเดท password เป็น password ใหม่ที่ random key มา
  $sql = "UPDATE user SET user_password = '" . md5($randomString) . "' where user_email = '".$rowuser["user_email"]. "'";
  mysqli_query($connect, $sql);


  // เซ็ตค่า เตรียมส่ง email
  $from = "admin@ssitconsultant.com";
  $to = $rowuser['user_email'];
  $subject = "Reply from App Tools Learning";
  $message = "Your new password for App Tools Learning is : " . $randomString;
  $headers = "From:" . $from;

  // ส่ง E-mail
  mail($to, $subject, $message, $headers);

  //ตอบกลับว่าส่ง email แล้ว
  echo 'ตอบกลับเรียบร้อย ไปที่ email : ' . $rowuser['user_email'];
}
