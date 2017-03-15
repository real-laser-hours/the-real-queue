<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
 
<nav class="navbar navbar-default">
  <div class="container-fluid"> 

    
    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">View All Files<span class="sr-only">(current)</span></a></li>
        <li ><a href="form.html">Upload</a></li>   
                <li ><a href="archive.php">Archive</a></li>   
                                        <li class=""><a href="admin.php">Admin</a></li>  


      </ul>
</div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
	
<?php
        error_reporting(0);

	//ob_start();
	
	//HAHAH GOOD LUCK MAINTAINING THIS SPAGHETTI 

	
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