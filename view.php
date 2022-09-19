<?php include "nav.php"?>
<style>
    .info{
        width:60%;
    }
    @media only screen and (max-width: 600px){
    .info{
        width:80%;
        text-align:center;
        align-items:center;
    }
    .postcard{
       margin:auto;
    }
}
</style>

<?php

$postid=clear($_GET['postid']);
$query = mysqli_query($db, " SELECT * FROM `contents` WHERE `id` = '$postid'");


while($row = mysqli_fetch_assoc($query)){?>



<div class="infoall" style="padding: 40px; display:flex; flex-wrap:wrap; border:2px  ; margin:10px;">
    <div class="postcard">
        <img  src="uploads/<?php echo $row['photo'] ?>" alt="" width="250px" style="border-radius:30px;">
    </div>
    <div class="info" style="margin:25px;">
        <div>
            <h2 style="font-size:55px;"><?php echo $row['name'] ?></h2>
        </div>
        <br>
        <div  >
            <p  style=" font-size:18px;"><b>Info: </b><?php echo $row['info'] ?></p>
        </div>
        <div>
            <p style="font-size:25px;"><b>Year: </b><?php echo $row['year'] ?></p>
        </div>
        <div>
            <p style="font-size:25px;"><b>Genre: </b><?php echo $row['genre'] ?></p>
        </div>
        <div>
            <p style="font-size:25px;"><b>Time: </b><?php echo $row['time'] ?></p>
        </div>
    </div>
</div>




<h2 class="text-center">Watch now</h2>
<br><br>
<div class="w-75 m-auto embed-responsive embed-responsive-16by9" >
  <?php echo $row['embed'] ?>
</div>

<br><br>

<?php }?>