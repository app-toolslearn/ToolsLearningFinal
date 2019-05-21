<html>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
      
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
        margin-top: 20px;
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
        width: 70%;
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
    </style>
</head>

<div>
  
    
  <div id="block">
      <img class="pic" src="pics/icon-tools.png" />
  </div>
<div class="card">
  <div id="text">
      Question
  </div>

  <div id="form">
          
          <div class="form-group">
              <div class="col-sm-12"> 
                 <textarea class="form-control"  rows="5" id="comment"></textarea>
              </div>
        
          <div class="form-group">
              <div class="col-sm-offset-4 col-sm-2"><a href="home.php">
                  <button type="submit" name="send">
                      Send</button>
              </div>
          </div>
      </form>

  </div>


</div>
</div>
</div>













