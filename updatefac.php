<?php
  $id = $_GET['id'];
  require 'connect.php';
  $sql = "select * from faculty where fctid=$id";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_row($result);
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
	<title>โปรแกรมสร้างฟอร์มแก้ไขข้อมูลคณะ</title>
</head>
<body>
	<div class="container">
		<form name="frminputfac" method="post" action="?link=8" enctype="multipart/form-data">
			<center><font size="20" color="red"><strong>แก้ไขข้อมูลคณะ</strong></font></center>
			<div class="form-group">
				<input type="hidden" class="form-control" name="fctid" value="<?php echo $row[0]; ?>">
			</div>
			<div class="form-group">
				<label for="inputname">ชื่อคณะ :</label>
				<input type="text" class="form-control" name="fctname" value="<?php echo $row[1]; ?>">
			</div>
			<div class="form-group">
				<label for="inputpic">รูปภาพ :</label>
				<input type="file" name="img" class="form-control" value="<?php echo $row[2] ?>">	
			</div>
			<br>
			<button class="btn btn-primary" type="submit" name="save">แก้ไขข้อมูล</button>	
			<button class="btn btn-info" type="reset" name="reset">ยกเลิก</button>
		</form>	
	</div>	
</body>
</html>