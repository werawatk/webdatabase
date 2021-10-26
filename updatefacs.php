<?php
   
   require 'connect.php';
   $id = $_POST['fctid'];
   $name = $_POST['fctname'];
   $img = $_FILES['img']['name'];
   $file_name = $_FILES['img']['name']; 
   $file_tmp = $_FILES['img']['tmp_name'];

   if($file_name != ''){
   	move_uploaded_file($file_tmp,"img/".$file_name);
   }

   $sql = "update faculty set fctname = '$name', img = '$img' where fctid= '$id'";

   $insert_data = mysqli_query($conn,$sql);

   if($insert_data) {
   echo "รหัสคณะ: $_POST[fctid] <br>";
   echo "ชื่อคณะ: $_POST[fctname] <br>";
   echo "ชื่อไฟล์รูปภาพ: $img <br>";
   echo "...................แก้ไขข้อมูลสำเร็จ...............";
   echo "<hr>";
   echo "<center><a href='?link=1'>แสดงข้อมูลคณะ </a></center>";
  }else {
    echo ".................ไม่สามารถแก้ไขข้อมูลได้................";
   }
 ?>  