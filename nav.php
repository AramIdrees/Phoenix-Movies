
<?php include "config.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php 
      if (isset($_GET['home']) || isset($_GET['page'])){
        echo "Home";
      }
      else if(isset($_GET['movies']) || isset($_GET['movies-page'])){
        echo "Movies";
      }
      else if(isset($_GET['animes'])){
        echo "Animes";
      }
      else if(isset($_GET['search'])){
        echo "Search";
      }
      else if(isset($_GET['postid'])){
        $postid=clear($_GET['postid']);
        $query = mysqli_query($db, " SELECT * FROM `contents` WHERE `id` = '$postid'");
        while($row = mysqli_fetch_assoc($query)){
          echo $row['name'];
        }
      }
      ?>
    </title> 
    <link rel="shortcut icon" typle="img/jpg" href="img/phoenix.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style>
      
      
     
      
        body{
            background: #9796f0;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to left, #fbc7d4, #9796f0);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to left, #fbc7d4, #9796f0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }
    </style>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-none">
  <a class="navbar-brand" style="font-size:1.75rem;" href="index.php?home">Phoenix Movies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a  class="nav-link " href="index.php?home" style="font-size:1.25rem; ">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="movies.php?movies" style="font-size:1.25rem;">Movies</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="animes.php?animes"style="font-size:1.25rem;" tabindex="-1" >Animes</a>
      </li>
      <?php 
      if(isset($_SESSION['username']) && isset($_SESSION['adminid'])){
      echo  "<li class='nav-item m-1'>
                  <a href='?logout' method='POST' name='logout' class='btn btn-outline-danger my-2 my-sm-0 m-2' type='submit'>Logout</a>
            </li>
            <li class='nav-item m-1'>
        <a data-toggle='modal' data-target='#import'  method='POST' name='login' class='btn btn-outline-success my-2 my-sm-0 m-2' type='submit'>import</a>
        </li>";
      }
      else{
      echo  "<li class='nav-item m-1'>
        <a href='login.php' method='POST' name='login' class='btn btn-outline-success my-2 my-sm-0 m-2' type='submit'>Login</a>
        </li>
        
        ";
      }
      ?>
      
    </ul>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="form-inline my-2 my-lg-0">
      <input name='search' class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php include "search.inc.php";?>