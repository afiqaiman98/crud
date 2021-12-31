  <?php include "header.php";?>
  <?php require_once 'process.php'; ?>

  <?php

  if (isset($_SESSION['message'])) : ?>

    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>

    </div>
  <?php endif ?>

  <div class="container">

    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    $sql = "SELECT * FROM data d join table_cat tc on d.id=tc.owner_id order by d.id";
    $result = mysqli_query($mysqli, $sql);
    //pre_r($result);
    ?>

    <div class="container-fluid row justify-content-center">
      <form action="process.php" method="POST">
        <input type="hidden" name="id owner_id" value="<?php echo $id ?>"
        <label>Name</label>

        <select name="id" class = "form-control">
          <?php
          $result->data_seek(0);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <option hidden>Select name</option>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
          <?php } ?>
        </select>
    
    <div class="form-group">
      <label>Cat Name</label>
      <input type="text" name="cname" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your cat name">
    </div>
    <div class="form-group">
      <label>Age</label>
      <input type="text" name="age" class="form-control" value="<?php echo $cname; ?>" placeholder="Enter your cat age">
    </div>
    <div class="form-group">
      <label>Breed</label>
      <input type="text" name="breed" class="form-control" value="<?php echo $age; ?>" placeholder="Enter your cat breed">
    </div>
    
  </div>

  <div class="form-group container">
    <?php
    if ($update == true) :
    ?>
      <button type="submit" class="btn btn-info" name="update">Update</button>
    <?php else : ?>
      <button type="submit" class="btn btn-primary" name="save">
        <a href="content.php" class="text-light">Save</a>
      </button>
    <?php endif; ?>
  </div>
  

  </form>
  </div>
</body>

</html>