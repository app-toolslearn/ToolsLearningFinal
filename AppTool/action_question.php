<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("ssitconsultant.com", "ssit_demo_tools", "P@ssw0rd", "app_toolslearning");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM message msg left join user on msg.user_id = user.user_id ORDER BY mes_at DESC";
  $result = mysqli_query($connect, $query);

  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
    <th width="30%">วันที่ได้รับข้อความ</th>
     <th width="20%">อีเมล์</th>
     <th width="30%">ข้อความ</th>
     <th width="10%">ตอบกลับ</th>
     <th width="10%">ตอบกลับแล้ว</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {

    if($row["mes_check"] == 1){
      $checked = "checked";
      $disable = "disabled";
    }else{
      $checked = "";
      $disable = "";
    }

   $output .= '
    <tr>
    <td>'.$row["mes_at"].'</td>
     <td>'.$row["user_email"].'</td>
     <td>'.$row["mes_send"].'</td>
     <td>
     <button type="button" name="reply" class="btn btn-success bt-xs reply" id="'.$row["mes_id"].'" '.$disable.'>ตอบกลับ</button>
     </td>
     <td>
     <input type="checkbox" name="read" disabled '.$checked.'> 
     </td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "update")
 {
  $query = "UPDATE message SET mes_reply = '".$_POST["reply_msg"]."', mes_check = 1 WHERE mes_id = '".$_POST["mes_id"]."'";
  if(mysqli_query($connect, $query))
  {
    $sql = "SELECT * FROM message WHERE mes_id = '".$_POST["mes_id"]."'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){

      $sql = "SELECT * FROM user WHERE user_id = '".$row["user_id"]."'";
      $result = mysqli_query($connect, $sql);
      $rowuser = mysqli_fetch_assoc($result);
      if(!empty($rowuser)){

        //$flgDelete = unlink('uploadTest/'.$row['test_c_img_name']);
        

        // send email
        //mail($row['user_email'],"My subject",$_POST["reply_msg"]);

        $from = "admin@ssitconsultant.com";
        $to = $rowuser['user_email'];
        $subject = "Reply from App Tools Learning";
        $message = "ตอบกลับคำถามจาก Admin App Tools Learning : ".$_POST["reply_msg"];
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
        //echo "The email message was sent.";
        echo 'ตอบกลับเรียบร้อย ไปที่ email : '.$rowuser['user_email'];
      }
        
    }
   
  }
 }
}
?>