   
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
  <title>โปรแกรมการจัดการแก้ไขข้อมูลสาขาวิชา</title>
</head>
<body>
<?php
   
   require 'connect.php';
   $id = $_POST['depid'];
   $name = $_POST['depname'];
   $fctid = $_POST['fctid'];

   
   $sql = "update department set depname = '$name', fctid = '$fctid' where depid= '$id'";

   $insert_data = mysqli_query($conn,$sql);

   if($insert_data) {
   echo "รหัสสาขา: $_POST[depid] <br>";
   echo "ชื่อสาขา: $_POST[depname] <br>";
   echo "รหัสคณะ: $_POST[fctid] <br>";
   //echo "ชื่อไฟล์รูปภาพ: $img <br>";
   echo "...................แก้ไขข้อมูลสำเร็จ...............";
   echo "<hr>";
   echo "<center><a href='?link=2'>แสดงข้อมูลสาขา </a></center>";
  }else {
    echo ".................ไม่สามารถแก้ไขข้อมูลได้................";
   }
 ?> 
 </body>
 </html> 