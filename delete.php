


<?php

	ob_start();
$connect = mysqli_connect("localhost", "root", "", "files");
if($_GET['id'] != ""){
$n = $_GET['id'];
$sql = "DELETE FROM mynamachef WHERE nameq='".$n."'";
$query = mysqli_query($connect, $sql);
}

$url = 'queue.php';
while (ob_get_status())
{
 ob_end_clean();
}
header( "Location: $url" );

?>
