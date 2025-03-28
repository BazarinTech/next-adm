<?php
include 'initiate.php';
$data = $fileGetContent->get_content();

$id = intval($data['id']);
$table = $data['table'];

// Update query
if ($table == 'users') {
    $user = $query->select('users', '*', ['userID' => $id]);

    $email = $user[0]['email'];

    $delete = $query->delete('wallets', ['email' => $email]);

    $delete = $query->delete($table, ['userID' => $id]);

}else{
    $delete = $query->delete($table, ['ID' => $id]);
}


$response = ["success" => true, "message" => 'Deleted succefully'];

$fileGetContent->send_content($response);