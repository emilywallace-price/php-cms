<?php

    $connection = @mysqli_connect ('localhost', 'root', '', 'crm');
    if (!$connection) {
        die ('Could not connect to Mysql database: ' . mysqli_connect_error() );
    }