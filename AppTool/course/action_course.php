<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "root", "app_toolslearning");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM course";
  $result = mysqli_query($connect, $query);

  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="30%">ชื่อวิชา</th>
     <th width="20%">จัดการ</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
     <td>'.$row["course_name"].'
     </td>
     <td>
     <button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["corse_id"].'">ลบ</button>
     <a type="button" name="delete" class="btn btn-info bt-xs" href="../index_lesson.php?id='.$row["corse_id"].'">เพิ่มบทเรียน</a>
     </td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $name = $_POST['name'];
  //var_dump($name);
  $query = "INSERT INTO course(course_name) VALUES ('$name')";
  if(mysqli_query($connect, $query))
  {
   echo 'เพิ่มวิชาเรียนเสร็จสมบูรณ์';
  }
 }
 if($_POST["action"] == "update")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE message SET les_name = '$file' WHERE id = '".$_POST["les_name"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'รัพโหลดูปภาพเสร็จสมบูรณ์';
  }
 }
 if($_POST["action"] == "delete")
 {
  //echo $_POST['id'];
  $query = "SELECT * FROM lesson WHERE course_id = '".$_POST["id"]."'";
  $result = mysqli_query($connect, $query);
  $rowcount = mysqli_num_rows($result);
  if($rowcount > 0 ){
    echo "ไม่สามารถลบได้ กรุณาลบบทเรียนให้หมดก่อน";
    //exit;
  }else{
    $query = "DELETE FROM course WHERE corse_id = '".$_POST["id"]."'";
    if(mysqli_query($connect, $query))
    {
      echo 'วิชาเรียนถูกลบเสร็จสมบูรณ์';
    }
  }
 }
}
?>