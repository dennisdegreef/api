<?php

if (!empty($parts[4])) {
    if (!$memberOnly) {
        $getMessages = $dbh->prepare("SELECT * FROM chatMessages ORDER BY sentTime DESC LIMIT 50");
        if ($getMessages->execute()) {
            $rows   = $getMessages->fetchAll(PDO::FETCH_ASSOC);
            $status = "success";
            $data   = $rows;
        } else {
            $status = "error";
            $data   = "Query error";
        }
    } else {
        $getMessages = $dbh->prepare("SELECT * FROM chatMessages WHERE sender = ? ORDER BY sentTime DESC LIMIT 50");
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
