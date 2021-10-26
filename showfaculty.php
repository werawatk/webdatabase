<?php
    
    $strKeyword = null;
    if(isset($_POST['txtsearch']))
    {
    	$strKeyword = $_POST['txtsearch'];
    }
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
	<title>โปรแกรมแสดงข้อมูลคณะในรูปแบบตาราง</title>
</head>
<body>
	<div class="container">
		<h2 class="text-center"><font color="red"><strong>แสดงข้อมูลคณะ</strong></font></h2>
		<div class="container">
   <!-- Trigger the modal with a button fordev22.com-->
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">เพิ่มข้อมูล</button>

  <!-- Modal fordev22.com-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content fordev22.com-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ฟอร์มเพิ่มข้อมูล</h4>
        </div>
        <div class="modal-body">
          	<form name="frminputfac" method="post" action="?link=6" enctype="multipart/form-data">
			<center><font size="20" color="red"><strong>กรอกข้อมูลคณะ</strong></font></center>
			<div class="form-group">
				<label for="inputid">รหัสคณะ : </label>
				<input type="text" class="form-control" name="fctid" placeholder="กรุณากรอกรหัสคณะ">
			</div>
			<div class="form-group">
				<label for="inputname">ชื่อคณะ :</label>
				<input type="text" class="form-control" name="fctname" placeholder="กรุณากรอกชื่อคณะ">
			</div>
			<div class="form-group">
				<label for="inputpic">รูปภาพ :</label>
				<input type="file" name="img" class="form-control">	
			</div>
			<br>
			<button class="btn btn-primary" type="submit" name="save">บันทึก</button>	
			<button class="btn btn-info" type="reset" name="reset">ยกเลิก</button>
		</form>	
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
		<hr>
		<table>
			<tr>
		<form action="#" method="post" class="form-line">
		 <div class="form-group col-md-3">
			<th><input type="text" name="txtsearch" class="form-control" value="<?php echo $strKeyword; ?>"></th>
			<th><button type="submit" name="btnsearch" class="btn btn-primary ">ค้นหา</button></th>
			<br>
		  </div>
		</form>
	</tr>
	</table>
		<table class="table table-striped ">
			<thead class="table-primary">
				<tr >
					<th scope="col">รหัสคณะ</th>
					<th scope="col">ชื่อคณะ </th>
					<th scope="col">รูปภาพ </th>
					<th colspan="2" class="text-center">การจัดการ </th>
				</tr>	
			</thead>
		   <?php
		   	require 'connect.php';
		   	$perpage = 5;
		   	if(isset($_GET['page']))
		   	{
		   		$page = $_GET['page'];
		   	} else {
		   	    $page = 1;
		   	}
		   	  $start = ($page -1)*$perpage;
		   	  $sql = "select * from faculty where fctid LIKE '%".$strKeyword."%' or fctname LIKE '%".$strKeyword."%'limit {$start},{$perpage}";
		   	  $result = mysqli_query($conn,$sql);
    		 // $count = mysqli_num_rows($result);
		   ?>
			<tbody>
				<tr>
					<?php while ($row=mysqli_fetch_row($result)) { ?>
                       <td> <?php echo $row[0]; ?></td>
         			   <td> <?php echo $row[1]; ?></td>
         			   <td> <img src="img/<?php echo $row[2]; ?>"></td>
         			   <td><a href="?link=7&id=<?php echo $row[0]; ?>"><button class="btn btn-warning">แก้ไขข้อมูล</button></a></td>
         			   	<td><a href="?link=9&id=<?php echo $row[0]; ?>"><button class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">ลบข้อมูล</button></a></td>

                 </tr> 
                  <?php } ?>
             </tbody>			
		</table>
		<?php
		$sql2 = "select * from faculty";
		$query2 = mysqli_query($conn,$sql2);
		$total_record = mysqli_num_rows($query2);
		$total_page = ceil($total_record/$perpage);
		?>
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		    <li class="page-item ">
		      <a class="page-link" href="?link=1&page=1" tabindex="-1" >หน้าแรก</a>
		    </li>
		     <?php for($i=1;$i<=$total_page;$i++){?>
		    <li class="page-item"><a class="page-link" href="?link=1&page=<?php echo $i; ?>">
		    	<?php echo $i; ?></a></li>
		    <?php } ?>
		    <li class="page-item">
		      <a class="page-link" href="?link=1&page=<?php echo $total_page; ?>">หน้าสุดท้าย</a>
		    </li>
		  </ul>
		</nav>
	</div>

</div>
</body>
</html>    