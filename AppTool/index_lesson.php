<!DOCTYPE html>  
<html>  
 <head>  
  <title>Add Lesson</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
 <style type="text/css">
    @font-face {
        font-family: 'mitr-regular-webfont';
        src: url('mitr-regular-webfont.eot?#iefix') format('embedded-opentype'), url('mitr-regular-webfont.woff') format('woff'), url('mitr-regular-webfont.ttf') format('truetype'), url('mitr-regular-webfont.svg#mitr-regular-webfontI') format('svg');
        font-weight: normal;
        font-style: normal;
    }
    }

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
<div class ="cardout">
  <br /><br />  
  <div class="container" style="width:900px;">  
   <h3 align="center">เพิ่มบทเรียน</h3>  
   <br />
   <div align="right">
    <button type="button" name="add" id="add" class="btn btn-success">เพิ่ม</button>
   </div>
   <br />
   <div id="image_data">

   </div>
  </div>  

 </body>  
</html>

<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">เพิ่มเนื้อหา</h4>
   </div>
   <div class="modal-body">
    <form id="image_form" method="post" >
        <div class="form-group">
            <label for="name">ชื่อบทเรียน</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="name">เลขบทเรียน</label>
            <input type="number" class="form-control" id="number" name="number">
        </div>
        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
   </div>
  </div>
 </div>
</div>

<script>  
$(document).ready(function(){
 
 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  var id = <?php echo $_GET['id'] ?>;
  $.ajax({
   url:"action_lesson.php",
   method:"POST",
   data:{id:id,action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }
 $('#add').click(function(){
  $('#imageModal').modal('show');
  $('#action').val('insert');
  $('#insert').val("Insert");
 });
 $('#image_form').submit(function(event){
  event.preventDefault();
  var action = "insert";
  var course_id = <?php echo $_GET['id'] ?>;
  var les_name = $('#name').val();
  var les_no = $('#number').val();
    $.ajax({
     url:"action_lesson.php",
     method:"POST",
     data:{les_name:les_name,course_id:course_id,les_no:les_no, action:action},
     success:function(data)
     {
      alert(data);
      fetch_data();
      $('#imageModal').modal('hide');
     }
    });
 });
 $(document).on('click', '.update', function(){
  $('#image_id').val($(this).attr("id"));
  $('#action').val("update");
  $('.modal-title').text("Update Image");
  $('#insert').val("Update");
  $('#imageModal').modal("show");
 });
 $(document).on('click', '.delete', function(){
  var id = $(this).attr("id");
  var action = "delete";
  if(confirm("คุณเเน่ใจมั้ยที่ต้องการจะลบข้อมูลนี้?"))
  {
   $.ajax({
    url:"action_lesson.php",
    method:"POST",
    data:{id:id, action:action},
    success:function(data)
    {
        
     alert(data);
        fetch_data();
    }
   })
  }
  else
  {
   return false;
  }
 });
});  
</script>
</div>