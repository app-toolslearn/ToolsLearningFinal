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
  @import url('https://fonts.googleapis.com/css?family=Kanit|PT+Sans');

  body {
        /* font-family: 'mitr-regular-webfont' !important; */
        background: url(img/bg.png);
        background-size: cover;
        font-family: 'PT Sans', sans-serif;
        font-family: 'Kanit', sans-serif;
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

    h2 {
        margin-top: 60px;
        text-align: center;
    }

    h3 {
        text-align: center;
    }

    img {
        height: 40px;
        width: 40px;
        margin: 5px;
        margin-right: 0px !important;
        display: inline;
        /*  margin: auto auto;
 display: block; */
        /* vertical-align: middle; */
        /* margin-bottom: 0px; */
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div>

            <ul class="nav navbar-nav">
                <li><img src="pics/icon-tools.png" /></li>
                <li><a class="navbar-brand" href="#">ToolsLearning</a></li>
                <li ><a href="header.php?page=home">หน้าหลัก </a> </li>
                <li><a href="course">จัดการบทเรียน</a></li>
                <li><a href="header.php?page=test">จัดการข้อสอบ</a></li>
                <li><a href="header.php?page=ask-question">ถาม-ตอบ</a></li>
            </ul>
            <div class="logout">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="header.php?page=logout"><span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page-wrapper">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        include($page.'.php');
        ?>


    </div>



</body>

</html>