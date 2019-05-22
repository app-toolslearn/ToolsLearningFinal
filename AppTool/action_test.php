<?php
//action.php
if(isset($_POST["action"]))
{
 $connect = mysqli_connect("ssitconsultant.com", "ssit_demo_tools", "P@ssw0rd", "app_toolslearning");
 mysqli_set_charset($connect,"utf8");
 if($_POST["action"] == "fetch")
 {
  $id = $_POST['id'];
  $query = "SELECT * FROM test WHERE course_id = $id ";
  $result = mysqli_query($connect, $query);

  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">ชุดข้อสอบที่</th>
     <th width="30%">ชื่อข้อสอบ</th>
     <th width="20%">จัดการ</th>
    </tr>
  ';
  $item = 0;
  $level = '';
  while($row = mysqli_fetch_array($result))
  {
    $item++;
    if($row["test_type"] == "e"){
      $level = 'ง่าย';
  };
  if($row["test_type"] == "m"){
      $level = 'ปานกลาง';
  };
  if($row["test_type"] == "h"){
      $level = 'ยาก';
  };
   $output .= '

    <tr>
    <td>' . $item . '</td>
     <td>'.$row["test_name"].'</td>
     
     <td>
     <a type="button" name="delete" class="btn btn-info bt-xs" href="action_test_qa.php?id='.$row["test_id"].'">จัดการคำถาม - คำตอบ</a>
     <button type="button" name="delete" class="btn btn-danger bt-xs delete" id="'.$row["test_id"].'">ลบ</button>
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
  $test_name = $_POST['test_name'];
  $test_no = $_POST['test_no'];
  $level = $_POST['level'];

  $query = "INSERT INTO test(test_name,les_id,test_type,course_id) VALUES ('$test_name','0','$level','$course_id')";
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