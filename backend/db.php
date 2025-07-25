<?php
    $connection = new mysqli("localhost", "root", "", "campusconnect");
    if ($connection -> connect_error){
        die ("Connection failed: " . $connection-> connect_error);
    }
?>