<?php include "header.php"; ?>
<?php require_once 'process.php'; ?>


<form action="display.php" method="POST">
    
<div class = "container my-5">
<div class="form-group">
<input type="hidden" name="cat_id" value="<?php echo $cat_id ?>"
    <label>Cat Name</label>
    <input type="text" name="cname" class="form-control" value="<?php echo $cname; ?>" placeholder="Enter cat name">
</div>
<div class="form-group">
    <label>Age</label>
    <input type="text" name="age" class="form-control" value="<?php echo $age; ?>" placeholder="Enter cat age ">
</div>
<div class="form-group">
    <label>Breed</label>
    <input type="text" name="breed" class="form-control" value="<?php echo $breed; ?>" placeholder="Enter your cat breed">
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
</div>
</form>