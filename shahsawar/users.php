<?php include "header.php";
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
          
                  <h1 class="admin-heading">All Users</h1>
                  </div>
                  <!-- show button for admin  -->
            <?php  
            if ($_SESSION["user_role"] == '1') { ?>
                      <div class="col-md-2">
                     <a class="add-new" href="add-user.php">Add User</a>
                  </div>

                 <!-- show button for normal user -->
                     <?php
                     } else { ?>
                    <div class="col-md-2">
                      <a  class="add-new" href="#" onclick="message()">Add User</a>
                      </div>
      
                    <script>
                    function message() {
                    alert("You are a normal user, you can't add user, only add post ");
                      }
                    </script>
                    <?php  
                    } ?>



          
              <div class="col-md-12">

               <!-- ---------alert massages------------- -->
                <!-- user update massage -->
                <?php  if(isset($_GET['uum'])){ ?>
                  <div class="alert alert-success">
                    <?php echo $_GET['uum']; ?>
                   </div>
                  <?php } ?>
                

                    <!-- user add massage -->
                <?php  if(isset($_GET['aum'])){ ?>
                  <div class="alert alert-success mt-5">
                    <?php echo $_GET['aum']; ?>
                   </div>
                  <?php } ?>

                    <!-- user delete massage -->
                <?php  if(isset($_GET['dum'])){ ?>
                  <div class="alert alert-danger">
                    <?php echo $_GET['dum']; ?>
                   </div>
                  <?php } ?>

                <?php
                  include "config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 3;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                  /* select query of user table with offset and limit */
                  if($_SESSION["user_role"] == '1'){
                  $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";
                }elseif($_SESSION["user_role"]=="0"){
                  $sql = "SELECT * FROM user WHERE user_id = {$_SESSION['user_id']} LIMIT {$offset},{$limit}";
                }
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                     

                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $row['user_id'];?> </td>
                              <td><?php echo $row['first_name'] . " ". $row['last_name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php
                                  if($row['role'] == 1){
                                    echo "Admin";
                                  }else{
                                    echo "Normal";
                                  }
                               ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>' onclick="return confirm('Do you really want to delete this record where ID = <?php echo $row['user_id']; ?>  ')"><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
                // show pagination
                if($_SESSION['user_role']== '1'){
                $sql1 = "SELECT * FROM user";
                }elseif($_SESSION['user_role']== '0'){
                  $sql1 = "SELECT * FROM user where  user_id = {$_SESSION['user_id']}";
                }
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="users.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="users.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
