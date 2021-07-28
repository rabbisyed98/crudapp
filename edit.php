<?php
    include('function.php');

    $objCrudAdmin = new crudApp();
    
   $students =  $objCrudAdmin->display_data();

   if(isset($_GET['status'])){
       if($_GET['status']='edit'){
           $id = $_GET['id'];
           $return_data = $objCrudAdmin->display_data_by_id($id);
       }
   }
   if(isset($_POST['ed_submit'])){
    $up_mgs = $objCrudAdmin->update_data($_POST);
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
         <h2  class="text-center"><a href="index.php" style="text-decoration: none;">Miazi Web Tech Student Database</a> </h2>
         <form class="form" action="" method="post" enctype="multipart/form-data" >
         <?php if(isset($up_mgs))  echo $up_mgs; ?>
         <input class="form-control mb-2" type="text" name="ed_name" value="<?php echo $return_data['name'] ?>">
         <input class="form-control mb-2" type="number" name="ed_roll" value="<?php echo $return_data['roll'] ?>">
         <label for="image" class="form-control mb-2"> Upload your image: </label>
         <input type="file" name="ed_image" class="form-control mb-2">
         <input type="hidden" name="id" value="<?php echo $return_data['id']; ?>">
         <input type="submit" name="ed_submit" value="UPDATE INFORMATION" class="form-control mb-2 bg-warning">
        </form> 
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