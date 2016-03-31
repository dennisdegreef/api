<?php

if (!empty($messageId)) {
    $id = $_POST['messageId'];

    $delMessage = $dbh->prepare("DELETE FROM chatMessages WHERE id=?");

    if ($delMessage->execute(array($id))) {
        $status = "success";
        $data   = "Message deleted";
    } else {
        $status = "error";
        $data   = "Query error";
    }

} else {
    $status = "error";
    $data   = "Missing parameters";
}
