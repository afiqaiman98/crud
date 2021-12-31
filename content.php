<?php include "header.php";?>
<?php require_once 'process.php'; ?>
<div class="container">

<?php
$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
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
            <th>Cat Name</th>
            <th>Cat Age</th>
            <th>Cat Breed</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

        <?php
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['cname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['breed']; ?></td>


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