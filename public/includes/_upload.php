<?php
$target_dir = "uploads/";
$extention = explode(".", basename($_FILES["imgSrc"]["name"]));
$extention = end($extention);
$file_name = uniqid() . "." . $extention;
$target_file = $target_dir . $file_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check to see if image file is an actual image or fake image
if (isset($_POST['value'])){
    $check = getimagesize($_FILES["imgSrc"]["tmp_name"]);
    if($check !== false){
        $uploadOk = 1;
    }else{

        $uploadOk = 1;
    }
}


//Check file size
if($_FILES["imgSrc"]["size"] > 2000000){

    $uploadOk = 0;
}

//Limit file type
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){

    $uploadOk = 0;
}


//Check if $uploadOk has set to 0 by an error
if($uploadOk == 0 || $uploadOk == 2){

//else try to upload file
}else{
    if(!move_uploaded_file($_FILES["imgSrc"]["tmp_name"], $target_file)){  
        echo "Sorry, there was en error uploading your file";
    }
}