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
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
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

        .reply {
            background: #129cff;
            color: white;
            padding: 10px;
            margin-top: 10px;
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

        .card {
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
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="cardout">
        <br /><br />
        <div class="container" style="width:900px;">
            <div calss="card">
                <h3 align="center">ข้อความ</h3>
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
                <h4 class="modal-title">ตอบกลับ</h4>
            </div>
            <div class="modal-body">
                <form id="image_form" method="post">
                    <div class="form-group">
                        <input type="hidden" id="mes_id" name="mes_id"/>
                        <label for="name">ข้อความตอบกลับ</label><br>
                        <textarea rows="5" cols="40" name="reply" id="reply"></textarea>
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

            fetch_data();

            function fetch_data() {
                var action = "fetch";
                $.ajax({
                    url: "action_question.php",
                    method: "POST",
                    data: {
                        action: action
                    },
                    success: function(data) {
                        $('#image_data').html(data);
                    }
                })
            }

            $(document).on('click', '.reply', function() {
                var id = $(this).attr("id");
                var action = "delete";
                $('#imageModal').modal('show');
                $('#insert').val("ตอบ");
                $('#action').val('update');
                $('#mes_id').val(id);

            });


            $('#image_form').submit(function(event) {
                event.preventDefault();
                var action = "update";
                var mes_id = $('#mes_id').val();
                var reply = $("#reply").val();
                if (mes_id != '') {
                    $.ajax({
                        url: "action_question.php",
                        method: "POST",
                        data: {
                            mes_id: mes_id,
                            reply_msg : reply,
                            action: action
                        },
                        success: function(data) {
                            alert(data);
                            fetch_data();
                            $('#imageModal').modal('hide');
                        }
                    });
                } else {
                    alert("กรุณาใส่ข้อมูล")
                };

            });

        });
    </script>