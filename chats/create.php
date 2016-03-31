<?php
//Make sure we have both the username and message
if (!empty($message) && !empty($username)) {
    //Sanitzation
    $message  = trim(preg_replace('/\s/', " ", htmlentities($message)));
    //Prepare the query
    $sendMessage = $dbh->prepare("INSERT INTO chatMessages (message, sender)
            VALUES (?, ?)");
    //Try running the Query and set status as required
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
