<?php


$db = new SQLite3('database.db');



$insertsql = 'DROP TABLE chat
            ';

$db->query($insertsql);
?>