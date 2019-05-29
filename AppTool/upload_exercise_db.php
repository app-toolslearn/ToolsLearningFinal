<?php

if (isset($_POST['submit'])) {

    // รับค่า file ที่เลือกมา
    $file = $_FILES['file'];
    
    // รับค่าต่างๆที่ พิมพ์
    $test_id = $_POST['test_id'];
    $inttest_id = !empty($test_id) ? $test_id : 0;
    $les_id = $_POST['les_id'];
    $intles_id = !empty($les_id) ? $les_id : 0;
    $choiceA = $_POST['choiceA'];
    $choiceB = $_POST['choiceB'];
    $choiceC = $_POST['choiceC'];
    $choiceD = $_POST['choiceD'];
    $testType = $_POST['testType'];
    $ans = $_POST['ans'];
    $intans = !empty($ans) ? $ans : 0;
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $fileANS = $_FILES['fileANS'];

    $fileNameANS = $_FILES['fileANS']['name'];
    $fileTmpNameANS = $_FILES['fileANS']['tmp_name'];
    $fileSizeANS = $_FILES['fileANS']['size'];
    $fileErrorANS = $_FILES['fileANS']['error'];
    $fileTypeANS = $_FILES['fileANS']['type'];

    $fileExtANS = explode('.', $fileNameANS);
    $fileActualExtANS = strtolower(end($fileExtANS));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    // ตรวจสอบว่าไฟล์ถูกต้องหรือไม่
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {

                // สร้างชื่อไฟล์ ไม่ให้ซ้ำ
                $fileNameNew = $fileExt[0] . uniqid('', true) . "." . $fileActualExt; //

                // ตั้งค่าที่จะเก็บไฟล์
                $fileDestination = 'uploadExercise/' . $fileNameNew;

                // เซฟไฟล์ไปตามที่ตั้งไว้
                move_uploaded_file($fileTmpName, $fileDestination);
                echo "เสร็จสิ้น";
                if($les_id){

                    // ถ้าเป็นการเพิ่ม lesson จะไปยังหน้า action_exercise หลังจากเสร็จ
                    header("Location:action_exercise.php?id=$les_id");
                }else{
                    // ถ้าเป็นการเพิ่ม test จะไปยังหน้า action_test_qa หลังจากเสร็จ
                    header("Location:action_test_qa.php?id=$test_id");
                }
                
            } else {
                echo "ขนาดไฟล์ของคุณใหญ่เกินไป";
            }
        } else {
            echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์!";
        }
    } else {
        echo "คุณไม่สามารถอัพโหลดไฟล์ประเภทนี้ได้!!";
    }

    if (in_array($fileActualExtANS, $allowed)) {
        if ($fileErrorANS === 0) {
            if ($fileSizeANS < 10000000) {
                $fileNameNewANS = $fileExtANS[0] . uniqid('', true) . "." . $fileActualExtANS; //
                $fileDestinationANS = 'uploadExercise/' . $fileNameNewANS;
                move_uploaded_file($fileTmpNameANS, $fileDestinationANS);
                echo "เสร็จสิ้น";
                if($les_id){
                    header("Location:action_exercise.php?id=$les_id");
                }else{
                    header("Location:action_test_qa.php?id=$test_id");
                }
            } else {
                echo "ขนาดไฟล์ของคุณใหญ่เกินไป";
            }
        } else {
            echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์!";
        }
    } else {
        echo "คุณไม่สามารถอัพโหลดไฟล์ประเภทนี้ได้!!";
    }

    $conn = new mysqli("ssitconsultant.com", "ssit_demo_tools", "P@ssw0rd", "app_toolslearning");
    if ($conn) {
        echo "เชื่อมเเล้ว";
    }

   // ตั้งชื่อเป้น url เพื่อใช้สำหรับ mobile app ในการดึงรูป 
    $fileUrl = "http://ssitconsultant.com/AppTool/uploadExercise/". $fileNameNew;

    $fileANSUrl = "http://ssitconsultant.com/AppTool/uploadExercise/". $fileNameNewANS;

    $sql = "INSERT INTO test_choice(test_id, lesson_id, test_c_img_url, test_c_A, test_c_B, test_c_C, test_c_D, test_c_ans, test_c_score,test_c_img_name,test_type,test_c_ans_img_name,test_c_ans_img_url)  VALUES ('$inttest_id','$intles_id','$fileUrl','$choiceA','$choiceB','$choiceC','$choiceD','$intans','0','$fileNameNew','$testType','$fileNameNewANS','$fileANSUrl')";
    if ($conn->query($sql) === TRUE) {
        echo "ข้อมูลได้ถูกสร้างขึ้นเสร็จสมบูรณ์";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
