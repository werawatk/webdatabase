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
	<title>โปรแกรมสร้างฟอร์มเพิ่มข้อมูลอาจารย์</title>
</head>
<body>
	<div class="container">
		<form name="frminputtea" method="post" action="insertteas.php" enctype="multipart/form-data">
			<center><font size="20" color="red"><strong>กรอกข้อมูลอาจารย์</strong></font></center>
			<div class="form-group">
				<label for="inputid">รหัสอาจารย์ : </label>
				<input type="text" class="form-control" name="tchid" placeholder="กรุณากรอกรหัส">
			</div>
			<div class="form-group">
				<label for="inputname">ชื่อ :</label>
				<input type="text" class="form-control" name="name" placeholder="กรุณากรอกชื่อ">
			</div>
			<div class="form-group">
				<label for="inputname">เพศ :</label>
				<input type="text" class="form-control" name="gender" placeholder="กรุณากรอกเพศ">
			</div>
			<div class="form-group">
				<label for="inputname">ที่อยู่ :</label>
				<input type="text" class="form-control" name="address" placeholder="กรุณากรอกที่อยู่">
			</div>
			<div class="form-group">
				<label for="inputname">ระดับการศึกษา :</label>
				<input type="text" class="form-control" name="degree" placeholder="กรุณากรอกระดับการศึกษา">
			</div>
			<div class="form-group">
				<label for="inputname">เงินเดือน :</label>
				<input type="text" class="form-control" name="saraly" placeholder="กรุณากรอกระดับการศึกษา">
			</div>
			<div class="form-group">
				<label for="inputname">อีเมล์ :</label>
				<input type="email" class="form-control" name="email" placeholder="กรุณากรอกอีเมล์">
			</div>
			<div class="form-group">
				<label for="inputpic">รูปภาพ :</label>
				<input type="file" name="img" class="form-control">	
			</div>
			 <div class="form-group">
                <label for="inputname">รหัสคณะ :</label>
                <select name="fctid" class="form-select" >
				<option selected>---เลือกคณะที่สังกัด---</option>
				 <?php
                  require 'connect.php';
                  $strsql = "select fctid,fctname from faculty order by fctid";
                  $result = mysqli_query($conn,$strsql);                  
                  while ($row=mysqli_fetch_row($result)) { ?>
                  	<option value="<?php echo $row[0]; ?>">
                  	<?php echo $row[0]; ?> <?php echo $row[1]; } ?> </option>
			</select>               			
			</div>
			 <div class="form-group">
                <label for="inputname">รหัสสาขาวิชา :</label>
                <select name="depid" class="form-select" >
				<option selected>---เลือกสาขาที่สังกัด---</option>
				 <?php
                  require 'connect.php';
                  $strsql1 = "select depid,depname from department order by fctid";
                  $result1 = mysqli_query($conn,$strsql1);                  
                  while ($row=mysqli_fetch_row($result1)) { ?>
                  	<option value="<?php echo $row[0]; ?>">
                  	<?php echo $row[0]; ?> <?php echo $row[1]; } ?> </option>
			</select>               			
			</div>
			<br>
			<button class="btn btn-primary" type="submit" name="save">บันทึก</button>	
			<button class="btn btn-info" type="reset" name="reset">ยกเลิก</button>
		</form>	
	</div>	
</body>
</html>