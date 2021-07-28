<?php
    include('function.php');

    $objCrudAdmin = new crudApp();

    if(isset($_POST['submit'])){
        $return_msg = $objCrudAdmin-> add_data($_POST);
    }
   $students =  $objCrudAdmin->display_data();
   
   if(isset($_GET['status'])){
     if($_GET['status']='delete'){
       $delete_id = $_GET['id'];
       $del_msg = $objCrudAdmin->delete_data($delete_id);
     }
   }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD APP</title>
  </head>
  <body>
      <div class="container my-4 p-4 shadow">
         <h2  class="text-center"><a href="index.php" style="text-decoration: none;">DarunIT Student Database</a> </h2>
         <?php if(isset($del_msg)){ echo $del_msg;} ?>
         <form class="form" action="" method="post" enctype="multipart/form-data" >
         <?php if(isset($return_msg))  echo $return_msg; ?>
         <input class="form-control mb-2" type="text" name="name" placeholder="Enter your name">
         <input class="form-control mb-2" type="number" name="roll" placeholder="Enter your roll">
         <label for="image" class="form-control mb-2"> Upload your image: </label>
         <input type="file" name="image" class="form-control mb-2">
         <input type="submit" name="submit" value="ADD INFORMATION" class="form-control mb-2 bg-warning">
        </form> 
      </div>

      <div class="container my-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php while($student=mysqli_fetch_assoc($students)){ ?>
                <tr>
                    <td> <?php echo $student['id']; ?> </td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['roll']; ?></td>
                    <td><img style="height: 50px; width:45px;" src="upload/<?php echo $student['image']; ?>"></td>
                    <td>
                        <a class="btn btn-success" href="edit.php?status=edit&&id=<?php echo $student['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="?status=delete&&id=<?php echo $student['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
      </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>