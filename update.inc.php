<?php
ob_start();
if(isset($_POST['update']) && isset($adminid)){
    $id =clear($_POST['id']);
    $name =clear($_POST["name"]);
    $info =clear($_POST['info']);
    $year =clear($_POST['year']);
    $genre=clear($_POST['genre']); 
    $time=clear($_POST['time']);
    $embed=$_POST['embed'];

    $query = mysqli_query($db, "UPDATE `contents` SET `name` ='$name' , `info` ='$info' , `year` = '$year' , `genre` = '$genre' , `time` = '$time' , `embed` = '$embed' WHERE `id` = '$id'");
    if($query){
        header("location:index.php?success");
    }
}

?>



<?php
$query=mysqli_query($db, " SELECT * FROM `contents` ORDER BY `id` ASC");
while($row = mysqli_fetch_assoc($query)){?>
<div class="modal fade" id="post_<?php echo clear($row['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">  
        <div class="modal-body">
        <form class=" p-3  radius-10 shadow bg-white m-auto w-100"  method="POST" enctype="multipart/form-data">
         
        <div class="form-group " >
        <input name='id' type="text" class="form-control form-control-lg mt-2" value="<?php echo $row['id']; ?>" hidden>
        <input name="name" type="text" class="form-control w-100" id="exampleInputEmail1" value="<?php echo $row['name'] ?>" aria-describedby="emailHelp" placeholder="Enter Name">
        
        </div>

        <div class="form-group " >
        <input name="info" type="text" class="form-control w-100" id="exampleInputEmail1" value="<?php echo $row['info'] ?>" aria-describedby="emailHelp" placeholder="Enter info">
        
        </div>

        <div class="form-group " >
        <input name="year" type="text" class="form-control w-100" id="exampleInputEmail1" value="<?php echo $row['year'] ?>" aria-describedby="emailHelp" placeholder="Enter year">
        
        </div>

        <div class="form-group " >
        <input name="genre" type="text" class="form-control w-100" id="exampleInputEmail1" value="<?php echo $row['genre'] ?>" aria-describedby="emailHelp" placeholder="Enter genre">
        
        </div>

        <div class="form-group " >
        <input name="time" type="text" class="form-control w-100" id="exampleInputEmail1" value="<?php echo $row['time'] ?>" aria-describedby="emailHelp" placeholder="Enter the Time">
        
        </div>

        <div class="form-group " >
        <input name="embed" type="text" class="form-control w-100" id="exampleInputEmail1" value="<?php echo clear($row['embed']) ?>" aria-describedby="emailHelp" placeholder="Enter embed link">
        
        </div>
        

        
        <!-- <div class="form-group">
        <input name="file" type="file" class="form-control w-100" id="exampleInputPassword1" >
        
        </div> -->
                              
        <button name="update" type="submit" class="btn btn-danger w-100 ">Update</button>
</form>
        </div>  
        
      </div>
    </div>
  </div>
  <?php } ?>