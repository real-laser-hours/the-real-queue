<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
	<a href="index.php">home</a>
<?php
        error_reporting(0);

	//ob_start();
	
	//go ahead, upload what you want you 1337 haxor you
	//just kidding, dont do anything
	//please

	
$ftp_server = "localhost";
$ftp_user_name = "test";
$ftp_user_pass = "";
$destination_file = "/ftp". $_FILES["file"]["name"]; 
$source_file = $_FILES["file"]["tmp_name"]; 
$fileInfo = pathinfo($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"],
    "ftp/" . $_REQUEST['name'] . '-' . $_FILES["file"]["name"]);

$conn_id = ftp_connect($ftp_server) or die("Can't connect to server");


$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 


if ((!$conn_id) || (!$login_result)) { 
    echo "FTP connection has failed!";
    echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
	echo "god knows what you did but email quinn@prtzl.net"; 
    exit; 
} else {
}

ftp_pasv($conn_id, true);


if ($_FILES["file"]["error"] > 0)
    {
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }



// it literally always throws that it didnt upload the file, yet it's always there. I think it's because I move the file to re-name it.
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 


ftp_close($conn_id);
	
	
	
	
	
	
	
	//i mean if you are tech savvy enough to go here, im assuming you are smart enough to know that i log all actions
$link = mysqli_connect("localhost", "root", "", "files");
 
if($link === false){
    die("ERROR: email quinn@prtzl.net with the following: " . mysqli_connect_error());
}

$path = "ftp/"; 
$latest_ctime = 0;
$latest_filename = '';    

	
	// i c&p most of the below from stack overflow, not gonna lie
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
} else{
    echo "email quinn@prtzl.net with the following: $sql. " . mysqli_error($link);
}
 

mysqli_close($link);

	
	if($material=="Thin Wood"){
		echo"<p>Uploaded as: $latest_filename</p>";
		echo"<p>use 12 speed and 55 power</p>";
	}
	elseif($material=="Thick Wood"){
		echo"<p>Uploaded as: $latest_filename</p>";
		echo"<p>use 7 speed and 55 power</p>";
	}
	elseif($material=="Cardboard"){
		echo"<p>Uploaded as: $latest_filename</p>";
		echo"<p>use 35 speed and 45 power</p>";
	}
	elseif($material=="Paper"){
		echo"<p>Uploaded as: $latest_filename</p>";
		echo"<p>use 20 speed and 10 power</p>";
	}
	elseif($material=="Acrylic"){
		echo"<p>Uploaded as: $latest_filename</p>";
		echo"<p>use 15 speed and 50 power</p>";
	}
	else{
		echo"<p>what</p>";
	}
		   
	


	
	
	
	
//	$url = 'http://localhost/index.php'; 
//	while (ob_get_status()) 
//{
//   ob_end_clean();
//}
//	header( "Location: $url" );
	
?>

</body>
</html>