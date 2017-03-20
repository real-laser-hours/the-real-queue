<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="css/bg.css" rel="stylesheet" type="text/css">
</head>

<body>
 
<link href="css/bg.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   <nav class="navbar navbar-default main-navbar">
    <span class="col-xs-10 col-md-3 menu-item menu-header">All Saints Academy</span>
  
  <div class="menu-item hidden-xs hidden-sm col-md-6 md-menu-items">
	  <a href="index.php"> <div class="col-xs-4 menu-text">Home</div></a>
	
	  <a href="form.php"><div class="col-xs-4 menu-text">Send to Laser</div></a>
	  <!-- coming soon boiiis -->
	  <a href="archive.php"><div class="col-xs-4 menu-text">Archive</div></a>
  </div>
  </nav>
  
  
	
<?php
        error_reporting(0);

	//ob_start();
	
	//HAHAH GOOD LUCK MAINTAINING THIS SPAGHETTI 

	

$ftp_server = "localhost";
$ftp_user_name = "test";
$ftp_user_pass = "";
//this is probably redundant, but i'm do scared to change it
$destination_file = "/ftp". $_FILES["file"]["name"]; 
$source_file = $_FILES["file"]["tmp_name"]; 
$fileInfo = pathinfo($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"],
    "ftp/" . $_REQUEST['name'] . '-' . $_FILES["file"]["name"]);

$conn_id = ftp_connect($ftp_server) or die("Can't connect to server");
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 


if ((!$conn_id) || (!$login_result)) { 
    echo "Attempted to connect to $ftp_server for user $ftp_user_name but it failed"; 
	echo "god knows what you did but email quinn@prtzl.net"; 
    exit; 
}
	
ftp_pasv($conn_id, true);
if ($_FILES["file"]["error"] > 0){
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }


// it literally always throws that it didnt upload the file, yet it's always there. I think it's because I move the file to re-name it.
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY); 


ftp_close($conn_id);
	
	//security flaw #1,923,481
$link = mysqli_connect("localhost", "root", "", "files");
 
if($link === false){
    die("ERROR: email quinn@prtzl.net with the following: " . mysqli_connect_error());
}

$path = "ftp/"; 
$latest_ctime = 0;
$latest_filename = '';    

	
	// this is like linux, but the penguin is on fire, and has cancer
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
?>

  <div class="container">
      <h1>&nbsp;</h1>
      <div class="row">
<div class="col-md-8 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Keep this in mind! There is no way to access this page later* (*this is coming soon)</div>
        <div class="panel-body">
          <div class="files-list">
<div class="file"> 
<center>
	<?php	
	if($material=="Thin Wood"){
		echo"<p>Uploaded as: <b>$latest_filename</b></p>";
		echo"<p>use <b>12 speed</b> and <b>55 power</b></p>";
	}
	elseif($material=="Thick Wood"){
		echo"<p>Uploaded as: <b>$latest_filename</b></p>";
		echo"<p>use <b>7 speed</b> and <b>55 power</b></p>";
	}
	elseif($material=="Cardboard"){
		echo"<p>Uploaded as: <b>$latest_filename</b></p>";
		echo"<p>use <b>35 speed</b> and <b>45 power</b></p>";
	}
	elseif($material=="Paper"){
		echo"<p>Uploaded as: <b>$latest_filename</b></p>";
		echo"<p>use <b>20 speed</b> and <b>10 power</b></p>";
	}
	elseif($material=="Acrylic"){
		echo"<p>Uploaded as: <b>$latest_filename</b></p>";
		echo"<p>use <b>15</b> speed and <b>50 power</b></p>";
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

	</center>
			  </div>
			</div>
		  </div>
	</div>
		  </div>
	  </div>
	</div>

</body>
</html>