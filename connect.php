
<?php
    $localhost = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "itubru";
    $conn = mysqli_connect($localhost,$username,$passwd,$dbname);
    if(!$conn){
    	die("ไม่สามารถเชื่อมฐานข้อมูลได้".mysqli_connect_errno());    	
    }
    //echo "เชื่อมต่อฐานข้อมูลได้สำเร็จ";
?>
