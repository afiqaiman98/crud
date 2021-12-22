<!doctype html>
<html lang="en">
  <head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>

  <body>
      <?php require_once 'process.php'; ?>

      <?php

          if(isset($_SESSION['message'])): ?>

          <div class="alert alert-<?=$_SESSION['msg_type']?>">

          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>

          </div>
          <?php endif ?>
          
      <div class = "container">

      <?php
        $mysqli = new mysqli('localhost', 'root', '','crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        //pre_r($result);
      ?>

      <div class = "row justify-content-center container-fluid">
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Location</th>
              <th colspan = "2">Action</th>
            </tr> 
          </thead> 

      <?php
        while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td>
            <a href = "index.php?edit=<?php echo $row['id']; ?>"
                class= "btn btn-info">Edit</a>
            <a href =  "process.php?delete=<?php echo $row['id']; ?>"
                class = "btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>    
      
        </table>  
      </div>  

      <?php

        function pre_r($array){
          echo '<pre>';
          print_r($array);
          echo '</pre>';
        }

      ?>


      <div class = "container-fluid row justify-content-center">
      <form action = "process.php" method = "POST">
          <input type="hidden" name="id" value="<?php echo $id?>"
          <div class = "form-group">
          <label>Name</label>
          <input type = "text" name = "name" class = "form-control" value="<?php echo $name; ?>" placeholder = "Enter your foking name">
          </div>
          <div class = "form-group">
          <label>Location</label>
          <input type = "text" name = "location" class = "form-control" value="<?php echo $location;?>" placeholder = "Enter your foking location">
          </div>
          <div class = "form-group">

          <?php
          if($update == true):
          ?>
           <button type = "submit" class = "btn btn-info" name = "update">Update</button>
          <?php else: ?>
           <button type = "submit" class = "btn btn-primary" name = "save">Save</button>
          <?php endif; ?>
          </div>
      </form>  
      </div> 
      </div>
  </body>

</html>