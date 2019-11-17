<?php
include 'inc/db.php';
include 'inc/session.php';


// get values
if(isset($_POST['skol'])){
$skol = $_POST['skol'];
}
if(isset($_POST['lichess'])){
$lichess = $_POST['lichess'];
}
// prevent injections

$skol = stripcslashes($skol);
$lichess = stripcslashes($lichess);

$skol = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $skol);
$lichess = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $lichess);


mysqli_query($conn, "INSERT INTO members (`skol_alias`, `lichess_alias`)
                     VALUES ('$skol', '$lichess')") or die(mysqli_error($conn));
header('Location: members.php');


?>
