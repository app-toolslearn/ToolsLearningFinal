<?php

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    //print_r($file);
    //$test_id = $_POST['test_id'];
    $les_id = $_POST['les_id'];
    $choiceA = $_POST['choiceA'];
    $choiceB = $_POST['choiceB'];
    $choiceC = $_POST['choiceC'];
    $choiceD = $_POST['choiceD'];
    $ans = $_POST['ans'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileNameNew = $fileExt[0] . uniqid('', true) . "." . $fileActualExt; //
                $fileDestination = 'uploadExercise/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "success";
                header("Location:action_exercise.php?id=$les_id");
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "Ther was an error uploading your file!";
        }
    } else {
        echo "You cannot uploadfile this type!!";
    }
    $conn = new mysqli("localhost", "root", "root", "app_toolslearning");
    if ($conn) {
        echo "เชื่อมเเล้ว";
    }

    $sql = "INSERT INTO test_choice(test_id, lesson_id, test_c_img_url, test_c_A, test_c_B, test_c_C, test_c_D, test_c_ans, test_c_score)  VALUES ('0','$les_id','$fileNameNew','$choiceA','$choiceB','$choiceC','$choiceD','$ans','0')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
