<?php


$conn = mysqli_connect("localhost", "root", "", "app_toolslearning");
if($conn) {
//if connection has been established display connected.
echo "connected";
}

if(isset($_POST['submit'])){
   $file = $_FILES['file'];
   //print_r($file);

   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileSize = $_FILES['file']['size'];
   $fileError = $_FILES['file']['error'];
   $fileType = $_FILES['file']['type'];

   $fileExt = explode('.',$fileName);
   $fileActualExt = strtolower(end($fileExt));
   $allowed = array('jpg','jpeg','png','pdf');

   if(in_array($fileActualExt,$allowed)){
    if($fileError === 0){
        if($fileSize < 10000000){
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = 'upload/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            echo "success";
            header("Location:header.php?page=course");
          
        }else {
            echo "Your file is too big!";
        }
    }else {
        echo "Ther was an error uploading your file!";
    }
   } else {
    echo "You cannot uploadfile this type!!";
   }
   
   $sql = "INSERT INTO 'course' ('course_name')  VALUES ('$fileName')";
   $qry = mysqli_query($conn,  $sql);
   if( $qry) {
   echo "image uploaded";
   }
}



?> 