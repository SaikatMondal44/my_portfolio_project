<?php 
include 'db_config.php';
$award_status = '';

$award_sql = "SELECT * FROM award_table";
$award_result = mysqli_query($con, $award_sql);
$award_rows = mysqli_fetch_assoc($award_result);

 if(isset($_POST['submit'])) {
    $award=$_POST['award'];
    $description=$_POST['description'];
    // $period=$_POST['period'];
  
if( $award_rows > 3){
      $award_status = "data already available in your database";  
    }
else {
      $award_sql = "INSERT INTO award_table (award,description,) VALUES ('$award', '$description')";
      $award_query = mysqli_query($con, $award_sql);

      if($award_query){
        $award_status = "inserted successfully";
      }

      else{
        $award_status = "failed to insert";
      }
    }    
  }

  $award_query = mysqli_query($con, $award_sql);

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
                  <form class="forms-sample" method="POST" action="awards_admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Award</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="award" name="award">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Description</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="description" name="description">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputCity1">Address</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="address" name="address">
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
            <h5> Award </h5>
            <table>
              <tr>
                <th> Sl </th>
                <th> Award </th>
                <th> Description </th>
              </tr>
              <?PHP
                while($award_rows = mysqli_fetch_assoc($award_query)){
              ?>
              <tr>
                <td> <?= $count ?> </td>
                <td> <?= $award_rows['award'] ?> </td>
                <td> <?= $award_rows['description'] ?> </td>
                <td> <a href="awards_admin.php?id=<?php echo $award_rows['id'] ?>" target = " "> edit </a> <a href="edit.php?id=<?php echo $award_rows['id'] ?>" target = " "> delete </a> </td>;
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
