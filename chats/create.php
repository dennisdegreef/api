<?php

if (!empty($message) && !empty($username)) {
    $message  = trim(preg_replace('/\s/', " ", htmlentities($message)));

    $sendMessage = $dbh->prepare("INSERT INTO chatMessages (message, sender)
            VALUES (?, ?)");

    if ($sendMessage->execute(array($message, $username))) {
        $status = "success";
        $data   = "Message sent";
    } else {
        $status = "error";
        $data   = "Query error";
    }

} else {
    $status = "error";
    $data   = "Missing parameters";
}
