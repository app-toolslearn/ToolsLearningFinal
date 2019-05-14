<?php

if(isset($_POST['submit']))
{
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
            $fileDestination = 'uploadtest/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            echo "success";
            header("Location:header.php?page=test");
          
        }else {
            echo "Your file is too big!";
        }
    }else {
        echo "Ther was an error uploading your file!";
    }
   } else {
    echo "You cannot uploadfile this type!!";
   }
   $conn = new mysqli("localhost", "root", "", "app_toolslearning");
   if($conn) {
      echo "เชื่อมเเล้ว";
     }

       $sql = "INSERT INTO test(test_name)  VALUES ('$fileName')";
       if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else{
         echo "Error: " . $sql . "<br>" . $conn->error;
          }

$conn->close();

   
}



?> 