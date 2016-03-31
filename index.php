<?php
header('Content-type: application/json');
include "../includes/db-connection.php";

$status = "";
$data   = "";
$url    = parse_url($_SERVER['REQUEST_URI'])['path'];
$parts  = explode('/', $url);
//url is http://site.com/api/a/b/c/d so basically it gets /api/a/b/c/d part first and then split it into array by '/'
//Below we set the routes and include the result from backend to the index file.
if ($parts[2] == "Chats") {
    //if the call is to /api/Chats/Get
    if ($parts[3] == "Get") {
        //if the call is to /api/Chats/Get/:memberName
        if ($parts[4] !== "All") {
            $member     = $parts[4];
            $memberOnly = true;
        }
        include 'chats/read.php';
    }
    //if the call is to /api/Chats/Send
    if ($parts[3] == "Send") {
        $username = $parts[4];
        $message  = $parts[5];
        include 'chats/create.php';
    }
    //if the call is to /api/Chats/Delete
    if ($parts[3] == "Delete") {
        $messageId = $parts[4];
        include 'chats/delete.php';
    }
}
//As we use the $status and $data globally over the api, I think it's best to just keep this line here instead of having it individually in each backend file.
echo json_encode(array("status" => $status, "data" => $data));
