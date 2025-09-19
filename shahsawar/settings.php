<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-12">
                 <h1 class="admin-heading">Website Settings</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                <?php
                  include "config.php";

                  $sql = "SELECT * FROM settings";

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                  <!-- Form -->
               <form  action="save-settings.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="website_name" class="mt-3">Website Name</label>
                          <input type="text" name="website_name" value="<?php echo $row['websitename']; ?>" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="logo" class="mt-3">Website Logo</label>
                          <input type="file" name="logo">
                          <img src="images/<?php echo $row['logo'];?>" height="100px" width="400px">
                          <input type="hidden" name="old_logo" value="<?php echo $row['logo']; ?>" >
                      </div>
                      <div class="form-group">
                          <label for="footer_desc" class="mt-3">Footer Description</label>
                          <textarea name="footer_desc" class="form-control" rows="5" required><?php echo $row['footerdesc']; ?></textarea>
                      </div>
                       <input type="submit" name="submit" class="btn btn-primary mt-4" value="Save" required />
                  </form>
                  <!--/Form -->
                  <?php
                      }
                    }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
