
<!DOCTYPE html>
 <html>
 <head>
 <?php
 	include 'main.php';
 	if(!isset($_SESSION['id']))
 	{
 		header('location:index.php');
 	
 	}
?>
 
 	<title></title>
 	<title>Girish S9 Connect</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
	 <link rel="shortcut icon" href="propic/<?php $u->picname(); ?>" type="image/x-icon">

	<title style="text-transform: capitalize;">
		
		<?php

			$u->titleName();

		?>
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="css\font-awesome-4.7.0\css\font.css">
	<link href="css/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css">
    <script src="css/2/thumbnail-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/canvas.js"></script>
	<script type="text/javascript" src="js/exportchart.js"></script>
	<script type="text/javascript">
		// alert(g);


		var a=<?php $u->totalPost(); ?>;
		var b=<?php $u->totalFriends(); ?>;
		var c=<?php $u->totalLikes(); ?>;
		var d=<?php $u->totalUnLikes(); ?>;
		var e=<?php $u->totalcomment(); ?>;
		var f=<?php $u->totalmessage(); ?>;




		
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
	<link rel="stylesheet" type="text/css" href="css/sidenav.css">

 </head>
 <body style="background-image: url('background/<?php $u->fetchBack() ?>');background-size: 1364px 680px">
 <?php

 include 'nav.php';

 ?>
<div class="container-fluid" style="margin-top: 50px;">
	<div class="row">
		<div class="col-md-3 p w3-hide-small" style="font-size: 18px;padding: 5px 0px 0px 10px;background-color:;" >
				<?php
					include 'sidenav.php';
				?>
			</div>
		<div class="col-md-9">
		<div id="chartContainer" style="height: 400px; width: 100%;"></div>
		</div>
	</div>
</div>

	<script type="text/javascript" src="js/homescript.js"></script>

<?php
	include 'include/friendlist.php';

?>

 </body>
 </html>