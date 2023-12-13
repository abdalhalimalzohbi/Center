<?php
include_once("connection/connect.php");
if(isset($_POST["submit"])){
    $id= $_GET["id"];

    $name= $_POST["name"];
    $phone= $_POST["Phone"];
    $email= $_POST["Email"];
    $educ_level= $_POST["educ_level"];
    $age= $_POST["Age"];
    //$id= $_POST["Id"];
    $address= $_POST["Address"];

$insert_query="update students set fullname='".$name."',phone=".$phone.",
Email='".$email."',educ_level='".$educ_level."',age=".$age.",address='".$address."',pic='".$targetFile."' where id=".$id ;

echo $insert_query;
 $result = mysqli_query($connexion, $insert_query);


 if($result){
    echo "data inserted successfully";
    header('location:./index.php?page=students');

 }

// echo $insert_query;

}




?>