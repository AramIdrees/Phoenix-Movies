<?php session_start() ?>
<?php include "nav.php" ?>
<?php include "insert.inc.php"; ?>
<?php include "delete.inc.php";?>
<?php include "update.inc.php";?>
<br><br>




<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">  
        <div class="modal-body">
              <form class=" p-3  radius-10 shadow bg-white m-auto w-100"  method="POST" enctype="multipart/form-data">
                  <h2 class="text-center text-danger"><?php echo $errors['result'] ?></h2>
                  <div class="form-group w-100" >
                      <select class="w-100 text-center" name="type" id="">
                        <option value="horror">horror</option>
                        <option value="Action & Adventure">Action & Adventure</option>
                        <option value="animation">Animation</option>
                        <option value="anime">Anime</option>
                      </select>
                  </div>
                  <div class="form-group " >
                      <input name="name" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
                  
                  </div>

                  <div class="form-group " >
                  <input name="info" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter info">
                  
                  </div>

                  <div class="form-group " >
                  <input name="year" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter year">
                  
                  </div>

                  <div class="form-group " >
                  <input name="genre" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter genre">
                  
                  </div>

                  <div class="form-group " >
                  <input name="time" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the Time">
                  
                  </div>

                  <div class="form-group " >
                  <input name="embed" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter embed link">
                  
                  </div>
                  

                  
                  <div class="form-group">
                  <input name="file" type="file" class="form-control w-100" id="exampleInputPassword1" >
                  
                  </div>
                                        
                  <button name="importcard" type="submit" class="btn btn-danger w-100 ">Add</button>
              </form> 
        </div>  
        
      </div>
    </div>
  </div>






<form style="display:flex; align-items:center; text-align:center; margin:auto;" method="POST" class="text-center">
    <div style="display:flex; align-items:center; text-align:center; margin:auto;">
        <div>
        <select style=" background-color:#B2FFFF; width:200px; height:35px; font-size:20px; border:2px solid black; border-radius:25px 0px 0px 25px; margin-right:0;"  class="text-center" name="type" id="">
            <option value="horror">horror</option>
            <option value="Action & Adventure">Action & Adventure</option>
            <option value="animation">Animation</option>
        </select>
        </div>
        <div>
        <button  style="width:120px; height:35px; font-size:18px; background-color:#00FFFF; border-radius:0px 25px 25px 0px; margin-left:0;" name="filter">Submit</button>
        </div>
    </div>
</form>

<div class="conatiner" style="display:flex; flex-wrap:wrap; padding:10px; justify-content: space-between;">
    <?php
    if(isset($_POST['filter'])){
        $type=clear($_POST['type']);
        $query=mysqli_query($db,"SELECT * FROM `contents` WHERE `type`='$type' ORDER BY `id` DESC ");
        while($row=mysqli_fetch_assoc($query)){?>
            <div style="margin:20px;">
                
                <a href="view.php?postid=<?php echo $row['id'];?>">
                    <div class="card" style="border-radius:25px;">
                        <img style="border-radius:25px;" class="img" src="uploads/<?php echo $row['photo'] ?>" alt="" width="250px">
                    </div>
                </a>
                
                <?php if(isset($_SESSION['adminid']) ){?>
                    <a href="index.php?delete=<?php echo $row['id'];?>" style=""><img src="img/delete.png" width="35px" alt=""></a>
                    <span  data-toggle="modal" data-target="#post_<?php echo $row['id']; ?>"><img src="img/update.png" width="35px" alt=""></span>
                <?php } ?>
                
                <div class="mt-1">
                    <h5 class="text-center"><?php echo $row['name'] ?></h5>
                </div>
            </div>
       <?php } 
    } 
    else{ 
    $query=mysqli_query($db, "SELECT * FROM `contents` ORDER BY `id` DESC ");
    while($row=mysqli_fetch_assoc($query)){ ?>
    
    <div style="margin:20px;">
        
        <a href="view.php?postid=<?php echo $row['id'];?>">
            <div class="card" style="border-radius:25px;">
                <img style="border-radius:25px;" class="img" src="uploads/<?php echo $row['photo'] ?>" alt="" width="250px">
            </div>
        </a>
         
        <?php if(isset($_SESSION['adminid']) ){ ?>
            <a href="index.php?delete=<?php echo $row['id'];?>" style=""><img src="img/delete.png" width="35px" alt=""></a>
            <span  data-toggle="modal" data-target="#post_<?php echo $row['id']; ?>"><img src="img/update.png" width="35px" alt=""></span>
        <?php } ?>
        
        <div class="mt-1">
            <h5 class="text-center"><?php echo $row['name'] ?></h5>
        </div>
    </div>

   <?php }
   } ?>
</div>



