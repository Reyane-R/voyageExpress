<?php
    $host = '10.40.128.23';
    $port = '5432';
    $database = 'db2019l3i_rremache';
    $user = 'y2019l3i_rremache';
    $password = 'A123456*';
    $connectString = 'host=' . $host . ' port=' . $port . ' dbname=' . $database .
        ' user=' . $user . ' password=' . $password;
    $link = pg_connect($connectString);
    if (!$link){
        die('Error: Could not connect: ' . pg_last_error());
    } 
    ?>