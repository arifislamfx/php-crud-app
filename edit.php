<?php 
include('function.php');

$devsadmin = new webDevs();

$students = $devsadmin->display_data();

if(isset($_GET['status'])) {
    if($_GET['status'] = 'edit' ) {
        $id = $_GET['id'];
        $returnData = $devsadmin->display_data_by_id($id);
    }
}

if(isset($_POST['update_info'])) {
  $msg = $devsadmin->update_data($_POST);
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>webDevs Students List</title>
  </head>
  <body>
    
   <div class="container my-4 p-4 shadow">
       <h2 class="text-center mb-2 text-blue" > <a style="text-decoration: none;" href="index.php"> webDevs student list </a> </h2>

       <?php if (isset($msg)) { echo $msg;} ?>
       
       <!-- form -->
    <form class="form" action="" method="post" enctype="multipart/form-data" >
        <input class="form-control mb-2" type="text" name="u_std_name" value="<?php echo $returnData['std_name']; ?>" >

        <input class="form-control mb-2 " type="number" name="u_std_roll" value="<?php echo $returnData['std_roll']; ?>" >
        <label for="upload"> Upload your file </label>
        <input class="form-control mb-2" type="file" name="u_std_img" >

        <input type="hidden" name="id" value="<?php echo $returnData['id']; ?>" >

        <input class="form-control mb-2 btn btn-warning" type="submit" value="Update info" name="update_info">

    </form>
   </div>

 

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>