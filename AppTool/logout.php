<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toolslearning</title>

   
    <style type="text/css">
    #img_container img {
    height: 20%;
    width: 20%;
    margin-left: 40%;
    margin-top: 5%;
}
     @import url('https://fonts.googleapis.com/css?family=Kanit|PT+Sans');
    body {
        background: url(img/bg.png);
        background-size: cover;
        font-family: 'PT Sans', sans-serif;
        font-family: 'Kanit', sans-serif;
    }
   
    .text {
        font-size: 20px;
        text-align: center;

    }
    </style>
</head>
<body>
<div id="img_container">
<img src="pics/exit.png" />
<div class="text">
<?php
session_start();
session_destroy();
echo '<a href="../AppTool/login.php">กลับเข้าสู่ระบบ</a>';
// </div>
// </body>
