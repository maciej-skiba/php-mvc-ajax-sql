<?php


$db = new SQLite3('database.db');



$insertsql = 'INSERT INTO chat(`message`, `from`, `created`) VALUES ("hello", "itsme", "mario");
            ';

$db->query($insertsql);
?>