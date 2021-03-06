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
                <li ><a href="home.php">หน้าหลัก </a> </li>
                <li><a href="course.php">จัดการวิชาเรียน</a></li>
                <li><a href="ask-question.php">ถาม-ตอบ</a></li>
                <!-- <li><a><input type="button" value="Back" class="btn btn-warning" onClick="history.go(-1);"></a></li>
                <li><a><input type="button" value="Next" class="btn btn-info" onClick="history.go(1);"></a></li> -->
            </ul>
            <div class="logout">
                <ul class="nav navbar-nav navbar-right">
                <!-- <li><a><input type="button" value="ย้อนกลับ" class="btn btn-warning" onClick="history.go(-1);"></a></li>
                <li><a><input type="button" value="ไปข้างหน้า" class="btn btn-info" onClick="history.go(1);"></a></li> -->
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ</a></li>
                </ul>
            </div>
        </div>
    </nav>



</body>

</html>