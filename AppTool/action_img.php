<!DOCTYPE html>  
<html>  
 <head>  
  <title>Ajax Image Insert Update Delete in Mysql Database using PHP</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <style type="text/css">
    @font-face {
        font-family: 'mitr-regular-webfont';
        src: url('mitr-regular-webfont.eot?#iefix') format('embedded-opentype'), url('mitr-regular-webfont.woff') format('woff'), url('mitr-regular-webfont.ttf') format('truetype'), url('mitr-regular-webfont.svg#mitr-regular-webfontI') format('svg');
        font-weight: normal;
        font-style: normal;
 
    .cardout{
        padding-top:1px;
        background: #f7f7f7;
        margin-left: 20px;
        margin-right:20px;
        margin-top: 20px;
        height: auto;
        width: auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
       
    }

    </style>
<?php ?> 

 <body>  
     
 <?php include 'header.php';?>
 <div  class="cardout">
  <div class="container" style="width:900px;">  
   <h3 align="center">เพิ่มเนื้อหา</h3>  
   <br />
   <div align="right">
    <a href="upload_img.php?id=<?php echo $_GET['id'] ?>" type="button" name="add" id="add" class="btn btn-success"  >เพิ่ม</a>
   </div>
   <br />
   <div id="image_data">

   </div>
  </div>  
  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                แจ้งเตือน
            </div>
            <div class="modal-body">
              ต้องการลบรูปภาพนี้ใช่หรือไม่
            </div>
            <div class="modal-footer">
                <a href="" type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</a>
                <a class="btn btn-danger btn-ok">ลบ</a>
            </div>
        </div>
    </div>
</div>
 </body>  
</html>
<?php
//action.php
 
 $connect = mysqli_connect("localhost", "root", "root", "app_toolslearning");
 mysqli_set_charset($connect,"utf8");

 if(!empty($_GET['id']))
 {
   $les_id = $_GET['id'];
  $query = "SELECT * FROM lesson_content WHERE lesson_id = $les_id";
  $result = mysqli_query($connect, $query);
  $output = '
   <table class="table table-bordered table-striped">  
    <tr>
     <th width="10%">บท</th>
     <th width="30%">ชื่อบท</th>
     <th width="20%">จัดการ</th>
    </tr>
  ';
  if(empty($result)){
    exit;
  }
  while($row = mysqli_fetch_array($result))
  {
   $output .= '

    <tr>
    <td>'.$row["les_id"].'
    </td>
     <td><img style="width:100px;height:100px" src="uploadcourse/'.$row["image_url"].'"></td>
     <td>
     <a type="button" name="delete" class="btn btn-danger bt-xs delete" data-href="delete_img.php?id='.$row["id"].'"  data-toggle="modal" data-target="#confirm-delete">ลบ</a>
     </td>
    </tr>
   ';
  }
  $output .= '</table>';
  echo $output;
 }


?>
<script>
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
</div>
