<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    include_once("../connection/connect.php");
    $id = $_GET['id'];

    if (mysqli_connect_errno()) {
        $response = array('status' => 'error', 'message' => 'Could not connect to the database: ' . mysqli_connect_error());
    } else {
        $select_query = "select * from classes where id=" . $id;
        $result = mysqli_query($connexion, $select_query);
        if ($result) {

            $class = array();
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $class["id"] = $row["id"];
            $class["code"] = $row["code"];
            $class["cap"] = $row["capacity"];









            $response = array('status' => 'success', 'message' => 'Data inserted successfully.', 'class' => $class);
        } else {
            $response = array('status' => 'error', 'message' => 'Error: ' . mysqli_error($connexion));
        }

        mysqli_close($connexion);
    }
} else {
    $response = array('status' => 'error', 'message' => 'Only POST requests are allowed.');
}


// Convert the response array to JSON format and send it
header('Content-Type: application/json');
echo json_encode($response);
