<?php
session_start();
require "../config/connect.php";

$folder = "images/blogs";
if(isset($_POST['simpan'])){

    $profile_id = $_POST['profile_id'];
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date_created = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');
    $category_blog = $_POST['category_blog'];

    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];

    if($imageType == "image/jpg" || $imageType == "image/png" || $imageType == "image/jpeg"){
        $image = $folder . basename($imageName);
        if(move_uploaded_file($_FILES['image']['tmp_name'], $image)){
            $sql = $mysqli->query("INSERT INTO jtl_blogs (title, content, image, date_created, date_updated, category_blog, user_id, profile_id) VALUES
                ('$title','$content','$image','$date_created','$date_updated','$category_blog','$user_id','$profile_id')");
            if($sql){
                header("Location: blogs_list.php");
            }else{
                echo $mysqli->errno;
            }
        }else{
            echo "gagal upload";
        }
    }else{
        echo "type image salah";
    }
}