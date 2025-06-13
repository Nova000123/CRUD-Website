<?php

    include 'credential.php';
    
    //make a databade connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    // select all records from our table
    $records = $connection->prepare('select * from scp');
    $records->execute();
    $result = $records->get_result();
?>