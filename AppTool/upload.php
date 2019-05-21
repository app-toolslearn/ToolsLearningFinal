<?php

if(isset($_POST['submit']))
{
   $file = $_FILES['file'];
   //print_r($file);
   $les_id = $_POST['les_id'];
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
            $fileNameNew = $fileExt[0].uniqid('',true).".".$fileActualExt; //
            $fileDestination = 'uploadcourse/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            echo "success";
            header("Location:action_img.php?id=$les_id");
          
        }else {
            echo "Your file is too big!";
        }
    }else {
        echo "Ther was an error uploading your file!";
    }
   } else {
    echo "You cannot uploadfile this type!!";
   }
   $conn = new mysqli("localhost", "root", "P@ssw0rd", "app_toolslearning");
   if($conn) {
      echo "เชื่อมเเล้ว";
     }

       $sql = "INSERT INTO lesson_content(lesson_id,image_url)  VALUES ('$les_id','$fileNameNew')";
       if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else{
           echo "Error: " . $sql . "<br>" . $conn->error;
          }

$conn->close();

   
}
