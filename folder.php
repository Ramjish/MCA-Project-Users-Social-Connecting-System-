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
	<meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="shortcut icon" href="propic/<?php $u->picname(); ?>" type="image/x-icon">

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

		.change:hover .img1
		{
			transform: rotateY(180deg);
			transition: 2s;
		}

		.zoom
		{
			overflow: hidden;
		}
		.zoom img
		{
			transition: 2s;
		}
		.zoom img:hover
		{
			transform: scale(1.2,1.2);

		}
		#scroll::-webkit-scrollbar {
			    width: 8px;
			}
			 
			#scroll::-webkit-scrollbar-track {
			    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			}
			 
			#scroll::-webkit-scrollbar-thumb {
			  background-color: darkgrey;
			  border-radius: 10px;
			  outline: 1px solid slategrey;
			}
	</style>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/scroll.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css">  -->
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
	<script type="text/javascript" src="js/unfriend.js"></script>
	<script type="text/javascript" src="js/folder.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			$('[data-toggle="popoverfriend"]').popover();
		});



		
		function searchFriends_()
			{
				

				var val=$(".search123").val();
				// alert(val);

				var length=val.length;

				// alert(length);
 

				if(length>=1)
				{
					console.log(val);
					$(".profile1").hide();

					$.ajax({

						type:'post',
						url:'main.php',
						cache:false,
						data:{search1234:val},
						success:function(data)
						{
							$("#searchfriend").html(data);
							// console.log(data);
						}

					});

				}
				else
				{
					// console.log(length);
					$(".profile1").slideDown();
					$("#searchfriend").slideUp();
					// $(".search123").val("");
				}




			}
	</script>
</head>
<body style="background-image: url('background/<?php $u->fetchBack() ?>');background-size: 1364px 680px">
<!-- 'navigation' -->
	<?php

		include 'nav.php';
	?>
<!-- end navigation -->

<div class="container-fluid" style="margin-top: 50px;">
	<div class="row">
			<!--left menu section -->
		<!-- user intro section -->
			<div class="col-md-3 p w3-hide-small" style="font-size: 18px;padding: 5px 0px 0px 10px;background-color:;" >
				<?php

					include 'sidenav.php';

				?>
			</div>

			<div class="col-md-7" style="padding: 0 0 0 0">
				<div class="col-md-12 profile1" style="padding: 0 0 0 0">
						<div class="col-md-12" style="margin-top: 20px;">
						<div class="col-md-6">
							<button class="btn btn-success" data-toggle="collapse" data-target="#makefolder"><i class="fa fa-pencil"></i> Create Folder</button>
							<div class="col-md-12 collapse" id="makefolder">
								<br>
								<form method="post" class="form-inline" action="main.php">
									<input type="text" name="foldername" class="form-control" placeholder="enter foldername" required="">
									<input type="submit" class="btn btn-success" value="create" name="makefolder">
								</form>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<!-- <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete Folder</button> -->
						</div>
					</div>

					<div class="col-md-12" style="background-color: white;opacity: .7;margin-left: 10px;margin-top: 10px;" >
						
						<?php
							$u->fetchFolder();

						?>
					</div>
				</div>
				<div class="col-md-12 " style="background-color: white;opacity: .8" id="searchfriend">
				
				</div>
			</div>
		<!-- end menu section -->
			

			
	</div>
</div>



<!-- include file -->

<?php
	include 'include/friendlist.php';

?>


<!-- end include files -->
</body>
</html>