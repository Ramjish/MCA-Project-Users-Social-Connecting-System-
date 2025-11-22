<?php

	include 'main.php';

	if(!isset($_SESSION['id']))
	{
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title style="text-transform: capitalize;">
		
		<?php

			$u->titleName();

		?>
	</title>
	<style type="text/css">
		.change:hover
		{
			top: -2px;
		}
	</style>
	<meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="shortcut icon" href="propic/<?php $u->picname(); ?>" type="image/x-icon">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="css\font-awesome-4.7.0\css\font.css">
	<link href="css/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<link rel="stylesheet" type="text/css" href="css/sidenav.css">
	
	<style type="text/css">
		
	</style>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/homescript.js"></script>
</head>
<body style="background-image: url('background/<?php $u->fetchBack() ?>');background-size: 1364px 680px">
<!-- 'navigation' -->
	<?php

		include 'nav.php';
	?>
<!-- end navigation  -->

<div class="container-fluid" style="margin-top: 50px;">
	<div class="row">
			<!--left menu section -->
		<!-- user intro section -->
			<div class="col-md-3 p w3-hide-small" style="font-size: 18px;padding: 5px 0px 0px 10px;background-color:;" >
				<?php
					include 'sidenav.php';
				?>
			</div>
		<!-- end menu section -->
			<div class="col-md-9" style="">

					<?php

						$u->showVideos();
					?>
			</div>

	</div>
</div>
<!-- include file -->

<?php
	include 'include/friendlist.php';

?>


<!-- end include files -->
</body>
</html>