<?php
    $host = "localhost";
    $user = "chatuser";
    $pass = "dd0426";
    $db_name = "chardb";
    $con = new mysqli($host, $user, $pass, $db_name);
    function formatDate($date){
        return date('g:i a', strtotime($date));
    }
?>