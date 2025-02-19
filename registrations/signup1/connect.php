<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'signupforms';


$conn= mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);            //conection

if(!$conn){
    die(mysqli_error($conn));
    // die("Could not connect");
}

?>
