<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the required data is provided in the POST request
    include_once("../connection/connect.php");
 
 
        

        $id = $_POST['id'];
        $code= $_POST['name'];
        $capacity = $_POST['capacity'];
        

        if (mysqli_connect_errno()) {
            $response = array('status' => 'error', 'message' => 'Could not connect to the database: ' . mysqli_connect_error());
        } else {

            $update_query="update classes set code='".$code."',capacity=".$capacity." where id=".$id ;
            

            
            if (mysqli_query($connexion, $update_query)) {
                $response = array('status' => 'success', 'message' => 'Data inserted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Error: ' . mysqli_error($connexion));
            }

            // Close the database connection
            mysqli_close($connexion);
        }
    } else {
        // Required data not provided in the POST request
        $response = array('status' => 'error', 'message' => 'Name must be provided in the POST request.');
    }



// Convert the response array to JSON format and send it
header('Content-Type: application/json');
echo json_encode($response);
?>