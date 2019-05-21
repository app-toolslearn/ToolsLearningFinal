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
                echo "เสร็จสิ้น";
                header("Location:action_exercise.php?id=$les_id");
            } else {
                echo "ขนาดไฟล์ของคุณใหญ่เกินไป";
            }
        } else {
            echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์!";
        }
    } else {
        echo "Yคุณไม่สามารถอัพโหลดไฟล์ประเภทนี้ได้!!";
    }
    $conn = new mysqli("localhost", "root", "root", "app_toolslearning");
    if ($conn) {
        echo "เชื่อมเเล้ว";
    }

    $fileUrl = "http://localhost/AppTool/uploadExercise/". $fileNameNew;

    $sql = "INSERT INTO test_choice(test_id, lesson_id, test_c_img_url, test_c_A, test_c_B, test_c_C, test_c_D, test_c_ans, test_c_score,test_c_img_name)  VALUES ('0','$les_id','$fileUrl','$choiceA','$choiceB','$choiceC','$choiceD','$ans','0','$fileNameNew')";
    if ($conn->query($sql) === TRUE) {
        echo "ข้อมูลได้ถูกสร้างขึ้นเสร็จสมบูรณ์";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
