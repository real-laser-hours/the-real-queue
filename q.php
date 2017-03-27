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
	  <a href="archive.php"><div class="col-xs-4 menu-text">Archive</div></a>
  </div>
  </nav>



<?php
        error_reporting(0);

	ob_start();

	//security flaw #4,332,532
$link = mysqli_connect("localhost", "root", "", "files");

if($link === false){
    die("ERROR: email quinn@prtzl.net with the following: " . mysqli_connect_error());
}

//TODO: set it so that if their name is already in mynamachef it denies
$nameq = mysqli_real_escape_string($link, $_REQUEST['nameq']);

if (!empty($nameq)){
	$sql = "INSERT INTO mynamachef (nameq, find) VALUES ('$nameq', '0')";
}
	else{
			$url = 'error.html';
	while (ob_get_status())
{
   ob_end_clean();
}
	header( "Location: $url" );
	}

if(mysqli_query($link, $sql)){
} else{
    echo "email quinn@prtzl.net with the following: $sql. " . mysqli_error($link);
}

mysqli_close($link);
?>
	<?php

	$url = 'queue.php';
	while (ob_get_status())
{
   ob_end_clean();
}
	header( "Location: $url" );

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
