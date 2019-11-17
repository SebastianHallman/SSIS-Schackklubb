<?php
include 'inc/db.php';
include 'inc/session.php';


// get values
if(isset($_POST['namn'])){
$namn = $_POST['namn'];
}
if(isset($_POST['format'])){
$format = $_POST['format'];
}
if(isset($_POST['start'])){
$start = $_POST['start'];
}
if(isset($_POST['losenord'])){
$losenord = $_POST['losenord'];
}
if(isset($_POST['url'])){
$url = $_POST['url'];
}

$url = urlencode($url);
// prevent injections

$namn = stripcslashes($namn);
$format = stripcslashes($format);
$start = stripcslashes($start);
$losenord = stripcslashes($losenord);
$url = stripcslashes($url);




$namn = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $namn);
$format = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $format);
$start = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $start);
$losenord = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $losenord);
$url = mysqli_real_escape_string(mysqli_connect($host, $user, $password, $database), $url);


mysqli_query($conn, "INSERT INTO tournaments (namn, format, start, losenord, url)
                     VALUES ('$namn', '$format', '$start', '$losenord', '$url')") or die(mysqli_error($conn));
header('Location: tournaments.php');



?>
