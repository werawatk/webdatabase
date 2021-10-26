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
	<div class="container">
		<form name="frminputdep" method="post" action="?link=11" >
			<center><font size="20" color="red"><strong>กรอกข้อมูลสาขาวิชา</strong></font></center>
			<div class="form-group">
				<label for="inputid">รหัสสาขาวิชา : </label>
				<input type="text" class="form-control" name="depid" placeholder="กรุณากรอกรหัสสาขาวิชา">
			</div>
			<div class="form-group">
				<label for="inputname">ชื่อสาขาวิชา :</label>
				<input type="text" class="form-control" name="depname" placeholder="กรุณากรอกชื่อสาขา">
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
			<br>
			<button class="btn btn-primary" type="submit" name="save">บันทึก</button>	
			<button class="btn btn-info" type="reset" name="reset">ยกเลิก</button>
		</form>	
	</div>	
</body>
</html>