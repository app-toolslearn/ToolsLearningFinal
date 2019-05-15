
<?php
//เรียกใช้ไฟล์ autoload.php ที่อยู่ใน Folder vendor
require_once __DIR__ . '/vendor/autoload.php'; 
 
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->Output();