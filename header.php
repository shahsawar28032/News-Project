<?php
include "config.php";
$page = basename($_SERVER['PHP_SELF']);
switch($page){
  case "single.php":
    if(isset($_GET['id'])){
      $sql_title = "SELECT * FROM post WHERE post_id = {$_GET['id']}";
      $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
      $row_title = mysqli_fetch_assoc($result_title);
      $page_title = $row_title['title'];
    }else{
      $page_title = "No Post Found";
    }
    break;
  case "category.php":
    if(isset($_GET['cid'])){
      $sql_title = "SELECT * FROM category WHERE category_id = {$_GET['cid']}";
      $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
      $row_title = mysqli_fetch_assoc($result_title);
      $page_title = $row_title['category_name'] . " News";
    }else{
      $page_title = "No Post Found";
    }
    break;
  case "author.php":
    if(isset($_GET['aid'])){
      $sql_title = "SELECT * FROM user WHERE user_id = {$_GET['aid']}";
      $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
      $row_title = mysqli_fetch_assoc($result_title);
      $page_title = "News By " .$row_title['first_name'] . " " . $row_title['last_name'];
    }else{
      $page_title = "No Post Found";
    }
    break;
  case "search.php":
    if(isset($_GET['search'])){

      $page_title = $_GET['search'];
    }else{
      $page_title = "No Search Result Found";
    }
    break;
  default :
    $sql_title = "SELECT websitename FROM settings";
    $result_title = mysqli_query($conn,$sql_title) or die("Tile Query Failed");
    $row_title = mysqli_fetch_assoc($result_title);
    $page_title = $row_title['websitename'];
    break;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="header">
    <div class="container">
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
            <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['logo'] == ""){
                      echo '<a href="index.php"><h1>'.$row['websitename'].'</h1></a>';
                    }else{
                      echo '<a href="index.php" id="logo"><img src="shahsawar/images/'. $row['logo'] .'" width="500px;"></a>';
                    }

                  }
                }
                ?>
               
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <?php
                include "config.php";

                if(isset($_GET['cid'])){
                  $cat_id = $_GET['cid'];
                }

                $sql = "SELECT * FROM category WHERE post > 0";
                $result = mysqli_query($conn, $sql) or die("Query Failed. : Category");
                if(mysqli_num_rows($result) > 0){
                  $active = "";
              ?>
               <ul class='menu'>
                  <li><a href='<?php echo $hostname; ?>'>Home</a></li>
                  <?php while($row = mysqli_fetch_assoc($result)) {
                    if(isset($_GET['cid'])){
                      if($row['category_id'] == $cat_id){
                        $active = "active";
                      }else{
                        $active = "";
                      }
                    }
                    echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                  } ?>
                </ul>
                <?php } ?>
            </div>

            <div class="col-md-4">
           
                <button class="btn btn-outline-primary d-inline-flex align-items-center" type="button" style="margin-top:3px;">
                 <a href="shahsawar/index.php" >Sign in</a>
                <svg class="bi ms-1" width="10" height="10"><use xlink:href="#arrow-right-short"/></svg>
                </button>
                <button class="btn btn-outline-secondary d-inline-flex align-items-center" type="button"style="margin-top:3px; margin-left:5px;">
                 <a href="shahsawar/register.php">Sign Up</a>
                <svg class="bi ms-1" width="10" height="10"><use xlink:href="#arrow-right-short"/></svg>
                </button>
  
               
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
