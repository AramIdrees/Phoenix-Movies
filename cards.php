
<style>
    
    @media only screen and (max-width: 600px){
    .img{
        width:125px;
    }
}
</style>

<div class="conatiner" style="display:flex; flex-wrap:wrap; padding:10px; justify-content: space-between;">

    <?php 
    $query=mysqli_query($db, "SELECT * FROM `contents`  ORDER BY `id` DESC ");
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
            
        <?php } ?>   
</div>