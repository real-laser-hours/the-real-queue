<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
	<p> it will throw an error, ignore it just this once </p>
<?php
  $files = scandir("ftp/");
  $oldfolder = "ftp/";
  $newfolder = "ftp/old/";
  foreach($files as $fname) {
      if($fname != '.' && $fname != '..') {
          rename($oldfolder.$fname, $newfolder.$fname);
      }
  }
?>
<body>
</body>
</html>