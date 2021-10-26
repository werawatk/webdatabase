<?php
    require 'connect.php';
    $sql = "delete from department where depid ='$_GET[id]'";
    $result=mysqli_query($conn,$sql);
?> 
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
	<title>โปรแกรมลบข้อมูลสาขาวิชา</title>
</head>
<body>
	<div class="container">
	<h2 class="text-center">ระบบการจัดการข้อมูลสาขาวิชา</h2>
	<?php
	  if($result){
	  	echo "<center>...............สามารถลบข้อมูลได้สำเร็จ..................</center>";
	  	echo "<center><a href='?link=2'>แสดงข้อมูลคณะ </a>";
	  }else {
	  	echo "......................ไม่สามารถลบข้อมูลได้.........................";
	  }
	?>
</div>
</body>
</html>