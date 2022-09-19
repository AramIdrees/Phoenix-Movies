
<?php 

$db = mysqli_connect('localhost', 'root','','phoenix_movies');
if(!$db){
    echo mysqli_connect_error($db);
}


function clear($data){
    global $db;
    $data=mysqli_real_escape_string($db, htmlspecialchars($data));
    return $data;
}

if(isset($_SESSION['adminid']) && isset($_SESSION['username'])){
    $adminid=$_SESSION['adminid'];
    $username=$_SESSION['username'];
}

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    unset($adminid);
    unset($username);
    header("location:index.php?home");
}

?>