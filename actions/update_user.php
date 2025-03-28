<?php
include 'initiate.php';
$data = $fileGetContent->get_content();

$userId = intval($data['id']);
$field = $data['field'];
$value = $data['value'];

// Sanitize field names to prevent SQL injection
$allowedFields = ["name", "email", "phone", "status", "upline", "date_joined"];
if (!in_array($field, $allowedFields)) {
    $response =["success" => false, "message" => "Invalid field"];
    exit;
}

// Update query
$update = $query->update('users', [$field => $value], ['userID' => $userId]);

$response = ["success" => true, "message" => 'updated succefully'];

$fileGetContent->send_content($response);