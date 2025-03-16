<?php
  include "config.php";
  if(!isset($_SESSION["username"])){
    header("Location: {$hostname}/shahsawar/");
}
?>
<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright 2025 News | Powered by <a href="#">Shahsawar khan</a></span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
</html>
