<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toolslearning</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
    @font-face {
        font-family: 'mitr-regular-webfont';
        src: url('mitr-regular-webfont.eot?#iefix') format('embedded-opentype'), url('mitr-regular-webfont.woff') format('woff'), url('mitr-regular-webfont.ttf') format('truetype'), url('mitr-regular-webfont.svg#mitr-regular-webfontI') format('svg');
        font-weight: normal;
        font-style: normal;
    }
    }

    body {
        font-family: 'mitr-regular-webfont' !important;
         background: url(img/bg.png); */
        background: #fefefe;
        background-size: cover;
    }

    nav li {
        display: inline-block;
        margin-left: 10px;
        /* padding-top: 20px; */
        position: relative;
    }

    .logout {
        margin-right: 50px;
    }

    #img_container img {

        height: 20%;
        width: 20%;
        margin-left: 40%;
        margin-top: 5%;
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

    .text {
        color: #ffffff;
        font-size: 30px;
        text-align: center;

    }

    .upload {
        
        margin-top: 30px;
        margin-left: 50px;
        border-style: ridge;
        width: 50%;
    }

    img {
        height: 40px;
        width: 40px;
        margin: 5px;
        margin-right: 0px !important;
        display: inline;
     
    }
    </style>
</head>
<body>
<div class="cardout">
    
 <?php include 'header.php';?>
    <div class="card">
        <div class="text">คำถาม - คำตอบ</div>
    </div>
    <div class="upload">
        <form action="upload_test_db.php" method="post" enctype="multipart/form-data">
           เลือกรูปภาพ คำถาม ที่ต้องการอัพโหลด
            <input type="file" name="file" id="fileToUpload">
            <input type="hidden" name="test_id" id="test_id" value="<?php  if(!empty($_GET['test_id'])) echo $_GET['test_id']; ?>">

            <br>
            <div class="form-group">
            <label for="name">ระบุคำตอบที่มีให้เลือก</label>
            </div>

            <div class="form-group">
            <label for="name">ตัวเลือกที่ 1</label>
            <input type="text" name="choiceA" id="choiceA">
            </div>

            <div class="form-group">
            <label for="name">ตัวเลือกที่ 2</label>
            <input type="text" name="choiceB" id="choiceB">
            </div>

            <div class="form-group">
            <label for="name">ตัวเลือกที่ 3</label>
            <input type="text" name="choiceC" id="choiceC">
            </div>

            <div class="form-group">
            <label for="name">ตัวเลือกที่ 4</label>
            <input type="text" name="choiceD" id="choiceD">
            </div>

            <div class="form-group">
            <label for="name">คำตอบที่ถูกต้อง (1-4)</label>
            <input type="text" name="ans" id="ans">
            </div>
            

            <input type="submit" value="บันทึกคำถาม - คำตอบ" name="submit">
            <br>


        </form>
    </div>
</div>

</body>

</html>