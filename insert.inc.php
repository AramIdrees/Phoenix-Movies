



<?php 
$errors = ['result'=> '' ];
if(isset($_POST['importcard']) && isset($adminid)){
    
    
    
    $type=clear($_POST['type']);
    $name =clear($_POST["name"]);
    $info =clear($_POST['info']);
    $year =clear($_POST['year']);
    $genre=clear($_POST['genre']); 
    $time=clear($_POST['time']);
    $embed=$_POST['embed'];
    $file = $_FILES['file'];
    
    //information of photo
    $FileName=$file['name'];
    $FileType=$file['type'];
    $FileTmp=$file['tmp_name'];
    $FileError=$file['error'];
    $FileSize=$file['size'];

    $FileExt = explode('.',$FileName);
    $ActualFileExt=strtolower(end($FileExt));
    $FileAllowed = array('png' , 'jpg' , 'jpeg' . 'svg');

    if(in_array($ActualFileExt , $FileAllowed)){
         if($FileError ===0){
            if($FileSize <100000000){
                $NewFileName = rand().'.'.$ActualFileExt;
                $FileDestination = "uploads/$NewFileName";
                move_uploaded_file($FileTmp,$FileDestination);
            }
            else{
                $errors['result']='the file size is too large!!';
            }
         }
         else{
                $errors['result']='there is some error please try again!!';
         }
    }
    else{
                $errors['result']='please enter photo only!!';
    }

    if(empty(clear($_POST['name'])) || empty(clear($_POST['info'])) || empty(clear($_POST['genre'])) || empty(clear($_POST['year'])) || empty(clear($_POST['time'])) || empty(clear($_POST['embed']))){
        $errors['result'] ='please fill the blanks!!';
    }
    else{
        $query = mysqli_query($db, "INSERT INTO `contents`(`name` ,`info`,`year`,`genre`, `time` ,`embed` ,`photo`,`type`) VALUES ('$name' , '$info' , '$year' , '$genre' , '$time' , '$embed' , '$NewFileName','$type')");
        if($query){
            header("location:index.php?home");
        }
    }
    
}
?>