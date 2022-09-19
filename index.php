<?php session_start() ?>
<?php include "nav.php";?>
<?php include "insert.inc.php"; ?>
<?php include "delete.inc.php";?>
<?php include "update.inc.php";?>







<?php 

if(isset($_GET['success'])){
  echo "<h2 class='text-center text-success'>this data has been updated successfully!!</h2>";
}
?>


<?php 
$num_per_page =16;

if(isset($_GET['page'])){
  $page=clear($_GET['page']);
}
else{
  $page=1;
}
$Start_from=($page-1)*$num_per_page;



?>












<!-- <form class=" p-3  radius-10 shadow bg-white m-auto w-50"  method="POST" enctype="multipart/form-data">
         <h2 class="text-center text-danger"><?php echo $errorsofslideshow['result'] ?></h2>
        <div class="form-group " >
        <input name="name" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
        
        </div>

        
        <div class="form-group">
        <input name="file" type="file" class="form-control w-100" id="exampleInputPassword1" >
        
        </div>
                              
        <button name="add" type="submit" class="btn btn-danger w-100 ">Add</button>
</form>  -->










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










<?php include "cards.php";?>


<?php
// $slectquery=mysqli_query($db,"SELECT * FROM `contents` ORDER BY `id` ASC");
// $NumOfShow=mysqli_num_rows($slectquery);
// $TotalRows=ceil($NumOfShow/$num_per_page); ?>
<!-- <div class='text-center p-5 m-5' >  -->
<?php
// for($i=1; $i<=$TotalRows; $i++){
//   echo 
//   "
    
//         <a  style='text-decoration:none; color:black; background-color:lightblue; border-radius:20px; margin:10px; font-size:20px;'   href='index.php?page=".$i." '>".$i." </a>
    
  
//     ";

//} ?>
<!-- </div> -->
<?php ?>