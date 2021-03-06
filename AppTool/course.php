<!DOCTYPE html>
<html>

<head>
<title>Ajax Image Insert Update Delete in Mysql Database using PHP</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

<?php include 'header.php'; ?>
<style type="text/css">
@font-face {
    font-family: 'mitr-regular-webfont';
src: url('mitr-regular-webfont.eot?#iefix') format('embedded-opentype'), url('mitr-regular-webfont.woff') format('woff'), url('mitr-regular-webfont.ttf') format('truetype'), url('mitr-regular-webfont.svg#mitr-regular-webfontI') format('svg');
    font-weight: normal;
    font-style: normal;
}

.card {
background: #1294ff;
    margin-left: 50px;
    margin-top: 50px;
height: 30%;
width: 15%;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    /* 5px rounded corners */
}

.cardout {
    padding-top: 1px;
background: #f7f7f7;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px;
height: auto;
width: auto;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    
}
</style>



<div class="cardout">
<br /><br />
<div class="container" style="width:900px;">
<div calss="card">
<h3 align="center">เพิ่มวิชา</h3>
</div>
<br />
<div align="right">
<button type="button" name="add" id="add" class="btn btn-success">เพิ่ม</button>
</div>
<br />
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
<h4 class="modal-title">เพิ่มวิชาเรียน</h4>
</div>
<div class="modal-body">
<form id="image_form" method="post">
<div class="form-group">
<label for="name">ชื่อวิชาเรียน</label>
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


<script>
$(document).ready(function() {
                  
                  // เรียก function ดึงข้อมูลใหม่
                  fetch_data();
                  
                  // function ดึงข้อมูลใหม่
                  function fetch_data() {
                  // ชื่อ action
                  var action = "fetch";
                  
                  // ยิง ajax ไปที่ action_course.php เพื่อดึงข้อมูลใหม่
                  $.ajax({
                         url: "action_course.php",
                         method: "POST",
                         data: {
                         action: action
                         },
                         success: function(data) {
                         // ถ้าสำเร็จ แสดงข้อมูลใน div id="image_data"
                         $('#image_data').html(data);
                         }
                         })
                  }
                  
                  // เมื่อคลิกปุ่ม "เพิ่ม"
                  $('#add').click(function() {
                                  // แสดงหน้าต่าง div id="imageModal"
                                  $('#imageModal').modal('show');
                                  // ใส่ action เป็น insert
                                  $('#action').val('insert');
                                  // ตั้งชื่อปุ่มเป้น "เพิ่ม"
                                  $('#insert').val("เพิ่ม");
                                  });
                  
                  // เมื่อกดปุ่ม submit
                  $('#image_form').submit(function(event) {
                                          event.preventDefault();
                                          
                                          // ตั้งชื่อ action เป็น insert
                                          var action = "insert";
                                          
                                          // ดึงค่า name จากที่พิมพ์มาใส่ในตัวแปร
                                          var course_name = $('#name').val();
                                          
                                          // ถ้ามีค่า
                                          if (course_name != '') {
                                          
                                          // ยิง ajax ไปที่ action_course.php
                                          $.ajax({
                                                 url: "action_course.php",
                                                 method: "POST",
                                                 data: {
                                                 name: course_name,
                                                 action: action
                                                 },
                                                 success: function(data) {
                                                 alert(data);
                                                 
                                                 // ถ้าสำเร็จ เรียก function fetch_data เพื่อดึงข้อมูลที่เพิ่มมาใหม่
                                                 fetch_data();
                                                 
                                                 // ซ่อนหน้าต่าง imageModal
                                                 $('#imageModal').modal('hide');
                                                 }
                                                 });
                                          } else {
                                          alert("กรุณาใส่ข้อมูล")
                                          };
                                          
                                          });
                  $(document).on('click', '.update', function() {
                                 $('#image_id').val($(this).attr("id"));
                                 $('#action').val("update");
                                 $('.modal-title').text("Update Image");
                                 $('#insert').val("Update");
                                 $('#imageModal').modal("show");
                                 });
                  $(document).on('click', '.delete', function() {
                                 var id = $(this).attr("id");
                                 var action = "delete";
                                 if (confirm("Are you sure you want to remove this image from database?")) {
                                 $.ajax({
                                        url: "action_course.php",
                                        method: "POST",
                                        data: {
                                        id: id,
                                        action: action
                                        },
                                        success: function(data) {
                                        
                                        alert(data);
                                        fetch_data();
                                        }
                                        })
                                 } else {
                                 return false;
                                 }
                                 });
                  });
</script>
</div>
