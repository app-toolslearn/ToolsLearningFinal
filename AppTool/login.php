<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
 <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
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
        width: 40%;
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
        height: 25%;
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
        margin-top: 15%;
    }
    </style>
</head>
<body>
<div id="block">
                <img class="pic" src="pics/icon-tools.png" />
            </div>
        <div class="card">
            <div id="text">
            เข้าสู่ระบบ
            </div>
	<?php
    session_start();
    unset ($_SESSION['ses_cyc'] );
	?>
		
		
        <?php 
            //error_reporting(~E_NOTICE);
           
            if(($_SESSION['ses_status']==0))
            {
				?>
				<div id="form">
                <form class="form-horizontal" action="check_login.php" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-3">อีเมล์</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" name="email" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">รหัสผ่าน</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password" >
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-2">
                            <button type="submit" name="loginButton">
                                เข้าสู่ระบบ</button>
                        </div>
                       
                       <div class="a">
                                <a href="register.php">สมัครสมาชิกได้ที่นี้</a>
                        </div>                    
                    </div>
                </form>
            </div>
                
		<?php
            
        }
			else{
				?>
				<?php
                    error_reporting(~E_NOTICE);
					$ses_email = $_SESSION['ses_email'];
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "app_toolslearning";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					mysqli_set_charset($conn,'utf8');
					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}
					$sql = "SELECT * FROM admin WHERE admin_email ='$ses_email' admin_password = '$password' ";
					$p=mysqli_query($conn,$sql);
					$data = mysqli_fetch_array($p);
				?>
				

				<?php
				mysqli_close($conn);
		 	}
	        	?>
	
</body>
</html>
