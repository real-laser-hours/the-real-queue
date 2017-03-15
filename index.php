<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap - Prebuilt Layout</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<html>
  <body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 

    
    <div class="collapse navbar-collapse" id="myDefaultNavbar1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">View All Files<span class="sr-only">(current)</span></a></li>
        <li ><a href="form.html">Upload</a></li>
        <li ><a href="archive.php">Archive</a></li>  
                                <li class=""><a href="admin.php">Admin</a></li>  
 
      </ul>
</div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
    
    <div class="container">
      <h1>&nbsp;</h1>
      <div class="row">
<div class="col-md-8 col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Files list (WARNING: /old/ is not formatted. Use at own risk. Click a file to download)</div>
        <div class="panel-body">
          <div class="files-list">
<div class="file"> 
       <ul> 
<?php 
		   $dir = opendir('ftp/'); 
echo '<ul>';
while ($read = readdir($dir)) 
{

if ($read!='.' && $read!='..') 
{ 
echo '<li><a href="ftp/'.$read.'">'.$read.'</a></li>'; 
}

}

echo '</ul>';

closedir($dir); 
	?>

</ul> 
         
         
         </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>



<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
