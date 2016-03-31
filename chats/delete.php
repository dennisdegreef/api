<?php
//Make sure we have the messageId
if (!empty($messageId)) {
    //Set Query
    $id = $_POST['messageId'];
    $delMessage = $dbh->prepare("DELETE FROM chatMessages WHERE id=?");
    //Try running the query and set status as required
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
