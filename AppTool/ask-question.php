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
   
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    .open-button {
        background: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        
    }
    .reply{
        background:#129cff;
        color:white;
        padding:10px;
        margin-top:10px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        height: 40px;
    }

    body {
        
        /* background: url(img/bg.png); */
        background: #f7f7f7;
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
    .card{
        padding-top: 40px;
        height: 30%;
        width: 35%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        margin: auto auto;
        margin-top: 30px;
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

<?php include 'header.php';?>


    <table class="table">
        <tr>
            <th>อีเมล์</th>
            <th>ตอบกลับ</th>
            <th>อ่านแล้ว</th>
        </tr>
        <tr>
            <td>mo_9170@hotmail.com</td>
            <td>
                <button id="myBtn">Reply</button>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h3>ข้อความ</h3>
                        <textarea rows="10" cols="78">Some text in the Modal..</textarea>  
                        <button type="submit" class="reply">SEND</button>
                    </div>
                </div>
                <script>
                        // Get the modal
                        var modal = document.getElementById('myModal');

                        // Get the button that opens the modal
                        var btn = document.getElementById("myBtn");

                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("close")[0];

                        // When the user clicks the button, open the modal 
                        btn.onclick = function() {
                        modal.style.display = "block";
                        }

                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                        modal.style.display = "none";
                        }

                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
            </td>
            <td>
                <div class="check">
                    <input type="checkbox" name="read" value="check" checked> 
                </div>
            </td>
        </tr>
        
    </table>


</body>

</html>