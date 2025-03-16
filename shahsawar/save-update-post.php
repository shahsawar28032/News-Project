<?php
include "config.php";

$image_name = isset($_POST['old_image']) ? $_POST['old_image'] : ''; // Default image set

if (!empty($_FILES['new-image']['name'])) {
    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    $extensions = array("jpeg", "jpg", "png");

    if (!in_array($file_ext, $extensions)) {
        die("This extension file is not allowed. Please upload JPG or PNG.");
    }

    if ($file_size > 2097152) {
        die("File size must be 2MB or lower.");
    }

    $new_name = time() . "-" . basename($file_name);
    $target = "upload/" . $new_name;

    if (move_uploaded_file($file_tmp, $target)) {
        $image_name = $new_name; // Image name update only if uploaded successfully
    }
}

// Escape special characters to prevent SQL errors
$title = mysqli_real_escape_string($conn, $_POST["post_title"]);
$description = mysqli_real_escape_string($conn, $_POST["postdesc"]);
$category = (int)$_POST["category"]; // Ensure it's an integer
$post_id = (int)$_POST["post_id"]; // Ensure it's an integer

$sql = "UPDATE post SET 
        title = '$title', 
        description = '$description', 
        category = $category, 
        post_img = '$image_name' 
        WHERE post_id = $post_id";

$result = mysqli_query($conn, $sql);

if ($result) {
    // Update category count if category is changed
    if ($_POST['old_category'] != $_POST["category"]) {
        $sql1 = "UPDATE category SET post = post - 1 WHERE category_id = {$_POST['old_category']}";
        $sql2 = "UPDATE category SET post = post + 1 WHERE category_id = $category";

        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
    }
    header("Location: {$hostname}/shahsawar/post.php?upm=Successfully Updated Post");
} else {
    echo "Query Failed: " . mysqli_error($conn);
}
?>