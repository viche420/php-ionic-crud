<?php
include "config.php";
$input = file_get_contents('php://input');
$data = json_decode($input, true);
$message = array();
$year = $data['year'];
$studentOne = $data['studentOne'];
$studentTwo = $data['studentTwo'];
$id = $_GET['id'];
$q = mysqli_query($con, "UPDATE `student` SET (`year`, `studentOne`, `student Two`) 
VALUES ('$year','$studentOne','$studentTwo') WHERE `id` = '{$id}' LIMIT 1");
if ($q) {
    $message['status'] = "Success";
} else {
    http_response_code(422);
    $message['status'] = "Error";
}
echo json_encode($message);
echo mysqli_error($con);