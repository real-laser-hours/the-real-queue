<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

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

	  <a href="form.html"><div class="col-xs-4 menu-text">Send to Laser</div></a>
	  <!-- coming soon boiiis -->
    <a href="queue.php"><div class="col-xs-4 menu-text">Queue</div></a>
  </div>
  </nav>


<div class="container">

  <div class="row">
	  <div class="text-center col-md-12">
	    <p>Other characters work(e.g. Chinese, Swedish, Russian etc.). But not reccomended.</p>
      <p>Please don't delete other people's stuff</p>
	  </div>
    <form role="form" enctype="multipart/form-data" action="q.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail2">Enter Your Name<br>
    </label>
    <input type="nameq" class="form-control" id="nameq" name="nameq" aria-describedby="emailHelp" placeholder="Name">
</div>
 <!-- <fieldset class="form-group">
<select multiple class="form-control" id="type" name="eng">
      <option>cut</option>
    </select>

</fieldset>  -->
<button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
<Br>
  <table id="table">
    <div class="row">
      <div class="col-xs-12">
        <table class="table table-bordered table-hover dt-responsive" id='table'>

          <thead>
            <tr>
              <th>name</th>
              <th>time estimate</th>
              <th>remove if done</th>
            </tr>
          </thead>
          <tbody>
           <?php
              $connect = mysqli_connect("localhost", "root", "", "files");
              if (!$connect) {
                  die(mysqli_error());
              }
              $results = mysqli_query($connect, "SELECT * FROM mynamachef");
              while($row = mysqli_fetch_array($results)) {
              ?>
                  <tr>
                      <td><?php
                      $temp = $row['nameq'];
                      echo $temp ?></td>
                      <td><?php echo $row['find']?></td>
                      <td><?php echo "<a href='delete.php?id=".$row['nameq']."'>Delete</a>" ?></td>
                  </tr>

              <?php
              }
              ?>



          </tbody>
          <tfoot>
            <tr> </tr>
          </tfoot>
        </table>

<hr>
<footer>

  <p> <font size="-99"><center>Thanks to: Hac Nguyenon on Codepen, dfsq on stackoverflow, SitePoint on Codepen. Designed by Quinn Brown and Dominick Strollo</center></font>
	</footer>
</body>
</html>
