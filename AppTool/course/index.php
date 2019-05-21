<!DOCTYPE html>  
<html>  
 <head>  
  <title>Ajax Image Insert Update Delete in Mysql Database using PHP</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 </head>  
 <body>  
 <?php include 'header.php';?>
 <style type="text/css">
    @font-face {
        font-family: 'mitr-regular-webfont';
        src: url('mitr-regular-webfont.eot?#iefix') format('embedded-opentype'), url('mitr-regular-webfont.woff') format('woff'), url('mitr-regular-webfont.ttf') format('truetype'), url('mitr-regular-webfont.svg#mitr-regular-webfontI') format('svg');
        font-weight: normal;
        font-style: normal;
    }
    }
    .bg {
        /* font-family: 'mitr-regular-webfont' !important; */
        background: url(img/bg.png);
        background-size: cover;
        font-family: 'PT Sans', sans-serif;
        font-family: 'Kanit', sans-serif;
    }
  
    .card {
        background: #f7f7f7;
        margin-left: 50px;
        margin-top: 50px;
        height: 30%;
        width: 90%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        /* 5px rounded corners */
    }
    </style>
<div class ="bg">
  <br /><br />  
  <div class = "card">
  <div class="container" style="width:900px;">  
         <h3 align="center">เพิ่มวิชา</h3>  
           <br />
               <div align="right">
                  <button type="button" name="add" id="add" class="btn btn-success">เพิ่ม</button>
               </div>
           <br/>
   <div id="image_data">

   </div>
  </div>  
  </div>
 </body>  
</html>

<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Add Course</h4>
   </div>
   <div class="modal-body">
    <form id="image_form" method="post" >
        <div class="form-group">
        <label for="name">Course Name</label>
        <input type="text" class="form-control" id="name" name="name">
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
  $.ajax({
   url:"action_course.php",
   method:"POST",
   data:{action:action},
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
  var course_name = $('#name').val();
    $.ajax({
     url:"action_course.php",
     method:"POST",
     data:{name:course_name, action:action},
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
  if(confirm("Are you sure you want to remove this image from database?"))
  {
   $.ajax({
    url:"action_course.php",
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