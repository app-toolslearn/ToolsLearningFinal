
<?php  
    $serverName    = "ssitconsultant.com";
    $userName     = "ssit_demo_tools";
    $password = "P@ssw0rd";
    $dbName     = "app_toolslearning"; 
    $conn = mysqli_connect($serverName,$userName,$password,$dbName);
    mysqli_set_charset($conn, 'utf8');
    
    if (!$conn)
    {
        echo "ไม่สามารถเชื่อต่อได้";
    }
    else
    {
        echo"";
    }
?>