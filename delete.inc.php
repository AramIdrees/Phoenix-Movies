<?php
if(isset($_GET['delete']) && isset($adminid)){
    $delete = clear($_GET['delete']);
    $GetImage=mysqli_query($db, "SELECT * FROM `contents` WHERE `id`='$delete'");
  if($row=mysqli_fetch_assoc($GetImage)){
    $image=$row['photo'];
  }
  $query =mysqli_query($db, "DELETE FROM `contents` WHERE `id`='$delete'");
  if($query){
    unlink("uploads/$image");
    header("location:index.php?home");
  }
}


?>