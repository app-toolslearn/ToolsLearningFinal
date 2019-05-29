<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">

      
    <style type="text/css">
    #alert {
        width: 100%;
        height: 40px;
    }

    body {
        /* font-family: 'mitr-regular-webfont' !important; */
        background: url(img/bg.png);
        background-size: cover;
        font-family: 'PT Sans', sans-serif;
        font-family: 'Kanit', sans-serif;
    }

    #block {

        margin: auto auto;
        display: block;
        padding-top: 60px;
        display: flex;
        justify-content: center;

    }

    button {
        background:#129cff;
        color:white;
        border-radius: 5px;
        cursor: pointer;
        width: 300%;
        height: 40px;
    }

    .card {
        padding-top: 10px;
        background:#f7f7f7;
        height: 50%;
        width: 55%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        margin: auto auto;
        margin-top: 30px;
        /* display: flex;
        justify-content: center; */
        /* vertical-align: middle; */
        /* 5px rounded corners */
    }

    #form {
        margin: top;
    }

    .pic {
        margin-top: 20%;
        height: 150px;
        margin: auto auto;
        /* display: block; */
    }
    #text {
        font-size: 20px;
        text-align: center;
        margin-bottom:5px;

    }
    .a{
        text-align: center;
        margin-top: 0%;
    }
    </style>
</head>
<body>
<?php session_start(); 
        
    if ( isset($_POST['send'] )  )
      echo "<script>alert('กรอก email เเละ รหัสผ่าน ');</script>";

    { ?>
 
<?php } ?>

    <div>
            <div id="block">
                <img class="pic" src="pics/icon-tools.png" />
            </div>
        <div class="card">
            <div id="text">
                สมัครสมาชิก
            </div>

            <div id="form">
                <form class="form-horizontal" method="post" action="check_register.php">
                
                    <div class="form-group">
                        <label class="control-label col-sm-3">อีเมล์</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" placeholder="sample@email.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">รหัสผ่าน</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-2">
                            <button type="submit" name="send">
                                สมัครสมาชิก</button>
                        </div>
                    </div>
                    <div class="a">
                                <a href="login.php">กลับไปหน้าเข้าสู่ระบบ</a>
                        </div>   
                </form>
            </div>
        </div>
    </div>
    </div>
   

</body>

</html>