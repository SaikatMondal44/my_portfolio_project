<?php 

$count = 1;
include 'db_config.php';
$about_status = '';

 $about_sql = "SELECT * FROM about";
 $about_result = mysqli_query($con,$about_sql);
 $num_rows = mysqli_num_rows($about_result);

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address']; 
  $linkedin = $_POST['linkedin'];
  $facebook = $_POST['facebook'];
  $github = $_POST['github'];
  $research = $_POST['research'];
  $description = $_POST['description'];
// var_dump($_FILES['image']) ;
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["image"]["name"]); 


$uploadOk = 1;

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    
    
    if($check !== false) {
        // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        // echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($targetFile)) {
    echo "Sorry, the file already exists.";
    $uploadOk = 0;
}

if ($_FILES["image"]["size"] > 5000000) { // 5MB limit
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

$allowedExtensions = array("jpg", "jpeg", "png", "gif");
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
}

else{
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

            // Display the uploaded image
            echo '<img src="' . $targetFile . '" alt="Uploaded Image">';
    }   else {
            echo "Sorry, there was an error uploading your file.";
    }
}

// var_dump($imageFileType);

$image_data = $_FILES["image"]["tmp_name"];
// $image_name = mysqli_real_escape_string($con, $_FILES["image"]["name"]);
// // var_dump($image_name);
if($num_rows>0){
    $status = "You have already data in your database";
}

  else{
    // var_dump($targetFile);
    // die();
    $about_sql = "INSERT INTO about (name,email,phone,address,linkedin,facebook,github,research,description,image,image_data) VALUES ('$name','$email','$phone','$address','$linkedin','$facebook','$github','$research','$description','$targetFile','$image_data')";
    $about_query = mysqli_query($con,$about_sql);
    
  
    if($about_query){
      $status = "inserted successfully";
    }
    else{
      $status = "failed! somethink went rong";
    }
    echo $status;
  }
}
// $query = mysqli_query($con,$sql);
$about_query = mysqli_query($con,$about_sql);
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
                  <form class="forms-sample" method="POST" action="about_admin.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Phone</label>
                      <input type="phone" class="form-control" id="exampleInputPassword4" placeholder="Phone" name="phone">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">Linkedin</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Linkedin" name="linkedin">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Facebook</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Facebook" name="facebook">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Github</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Github" name="github">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Research profile</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Research profile" name="research">
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputCity1">Address</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="address" name="address">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleTextarea1">Address</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" name="address"></textarea >
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="editor1" rows="4" name="description"></textarea >   
                      <script>
                      // Replace the textarea with CKEditor
                      CKEDITOR.replace('description');
                      </script>
                    </div>
                    <div class="form-group">
                      <label>Image upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" placeholder="Upload Image" name="image">
                        <span class="input-group-append">
                          <!-- <button class="file-upload-browse btn btn-primary" type="button">Upload</button> -->
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
                    <!-- <button class="btn btn-light" name="cancel">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>  
        
            <h5> ABOUT MYSELF</h5>
            <table>
              <tr>
                <th> Sl </th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Address </th>
                <th> Linkedin </th>
                <th> Facebook </th>
                <th> GitHub </th>
                <th> research </th>
                <th> Description </th>
                <th> Photo </th>
                <!-- <th> Action </th> -->
              </tr>
              <?PHP
                while($rows = mysqli_fetch_assoc($about_query)){
              ?>
              <tr>
                <td> <?= $count ?> </td>
                <td> <?= $rows['name'] ?> </td>
                <td> <?= $rows['email'] ?> </td>
                <td> <?= $rows['phone'] ?> </td>
                <td> <?= $rows['address'] ?> </td>
                <td> <?= $rows['linkedin'] ?> </td>
                <td> <?= $rows['facebook'] ?> </td>
                <td> <?= $rows['github'] ?> </td>
                <td> <?= $rows['research'] ?> </td>
                <!-- <td> <?= $rows['description'] ?> </td> -->
                <td> <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?php echo $rows['image'] ?>"> </td>
                <td> <a href="about_update.php?id=<?php echo $rows['id'] ?>" target = " "> edit </a> <a href="edit.php?id=<?php echo $rows['id'] ?>" target = " ">delete </a> </td>;
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
  <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
  <script>
    $(document).ready(function() {
        CKEDITOR.replace('description');
    });
  </script>
  <!-- End custom js for this page-->
</body>

</html>
