
<!DOCTYPE html>
 <html>
 <head>
 <?php
 	include 'main.php';
 	if(!isset($_SESSION['aid']))
 	{
 		header('location:../index.php');
 	}

 ?>
 	<title></title>
 	<title>Girish</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="..\css\font-awesome-4.7.0\css\font.css">
	<link href="css/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />
    <script src="css/2/thumbnail-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/canvas.js"></script>
	<script type="text/javascript" src="../js/column.js"></script>
	<script type="text/javascript">
		var a=<?php $a->totalConnector(); ?>;
		var b=<?php $a->totalMale(); ?>;
		var c=<?php $a->totalFemale(); ?>;
		var d=<?php $a->tpost(); ?>;
		var e=<?php $a->totallike(); ?>;
		var f=<?php $a->totalunlike(); ?>;
		var g=<?php $a->totalcomment(); ?>;
		// alert(g);
		
	</script>


	
	<style type="text/css">
		 .left-inner-addon input
         {
            padding-left: 30px; 
            width: 100%;
            font-size: 16px;
            /*text-transform: capitalize;*/
            /*padding-left:    */
        }
        .left-inner-addon i {
            position: absolute;
            padding: 10px 12px;
            left: 15px;
            /*pointer-events: none;*/
        }
	</style>
 </head>
 <body>
 <nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php" class="navbar-brand akash" style="font-family:;color: white;"><span style="text-transform:;"><span style="font-family:Old English Text MT;color:red;font-weight: bold;font-size: 40px;">s</span>ky<span><sub><span style="color: red;font-weight: bold;font-family: Old English Text MT;font-size: 22px;">C</span>onnect</sub></a>
	</div>
	<div class="collapse navbar-collapse" id="mynav" >
		<ul class="nav navbar-nav"> <li style="font-size: 17px;"><a href="connector.php">Connectors</a></li></ul>
		<ul class="nav navbar-nav pull-right">
			<li><a href="logout.php" class=""><i class="fa fa-sign-out" style="font-size: 17px;"></i> &nbsp;logout</a></li>
			
		</ul>
	</div>
</nav>
<div class="container-fluid" style="margin-top: 70px;">
	<div class="row">
		<div id="chartContainer" style="height: 400px; width: 100%;"></div>
	</div>
</div>


 </body>
 </html>