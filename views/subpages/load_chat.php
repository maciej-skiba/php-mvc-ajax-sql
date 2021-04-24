<?php
    
    $db = new SQLite3('../../models/database.db');

    $query = "SELECT * FROM chat ORDER BY id ASC";
    $queryid = $db->query($query);

    while ($row = $queryid->fetchArray(SQLITE3_ASSOC)) {
        echo('<p><strong>'.$row["from"].'</strong>: '.$row["message"].'</p>');
    }
?>
