<?php session_start() ?>
<?php include "nav.php" ?>

<?php 

$errorslogin = ['result' =>'' , 'username' =>'' , 'password' =>'']; 
if(isset($_POST['login'])){
    $username = clear($_POST['username']);
    $password = clear($_POST['password']);

    if (empty($username) && empty($password)){
        $errorslogin['result']='please fill the blanks';
    }
    else if (empty($username)){
        $errorslogin['username']='please enter the username';
    }
    else if(empty($password)){
        $errorslogin['password']='please enter the password';
    }
    else{
        $password = hash('gost',$password);
        $query = mysqli_query($db, "SELECT * FROM `admins` WHERE `username` ='$username' AND `password` ='$password'");
        if(mysqli_num_rows($query)==1){
            while($row =mysqli_fetch_assoc($query)){
                $_SESSION['adminid'] =clear($row['id']);
                $_SESSION['username'] =clear($row['username']);
                header("location:index.php?home");
            }
        }
        else{
            header("location:login.php");
        }
    }
}
?>


<form class=" p-3  radius-10 shadow bg-white m-auto w-50"  method="POST" enctype="multipart/form-data">
        
         <h2 class="text-center text-danger"><?php echo $errorslogin['result'] ?></h2>

        <div class="form-group " >
        <input name="username" type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter userame">
        <p class="text-danger"><?php echo $errorslogin['username'] ?></p>
        </div>

        <div class="form-group " >
        <input name="password" type="password" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password">
        <p class="text-danger"><?php echo $errorslogin['password'] ?></p>
        </div>
        
        
                              
        <button name="login" type="submit" class="btn btn-primary w-100 ">Login</button>
</form> 