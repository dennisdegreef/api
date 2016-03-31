<?php
header('Content-type: application/json');
include "../includes/db-connection.php";

$status = "";
$data   = "";
$url    = parse_url($_SERVER['REQUEST_URI'])['path'];
$parts  = explode('/', $url);

if ($parts[2] == "Chats") {
    if ($parts[3] == "Get") {
        if ($parts[4] !== "All") {
            $member     = $parts[4];
            $memberOnly = true;
        }
        include 'chats/read.php';
    }
    if ($parts[3] == "Send") {
        $username = $parts[4];
        $message  = $parts[5];
        include 'chats/create.php';
    }
    if ($parts[3] == "Delete") {
        $messageId = $parts[4];
        include 'chats/delete.php';
    }
}

echo json_encode(array("status" => $status, "data" => $data));