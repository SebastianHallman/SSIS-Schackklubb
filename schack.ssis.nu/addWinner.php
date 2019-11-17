<?php
include 'inc/db.php';
include 'inc/session.php';


// get values
if(isset($_POST['skol'])){
$skol = $_POST['skol'];
}
if(isset($_POST['turnering'])){
$turnering = $_POST['turnering'];
}
// prevent injections

$skol = stripcslashes($skol);
$turnering = stripcslashes($turnering);

$skol = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $skol);
$turnering = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $turnering);


mysqli_query($conn, "UPDATE tournaments SET vinnare = '$skol' WHERE namn = '$turnering'") or die(mysqli_error($conn));
header('Location: tournaments.php');


?>
