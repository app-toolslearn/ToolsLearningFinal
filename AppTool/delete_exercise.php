<?php 
 $connect = mysqli_connect("ssitconsultant.com", "ssit_demo_tools", "P@ssw0rd", "app_toolslearning");
 if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM test_choice WHERE test_c_id = $id";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $flgDelete = unlink('uploadExercise/'.$row['test_c_img_name']);
    }
    $sql = "DELETE FROM test_choice WHERE test_c_id = $id";
    if (mysqli_query($connect, $sql)) {
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        //echo "Record deleted successfully";
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        //echo "Error deleting record: " . mysqli_error($connect);
    }
 }
?>