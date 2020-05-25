<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DBNAME', 'mural-si');

    $conn = new PDO('mysql:host=' . HOST . ';dbname='.DBNAME.';', USER , PASS);
?>