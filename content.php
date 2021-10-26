 <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                  require 'connect.php';
                  $sql = "select * from faculty";
                  $result = mysqli_query($conn,$sql);
                  $count = mysqli_num_rows($result);
                  echo $count;
                  ?>
                </h3>

                <p>ข้อมูลคณะ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">รายละเอียดเพิ่มเติม<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                  
                  $sql1 = "select * from department";
                  $result1 = mysqli_query($conn,$sql1);
                  $count1 = mysqli_num_rows($result1);
                  echo $count1;
                  ?></h3>

                <p>ข้อมูลสาขา</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3> 
                  <?php
                  
                  $sql2 = "select * from teacher";
                  $result2 = mysqli_query($conn,$sql2);
                  $count2 = mysqli_num_rows($result2);
                  echo $count2;
                  ?></h3>

                <p>ข้อมูลอาจารย์</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <?php
                  
                  $sql3 = "select * from student";
                  $result3 = mysqli_query($conn,$sql3);
                  $count3 = mysqli_num_rows($result3);
                  echo $count3;
                  ?>
                    
                  </h3>

                <p>ข้อมูลนักศึกษา</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">รายละเอียดเพิ่มเติม <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div> 
        <hr>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-11 connectedSortable">         <!-- Custom tabs (Charts with tabs)-->

                    
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%">
                 <?php
                 //error_reporting(~E_NOTICE);
                 error_reporting (E_ALL ^ E_NOTICE);
                 switch ($_GET['link']) {
                   case '1': include 'showfaculty.php'; //แสดข้อมูลตารางคณะ
                     break;
                   case '2': include 'showdepartment.php'; //แสดงข้อมูลตารางสาขาวิชา
                     break;  
                   case '3': include 'showteacher.php'; //แสดงข้อมูลตารางอาจารย์
                     break;  
                   case '4': include 'showstudent.php'; //แสดงข้อมูลตารางนักศึกษา
                     break; 
                   case '5': include 'insertfac.html'; //ฟอร์มพิ่มข้อมูล
                     break;   
                   case '6': include 'insertfac.php'; //แสดงการจัดเพิ่มข้อมูลในตารางคณะ
                     break;
                   case '7': include 'updatefac.php'; //แสดงฟอร์มแก้ไขข้อมูลคณะ
                     break;
                   case '8': include 'updatefacs.php'; //แสดงการจัดการแก้ไขข้อมูลคณะ
                     break;
                   case '9': include 'deletefac.php'; //ลบข้อมูลคณะ
                     break;   
                   case '10': include 'insertdeps.php'; //ฟอร์มเพิ่มข้อมูลสาขาวิชา
                     break;
                   case '11': include 'insertdep.php'; //แสดงการจัดเพิ่มข้อมูลสาขาวิชา
                     break; 
                   case '12': include 'updatedep.php'; //ฟอร์มแก้ไขข้อมูลสาขาวิชา
                     break;  
                   case '13': include 'updatedeps.php'; //แสดงการจัดการแก้ไขข้อมูลสาขาวิชา
                     break; 
                   case '14': include 'deletedep.php'; //แสดงการจัดการลบข้อมูลสาขาวิชา
                     break;                            
                   default:
                     include 'donut.php'; //แสดงข้อมูลในรูปกราฟต่าง ๆ
                     break;
                 }
                 
                 ?>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          
      </section>
              <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
