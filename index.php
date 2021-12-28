<!doctype html>
<html lang="en">

<head>
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
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
    // $result = $mysqli->query("SELECT * FROM data d join table_cat tc on d.id=tc.owner_id") or die($mysqli->error);
    $sql = "SELECT * FROM data d join table_cat tc on d.id=tc.owner_id order by d.id";

    $result = mysqli_query($mysqli, $sql);
    //pre_r($result);
    ?>

    <div class="row justify-content-center container-fluid">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <!-- <th>Location</th> -->
            <th>Cat Name</th>
            <th>Cat Age</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <!-- <td><?php echo $row['location']; ?></td> -->
            <td><?php echo $row['cname']; ?></td>
            <td><?php echo $row['age']; ?></td>

            <td>
              <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
              <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php } ?>

      </table>
    </div>

    <?php

    function pre_r($array)
    {
      echo '<pre>';
      print_r($array);
      echo '</pre>';
    }

    ?>


    <div class="container-fluid row justify-content-center">
      <form action="process.php" method="POST">
        <input type="hidden" name="id owner_id" value="<?php echo $id ?>" <div class="form-group">
        <label>Name</label>

        <select name="id">
          <?php
          $result->data_seek(0);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
          <?php } ?>
        </select>
        <!-- <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your foking name"> -->
    </div>
    <div class="form-group">
      <label>Cat Name</label>
      <input type="text" name="cname" class="form-control" value="<?php echo $location; ?>" placeholder="Enter your foking location">
    </div>
    <div class="form-group">
      <label>Age</label>
      <input type="text" name="age" class="form-control" value="<?php echo $cname; ?>" placeholder="Enter your foking cat name">
    </div>
    <div class="form-group">
      <label>Breed</label>
      <input type="text" name="breed" class="form-control" value="<?php echo $age; ?>" placeholder="Enter your cat age">
    </div>
  </div>

  <div class="form-group container">
    <?php
    if ($update == true) :
    ?>
      <button type="submit" class="btn btn-info" name="update">Update</button>
    <?php else : ?>
      <button type="submit" class="btn btn-primary" name="save">Save</button>
    <?php endif; ?>
  </div>
  </form>
  </div>
  </div>
</body>

</html>