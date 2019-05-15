<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("localhost", "root", "", "app_toolslearning");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
  $id = $_POST['id'];
  $query = "SELECT * FROM lesson WHERE course_id = $id ORDER BY les_no";
  $result = mysqli_query($connect, $query);

  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">บท</th>
     <th width="30%">ชื่อบท</th>
     <th width="20%">จัดการ</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
     <td>'.$row["les_no"].'</td>
     <td>'.$row["les_name"].'
     </td>
     
     <td>
     <button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["les_id"].'">ลบ</button>
     <a type="button" name="delete" class="btn btn-info bt-xs" href="action_img.php?id='.$row["les_id"].'">เพิ่มรูป</a>
     </td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }

 if($_POST["action"] == "insert")
 {
  $course_id = $_POST['course_id'];
  $les_no = $_POST['les_no'];
  $les_name = $_POST['les_name'];

  $query = "INSERT INTO lesson(course_id,les_no,les_name) VALUES ('$course_id','$les_no','$les_name')";
  if(mysqli_query($connect, $query))
  {
   echo 'เพิ่มบทเรียนเสร็จสมบรูณ์';
  }
 }
 if($_POST["action"] == "update")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE message SET les_name = '$file' WHERE id = '".$_POST["les_name"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'อัพเดตรูปภาพเสร็จสมบรูณ์';
  }
 }
 if($_POST["action"] == "delete")
 {
  //echo $_POST['id'];
  $query = "SELECT * FROM imglesson WHERE les_id = '".$_POST["id"]."'";
  $result = mysqli_query($connect, $query);
  $rowcount = mysqli_num_rows($result);
  if($rowcount > 0 ){
    echo "ไม่สามารถลบได้ กรุณาลบรูปภาพให้หมดก่อน";
    exit;
  }else{
    $query = "DELETE FROM lesson WHERE les_id = '".$_POST["id"]."'";
    if(mysqli_query($connect, $query))
    {
      echo 'รูปภาพถูกลบเสร็จสิ้น';
    }
  }
 }
}
?>