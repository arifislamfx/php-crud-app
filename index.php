<?php 
include('function.php');

$devsadmin = new webDevs();

if(isset($_POST['add_info'])) {
    $returnMsg = $devsadmin->add_data($_POST);
}

$students = $devsadmin->display_data();


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

       <?php if (isset($returnMsg)) {echo $returnMsg;} ?>

       <!-- form -->
    <form class="form" action="" method="post" enctype="multipart/form-data" >
        <input class="form-control mb-2" type="text" name="std_name" placeholder="enter your name">
        <input class="form-control mb-2 " type="number" name="std_roll" placeholder="enter your roll">
        <label for="upload"> Upload your file </label>
        <input class="form-control mb-2" type="file" name="std_img" >
        <input class="form-control mb-2 btn btn-warning" type="submit" value="Add info" name="add_info">

    </form>
   </div>

   <div class="container my-4 p-4 shadow">
       <table class="table table-responsive">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while($student=mysqli_fetch_assoc($students)) {?>
            <tr>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['std_name']; ?> </td>
                <td><?php echo $student['std_roll']; ?> </td>
                <td> <img style="width: 80px;" src="upload/<?php echo $student['std_img']; ?>" alt=""> </td>
                <td>
                    <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['id']; ?>" >Edit </a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
       </table>
   </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>