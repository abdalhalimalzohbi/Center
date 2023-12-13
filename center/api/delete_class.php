<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the required data is provided in the GET request
    include_once("../connection/connect.php");

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (mysqli_connect_errno()) {
            $response = array('status' => 'error', 'message' => 'Could not connect to the database: ' . mysqli_connect_error());
        } else {

            $update_query = "delete from classes where id=" . $id;


            if (mysqli_query($connexion, $detete_query)) {
                $response = array('status' => 'success', 'message' => 'Data inserted successfully.');
            } else {
                $response = array('status' => 'error', 'message' => 'Error: ' . mysqli_error($connexion));
            }

            // Close the database connection
            mysqli_close($connexion);
        }
    } else {
        // Required data not provided in the GET request
        $response = array('status' => 'error', 'message' => 'Name must be provided in the GET request.');
    }
} else {
    // Invalid request method
    $response = array('status' => 'error', 'message' => 'Only GET requests are allowed.');
}


// Convert the response array to JSON format and send it
header('Content-Type: application/json');
echo json_encode($response);
