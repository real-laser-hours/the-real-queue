<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>IF YOU CAN READ THIS ITS TOO LATE</title>
</head>

<body>

<?php
	ob_start();
$ftp_server = "localhost";
$ftp_user_name = "test";
$ftp_user_pass = "";
$destination_file = "/ftp". $_FILES["file"]["name"]; 
$source_file = $_FILES["file"]["tmp_name"]; 
$fileInfo = pathinfo($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"],
    "ftp/" . uniqid() . '.' . $fileInfo['extension']);

$conn_id = ftp_connect($ftp_server) or die("Can't connect to server");


$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 


if ((!$conn_id) || (!$login_result)) { 
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
    exit; 
} else {
    echo "Connected to $ftp_server, for user $ftp_user_name";
}

ftp_pasv($conn_id, true);


if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
else
    {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Stored in: " . $_FILES["file"]["tmp_name"]. "<br>";
		

    }



$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 


if (!$upload) { 
echo "FTP upload has failed!";
} else {
echo "Uploaded $source_file to $ftp_server as $destination_file";
}

ftp_close($conn_id);


	
	
	
	

	//i mean if you are tech savvy enough to go here, im assuming you are smart enough to know that i log all actions
$link = mysqli_connect("localhost", "root", "", "files");
 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$path = "ftp/"; 
$latest_ctime = 0;
$latest_filename = '';    

$d = dir($path);
while (false !== ($entry = $d->read())) {
  $filepath = "{$path}/{$entry}";
  if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
    $latest_ctime = filectime($filepath);
    $latest_filename = $entry;
  }
}	
	
	
$UUID = $latest_filename;
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$rad = $_POST['eng'];
$material = $_POST['material'];

$sql = "INSERT INTO current (UUID, NAME, CUT, MATERIAL) VALUES ('$UUID', '$name', '$rad', '$material')";
	
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);

	
	
	
	
	$url = 'http://localhost/index.php'; 
	while (ob_get_status()) 
{
    ob_end_clean();
}
	header( "Location: $url" );
	
?>

</body>
</html>