<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title></title>

</head>
<body>
<head>
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
	  <a href="index.php"><div class="col-xs-4 menu-text">Home</div></a>
	
	  <a href="form.html"><div class="col-xs-4 menu-text">Send to Laser</div></a>
	  <!-- coming soon boiiis -->
	  <a href="archive.php"><div class="col-xs-4 menu-text">Archive</div></a>
  </div>
  </nav>
  
  
  

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <table class="table table-bordered table-hover dt-responsive">
        <caption class="text-center">&nbsp;
       
        </caption>
        <thead>
          <tr>
            <th>File (click to download)</th>
            <th>$speed</th>
            <th>$power</th>
        
            <th>$timest</th>
          </tr>
        </thead>
        <tbody>
         <?php 

		   $dir = opendir('ftp/'); 

while ($read = readdir($dir)) {
	echo '<tr>';
if ($read!='.' && $read!='..' && $read!='old') { 
echo '<td><a href="ftp/'.$read.'">'.$read.'</a></td>';
	echo '</tr>';
}
}

closedir($dir); 
	?>
          

          
        </tbody>
        <tfoot>
          <tr> </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
</body>
</html>
