<?php
include("./db_connection.php");

if(isset($_POST['submit'])){
    $photo=$_FILES['photo'];
    $photo_name =$photo['name'];
    $photo_tmp_name =$photo['tmp_name'];
    $photo_size =$photo['size'];
    $photo_type =$photo['type'];
if($photo_type =='imge/jpeg' || $photo_type='imge/png' || $photo_type='imge/gif'){
    
    $upload_dir='uploads/';
    $photo_path=$upload_dir.$photo_name;
    move_uploaded_file($photo_tmp_name,$photo_path);

    $sql=" INSERT INTO photos ( photo_name , photo_path)
VALUES ('$photo_name', '$photo_path') ";
$conn->query($sql);
}

 echo " photo uploaded successfuly";
}
else{
    echo "  there is no photos ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

    <label for="file">choose your file:</label>
    <input type="file" name="photo" id="file">
    <button type="submit" name="submit">Upload Photo</button>
</form>
</body>
</html>