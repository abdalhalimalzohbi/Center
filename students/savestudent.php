<?php
include_once("connection/connect.php");

if(isset($_POST["submit"])){

$name= $_POST["name"];
$phone= $_POST["Phone"];
$email= $_POST["Email"];
$educ_level= $_POST["educ_level"];
$age= $_POST["Age"];
//$id= $_POST["Id"];
$address= $_POST["Address"];
$user_id=$_SESSION["session_user_id"];

///////// file upload area 
// here we get from form and save to file storage before database

$targetDirectory = "images/students/";
$targetFile = $targetDirectory . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 1;
}

// Check file size (optional)
if ($_FILES["pic"]["size"] > 50000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats (optional)
if ($fileType !== "jpg" && $fileType !== "png" && $fileType !== "jpeg" && $fileType !== "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// echo $targetFile;
if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
   return;
} else {
   // If everything is ok, try to upload file
   if (move_uploaded_file($_FILES["pic"]["tmp_name"], $targetFile)) {
       echo "The file " . basename($_FILES["pic"]["name"]) . " has been uploaded.";
   } else {
       echo "Sorry, there was an error uploading your file.";
   }
}


///////// file upload area

$insert_query="insert into students(fullname,phone,email,educ_level,age,address,pic,createdby)
 values('".$name."',".$phone.",'".$email."','".$educ_level."',".$age.",'".$address."','".$targetFile."',".$user_id." )";
 $result = mysqli_query($connexion, $insert_query);


 if($result){
    echo "data inserted successfully";
    header('location:index.php?page=student');

 }else{
    echo mysqli_error($connexion)."</br>";

    echo $insert_query;
 }

// echo $insert_query;

}else{
    echo 'wwww';
}




?>