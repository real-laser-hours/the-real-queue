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
	  <a href="queue.php"><div class="col-xs-4 menu-text">Queue</div></a>
  </div>
  </nav>




<div class="container">
 <br>
 <input type="text" id="search" placeholder="Type to search">
<table id="table">
  <div class="row">
    <div class="col-xs-12">
      <table class="table table-bordered table-hover dt-responsive" id='table'>

        <thead>
          <tr>
            <th>File (click to download)</th>
            <th>speed</th>
            <th>power</th>

            <th>material</th>
			  <th>uploaded</th>
          </tr>
        </thead>
        <tbody>
         <?php
            $connect = mysqli_connect("localhost", "root", "", "files");
            if (!$connect) {
                die(mysqli_error());
            }
            $results = mysqli_query($connect, "SELECT * FROM current");
            while($row = mysqli_fetch_array($results)) {
            ?>
                <tr>
                    <td><?php
					$temp = $row['UUID'];
						echo '<a href="ftp/'.$temp.'">'.$temp.'</a>';
						?></td>
                    <td><?php echo $row['SPEED']?></td>
                    <td><?php echo $row['POWER']?></td>
                    <td><?php echo $row['MATERIAL']?></td>
                    <td><?php echo $row['ts']?></td>
                </tr>

            <?php
            }
            ?>



        </tbody>
        <tfoot>
          <tr> </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/srch.js"></script>
<footer>

  <p> <font size="-99"><center>Thanks to: Hac Nguyenon on Codepen, dfsq on stackoverflow, SitePoint on Codepen. Designed by Quinn Brown and Dominick Strollo</center></font>
	</footer>
</body>
</html>
