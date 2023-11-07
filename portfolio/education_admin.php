<?php 

$count = 1;
include 'db_config.php';
$edu_status = '';

$edu_sql = "SELECT * FROM edu_table";
$edu_result = mysqli_query($con, $edu_sql);
$edu_rows = mysqli_fetch_assoc($edu_result);

 if(isset($_POST['submit'])) {
    $institute=$_POST['institute'];
    $degree=$_POST['degree'];
    $score=$_POST['score'];
    $period=$_POST['period'];
  
if( $edu_rows > 4){
      $edu_status = "data already available in your database";  
    }
else {
      $edu_sql = "INSERT INTO edu_table (institute, degree, score, period) VALUES ('$institute', '$degree','$score','$period')";
      $edu_query = mysqli_query($con, $edu_sql);

      if($edu_query){
        $edu_status = "inserted successfully";
      }

      else{
        $edu_status = "failed to insert";
      }
    }    
  }

  $edu_query = mysqli_query($con, $edu_sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin_design/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin_design/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin_design/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin_design/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include'head_nav.php';?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php include'side_nav.php';?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">About me</h4>
                  <form class="forms-sample" method="POST" action="education_admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Institute</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="institute" name="institute">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Degree</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="degree" name="degree">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Score</label>
                      <input type="text" class="form-control" id="exampleInputPassword4" placeholder="score" name="score">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">Period</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="period" name="period">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputCity1">Facebook</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Facebook" name="facebook">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleTextarea1">Address</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="address"></textarea >
                    </div> -->
                    <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                    <!-- <button class="btn btn-light" name="cancel">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>
            <h5> Education </h5>
            <table>
              <tr>
                <th> Sl </th>
                <th> Institute </th>
                <th> Degree </th>
                <th> Score </th>
                <th> Role  </th>
                
              </tr>
              <?PHP
                while($rows = mysqli_fetch_assoc($edu_query)){
              ?>
              <tr>
                <td> <?= $count ?> </td>
                <td> <?= $rows['institute'] ?> </td>
                <td> <?= $rows['degree'] ?> </td>
                <td> <?= $rows['score'] ?> </td>
                <td> <?= $rows['role'] ?> </td>
                
                
                <td> <a href="education_admin.php?id=<?php echo $rows['id'] ?>" target = " "> edit </a> <a href="edit.php?id=<?php echo $rows['id'] ?>" target = " "> delete </a> </td>;
                </tr>
              <?php
                  $count = $count + 1;
                }
              ?>
            </table>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard  </a> templates</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin_design/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="admin_design/js/off-canvas.js"></script>
  <script src="admin_design/js/hoverable-collapse.js"></script>
  <script src="admin_design/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="admin_design/js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
