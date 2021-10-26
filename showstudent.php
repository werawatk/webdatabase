<?php
    require 'connect.php';
    $sql = "select * from student";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
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
	<title>โปรแกรมแสดงข้อมูลนักศึกษาในรูปแบบตาราง</title>
</head>
<body>
	<div class="container">
		<h2 class="text-center"><font color="red"><strong>แสดงข้อมูลนักศึกษา</strong></font></h2>
		<table class="table table-striped ">
			<thead class="table-primary">
				<tr >
					<th scope="col">รหัสนักศึกษา</th>
					<th scope="col">ชื่อ </th>
					<th scope="col">เพศ </th>
					<th scope="col">ที่อยู่ </th>
					<th scope="col">สาขาที่เรียน </th>
					<th scope="col">รายได้ </th>
					<th scope="col">อีเมล์ </th>
				</tr>	
			</thead>
			<tbody>
				<tr>
					<?php while ($row=mysqli_fetch_row($result)) { ?>
                       <td> <?php echo $row[0]; ?></td>
         			   <td> <?php echo $row[1]; ?></td>
         			   <td> <?php echo $row[2]; ?></td>
         			   <td> <?php echo $row[3]; ?></td>
         			   <td> <?php echo $row[4]; ?></td>
         			   <td> <?php echo $row[5]; ?></td>
         			   <td> <?php echo $row[6]; ?></td>
                 </tr> 
                  <?php } ?>
             </tbody>			
		</table>
		<h4 class="text-center"><strong>จำนวน <?php echo mysqli_num_rows($result) ?> รายการ</strong></h4>
	</div>
</body>
</html>    