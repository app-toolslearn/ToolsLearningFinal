<?php
//action.php

// ดูว่าเข้ามาด้วย action หรือไม่
if(isset($_POST["action"]))
{

  // ต่อไปที่ database
 $connect = mysqli_connect("ssitconsultant.com", "ssit_demo_tools", "P@ssw0rd", "app_toolslearning");
 // เซ็ต utf8 ให้อ่านภาษาไทยได้
 mysqli_set_charset($connect,"utf8");

 // เข้ามาด้วย action fetch หรือดึง data
 if($_POST["action"] == "fetch")
 {

  // เขียน query
  $query = "SELECT * FROM course";
  // รัน query
  $result = mysqli_query($connect, $query);

  // เขียน html
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="30%">ชื่อวิชา</th>
     <th width="20%">จัดการ</th>
    </tr>
  ';

  // วนลูป data ที่ query มาได้
  while($row = mysqli_fetch_array($result))
  {
    // เขียน html
   $output .= '
    <tr>
     <td>'.$row["course_name"].'
     </td>
     <td>
     <button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["corse_id"].'">ลบ</button>
     <a type="button" name="delete" class="btn btn-info bt-xs" href="index_lesson.php?id='.$row["corse_id"].'">เพิ่มบทเรียน</a>
     </td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 // เข้ามาด้วย action insert หรือดึง เพิ่ม course ใหม่
 if($_POST["action"] == "insert")
 {
   // รับ parameter 'name'
  $name = $_POST['name'];

  // เขียน query insert
  $query = "INSERT INTO course(course_name) VALUES ('$name')";

  // รันคิวรี่
  if(mysqli_query($connect, $query))
  {

    // รันผ่าน แจ้งเดือน
   echo 'เพิ่มวิชาเรียนเสร็จสมบูรณ์';
  }
 }

 // ไม่ได้ใช้
 if($_POST["action"] == "update")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE message SET les_name = '$file' WHERE id = '".$_POST["les_name"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'รัพโหลดูปภาพเสร็จสมบูรณ์';
  }
 }

 //เข้ามาด้วย action delete
 if($_POST["action"] == "delete")
 {
  // เขียน query เพื่อหา lesson
  $query = "SELECT * FROM lesson WHERE course_id = '".$_POST["id"]."'";
  $result = mysqli_query($connect, $query);
  $rowcount = mysqli_num_rows($result);
  if($rowcount > 0 ){
    //  มี data ($rowcount มากกว่า 0) แจ้งเตือนไม่สามารถลบได้
    echo "ไม่สามารถลบได้ กรุณาลบบทเรียนให้หมดก่อน";
    //exit;
  }else{
    // เขียน query delete >> $_POST["id"] คือรับ data course_id มาเพื่อหา และลบ
    $query = "DELETE FROM course WHERE corse_id = '".$_POST["id"]."'";
    if(mysqli_query($connect, $query))
    {
      echo 'วิชาเรียนถูกลบเสร็จสมบูรณ์';
    }
  }
 }
}
?>