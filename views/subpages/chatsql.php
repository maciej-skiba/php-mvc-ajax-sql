<?php
    
    $db = new SQLite3('../../models/database.db');
    if(!$db) echo("<script> alert('123'); </script>");
    $message = isset($_POST['message']) ? $_POST['message'] : null;
    echo("<h1>$message</h1>")
    date_default_timezone_set("Europe/Warsaw");
    if(!empty($message) && !empty($user)){
        $time=time();
        $query = "INSERT INTO chat(`message`, `from`, `created`)  VALUES ('$message', '$user', '$time')";
        $queryid = $db->query($query);
    }
    
?>
