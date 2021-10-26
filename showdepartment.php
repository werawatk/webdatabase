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
	<title>โปรแกรมแสดงข้อมูลสาขาวิชาในรูปแบบตาราง</title>
</head>
<body>
	<div class="container">
		<h2 class="text-center"><font color="red"><strong>แสดงข้อมูลสาขาวิชา</strong></font></h2>
		 <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">เพิ่มข้อมูล</button>

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
          	<form name="frminputdep" method="post" action="?link=11" >
			<center><font size="16" color="red">กรอกข้อมูลสาขาวิชา</font></center>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
		<hr><table>
		<tr>
  		  <form action="#" method="post" class="form-line">
		 <div class="form-group col-md-3">
			<th><input type="text" name="txtsearch" class="form-control" value="<?php echo $strKeyword; ?>"></th>
			<th><button type="submit" name="btnsearch" class="btn btn-primary ">ค้นหา</button>
			</th>
		  </div>
		</form>
	</tr>
	   </table>
		<table class="table table-striped ">
			<thead class="table-primary">
				<tr >
					<th scope="col">รหัสสาขาวิชา</th>
					<th scope="col">ชื่อสาขาวิชา </th>
					<th class="text-center" colspan="2">การจัดการ </th>
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
		   	  $sql = "select * from department where depid LIKE '%".$strKeyword."%' or depname LIKE '%".$strKeyword."%'limit {$start},{$perpage}";
		   	  $result = mysqli_query($conn,$sql);
    		 // $count = mysqli_num_rows($result);
		   ?>
			<tbody>
				<tr>
					<?php while ($row=mysqli_fetch_row($result)) { ?>
                       <td> <?php echo $row[0]; ?></td>
         			   <td> <?php echo $row[1]; ?></td>
         			   <td> <a href="?link=12&id=<?php echo $row[0] ?>"><button class="btn btn-warning">แก้ไขข้อมูล</button></a></td>
         			   <td><a href="?link=14&id=<?php echo $row[0] ?>"><button class="btn btn-danger"onclick= "return confirm('คุณต้องการลบข้อมูลหรือไม่')">ลบข้อมูล</button></a></td>
                 </tr> 
                  <?php } ?>
             </tbody>			
		</table>
		<?php
		$sql2 = "select * from department";
		$query2 = mysqli_query($conn,$sql2);
		$total_record = mysqli_num_rows($query2);
		$total_page = ceil($total_record/$perpage);
		?>
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		    <li class="page-item ">
		      <a class="page-link" href="?link=2&page=1" tabindex="-1" >หน้าแรก</a>
		    </li>
		     <?php for($i=1;$i<=$total_page;$i++){?>
		    <li class="page-item"><a class="page-link" href="?link=2&page=<?php echo $i; ?>">
		    	<?php echo $i; ?></a></li>
		    <?php } ?>
		    <li class="page-item">
		      <a class="page-link" href="?link=2&page=<?php echo $total_page; ?>">หน้าสุดท้าย</a>
		    </li>
		  </ul>
		</nav>
	</div>
</body>
</html>    