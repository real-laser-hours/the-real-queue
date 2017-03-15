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
                <li class="active"><a href="archive.php">Archive</a></li>   
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
        <div class="panel-heading">click to download</div>
        <div class="panel-body">
          <div class="files-list">
<div class="file"> 
       <ul> 
<?php 
		   $dir = opendir('ftp/old/'); 
echo '<ul>';
while ($read = readdir($dir)) 
{

if ($read!='.' && $read!='..') 
{ 
echo '<li><a href="ftp/old/'.$read.'">'.$read.'</a></li>'; 
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

</body>
</html>