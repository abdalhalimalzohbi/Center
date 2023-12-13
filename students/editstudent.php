
<?php
$id=$_GET["id"];
include_once("connection/connect.php");
$select_query = "SELECT * FROM students where id=".$id; 
$result = mysqli_query($connexion, $select_query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC)

?>



<form method="POST" role="form" action="./index.php?page=updatestudent&id=<?php echo $id; ?>" enctype="multipart/form-data">
    <!--<input type="hidden" name="id" value="<?php echo $id; ?>"/>-->
        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" value="<?php echo $row['fullname']; ?>"/>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input name="Phone" class="form-control" value="<?php echo $row['phone']; ?>"/>
        </div>
        <div class="form-group">
            <label>Email </label>
            <input name="Email" class="form-control" value="<?php echo $row['email']; ?>"/>
        </div>
        <div class="form-group">
            <label>Educ_level </label>
            <input name="educ_level" class="form-control" value="<?php echo $row['educ_level']; ?>"/>
        </div>
        <div class="form-group">
            <label>Age </label>
            <input name="Age" class="form-control" value="<?php echo $row['age']; ?>"/>
            <div class="form-group">
            <label>picture </label>
            <input name="picture" type="file" class="form-control" >
        </div>
    
        <div class="form-group">
            <label>Address </label>
            <input name="Address" class="form-control" value="<?php echo $row['address']; ?>"></input>
        </div>
        <div class="form-group">          
            <button name="submit" type="submit" class="btn btn-primary form-control">save</button>
        </div>
    </form>




