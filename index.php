<?php include "header.php";?>
<!doctype html>
<html lang="en">

<head>
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <?php require_once 'process.php'; ?>

  

  <div class="container  my-5">

    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
    $sql = "SELECT * FROM data d join table_cat tc on d.id=tc.owner_id order by d.id";
    $result = mysqli_query($mysqli, $sql);
    ?>
    <div class="container-fluid row justify-content-center">
      <form action="process.php" method="POST">
        <input type="hidden" name="id owner_id" value="<?php echo $id ?>" 
        <label>Name</label>

        <select name="id" class="form-control">
          <?php
          $result->data_seek(0);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
          <?php } ?>
        </select>
    <div class="form-group">
      <label>Cat Name</label>
      <input type="text" name="cname" class="form-control" value="<?php echo $cname; ?>" placeholder="Enter your foking location">
    </div>
    <div class="form-group">
      <label>Age</label>
      <input type="text" name="age" class="form-control" value="<?php echo $age; ?>" placeholder="Enter your foking cat name">
    </div>
    <div class="form-group">
      <label>Breed</label>
      <input type="text" name="breed" class="form-control" value="<?php echo $breed; ?>" placeholder="Enter your cat breed">
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