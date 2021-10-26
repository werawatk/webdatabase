<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Kanit">
    <style>
      body {
        font-family: 'Kanit', serif;
        font-size: 20px;
      }
     </style> 
	<title>โปรแกรมสร้างฟอร์มเพิ่มข้อมูลสาขาวิชา</title>
</head>
<body>
<?php
   require 'connect.php';
   $id = $_POST['depid'];
   $name = $_POST['depname'];
   $fctid = $_POST['fctid'];
   
   $sql = "insert into department values('$id','$name','$fctid')";

   $insert_data = mysqli_query($conn,$sql);

   if($insert_data) {
   echo "<center>รหัสสาขาวิชา: $_POST[depid] <br>";
   echo "ชื่อสาขาวิชา: $_POST[depname] <br>";
   echo "รหัสคณะ : $_POST[fctid] <br>";
   //echo "ชื่อไฟล์รูปภาพ: $img <br>";
   echo "...................เพิ่มข้อมูลสำเร็จ...............</center>";
   echo "<hr>";
   echo "<center><a href='?link=10'><button class='btn btn-info'>เพิ่มข้อมูล</button></a></center><br>";
   echo "<center><a href='?link=2'><button class='btn btn-info'>แสดงข้อมูลสาขาวิชา </button></a></center>";
  }else {
    echo ".................ไม่สามารถเพิ่มข้อมูลได้................";
   }
 ?>  
 </body>
</html>