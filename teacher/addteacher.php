
<form method="POST" role="form" action="./index.php?page=savestudent" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input name="phone" class="form-control"/>
        </div>
        <div class="form-group">
            <label>Email </label>
            <input name="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label>specialization </label>
            <input name="spec" class="form-control"/>
        </div>
        <div class="form-group">
            <label>salary </label>
            <input name="salary" class="form-control"/>
    
        <div class="form-group">
            <label>Address </label>
            <input name="address" class="form-control"></input>
        </div>
        <div class="form-group">          
            <button name="submit" type="submit" class="btn btn-primary form-control">save</button>
        </div>
    </form>
    <?php
include_once("connection/connect.php");

if(isset($_POST["submit"])){

$name= $_POST["name"];
$phone= $_POST["phone"];
$email= $_POST["email"];
$salary= $_POST["salary"];
$speciliazation= $_POST["spec"];
$address= $_POST["address"];
$user_id=$_SESSION["session_user_id"];

$insert_query="insert into teachers(fullname,phone,email,address,spec,salary)
 values('".$name."',".$phone.",'".$email."','".$address."',".$speciliazation.",'".$address."',')";
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