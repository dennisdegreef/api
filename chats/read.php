<?php
//Make sure we get :memberName or All in our call
if (!empty($parts[4])) {
    //if the call is for All
    if (!$memberOnly) {
        //We need all results and all columns here
        $getMessages = $dbh->prepare("SELECT * FROM chatMessages ORDER BY sentTime DESC LIMIT 50");
        //Try running query and set variables as required
        if ($getMessages->execute()) {
            $rows   = $getMessages->fetchAll(PDO::FETCH_ASSOC);
            $status = "success";
            $data   = $rows;
        } else {
            $status = "error";
            $data   = "Query error";
        }
    }
    //if the call is for memberName
    else {
        //We need results for provided memberName and all columns here
        $getMessages = $dbh->prepare("SELECT * FROM chatMessages WHERE sender = ? ORDER BY sentTime DESC LIMIT 50");
        //Try running query and set variables as required
        if ($getMessages->execute(array($member))) {
            $rows   = $getMessages->fetchAll(PDO::FETCH_ASSOC);
            $status = "success";
            $data   = $rows;
        } else {
            $status = "error";
            $data   = "Query error";
        }
    }
} else {
    $status = "error";
    $data   = "Missing parameters";
}
