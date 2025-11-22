<?php
	// session_start();
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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
	<link rel="stylesheet" type="text/css" href="css\font-awesome-4.7.0\css\font.css">
	<link href="css/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<style type="text/css">
		body
		{
			/*overflow-x: hidden; */
			overflow: hidden;
			overflow-y: hidden;
			background-color: #ccc;
		}
		.left-inner-addon input
         {
            padding-left: 30px; 
            width: 100%;
            font-size: 16px;
        }
        .left-inner-addon i 
        {
            position: absolute;
            padding: 10px 12px;
            left: 15px;
            /*pointer-events: none;*/
        }

        
        .luc i
        {
        	color: skyblue;
        }

        .p
		{
			border-right: 5px solid #ccc;
		}

		.p p
		{
			padding-bottom: 10px;
			padding-top: 5px;
			border-bottom: 1px solid #ccc;
		}

		.p a
		{
			text-decoration: none;
			color: black;
		}

		.friendrequest:hover
		{
			font-weight: bold;
		}

		#post_scroll::-webkit-scrollbar {
			    width: 8px;
			}
			 
			#post_scroll::-webkit-scrollbar-track {
			    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			}
			 
			#post_scroll::-webkit-scrollbar-thumb {
			  background-color: darkgrey;
			  border-radius: 10px;
			  outline: 1px solid slategrey;
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
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/homescript.js"></script>
	<!-- <script type="text/javascript" src="js/searchfriend.js"></script> -->
	<script type="text/javascript">
		function searchFriends_()
			{
				

				var val=$(".search123").val();
				// alert(val);

				var length=val.length;

				// alert(length);


				if(length>=1)
				{
					console.log(val);
					$("#post_").hide();

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
					$("#post_").slideDown();
					$("#searchfriend").slideUp();
					// $(".search123").val("");
				}




			}
			function searchFriends1_()
			{
				

				var val=$(".search1234").val();
				// alert(val);

				var length=val.length;

				// alert(length);


				if(length>=1)
				{
					console.log(val);
					$(".post_").hide();

					$.ajax({

						type:'post',
						url:'main.php',
						cache:false,
						data:{search1234:val},
						success:function(data)
						{
							$(".one").html(data);
							console.log(data);
						}

					});

				}
				else
				{
					$(".post_").slideDown();
					$("#searchfriend").slideUp();
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

<!-- search section -->

<!-- <div class="col-sm-12 w3-hide-large navbar-fixed-top" style="margin-top: 60px;">
	<div class="form-group left-inner-addon">
                <i class="fa fa-search"></i>
                <input type="text" name="search_name" id="search123" class="form-control" placeholder="Search" style="border-radius: 10px;" onkeyup="searchFriends_()">
    </div>
</div> -->


<!-- end search section -->





<div class="container-fluid" style="margin-top: 50px;">
	<div class="row">
    <input type="text" name="search_name" id="search123" class="form-control w3-hide-large w3-hide-midum search1234" placeholder="Search" style="border-radius: 10px;position: fixed;z-index: 100" onkeyup="searchFriends1_()">

	<!--left menu section -->
	<!-- user intro section -->
		<div class="col-md-3 p w3-hide-small" style="font-size: 18px;padding: 5px 0px 0px 10px;background-color:;" >
			<?php

				include 'sidenav.php';

			?>
		</div>
		
	<!-- end menu section -->

	<!-- middle section like post,chat,group chat -->
		<div class="col-md-7" style="opacity: .98;padding: 0px 0px 10px 5px;">
			
			<!-- my wall -->
				<div class="col-md-12  w3-animate-bottom w3-hide-small w3-hide-midum post_"  id="post_" style="padding: 0 0 0 0;display:;">

					<div class="col-md-12" style="padding: 0 0 0 0;overflow-y: scroll;max-height: 580px;" id="post_scroll">
						<?php

							$u->fetchPost();
							
						?>
						<div class="col-md-12" style="padding-bottom: 48px;"> 
					
						</div>
					</div>

				</div>
										

				


				<!-- mobile screen -->
				<div class="col-md-12  w3-animate-bottom w3-hide-large post_" id="post_" style="padding: 0 0 0 0;display:;margin-top: 40px;">

						<?php

							$u->fetchPost();
							
						?>
				</div>
				<!-- end mobile screen -->
			<!-- end my wall -->
			<div class="col-md-12 one" style="background-color: white;opacity: .8" id="searchfriend">
				
			</div>
			<!-- friend request -->
			<div class="">
				
			</div>
			<!-- end friend request -->
			

			
		</div>
<!-- end middle section -->





<!-- friend section -->
		<div class="col-md-2 w3-hide-small" style="padding: 0 0 0 0;opacity:">
				
				<div class="col-md-12" style="border-left: 1px solid #ccc;background-color:white;box-shadow: 1px 1px 1px gray;padding: 0 0 0px;overflow-y: scroll;max-height: 400px;padding: 0 0 0 0;opacity: .8" id="post_scroll">
									<p style="font-family: Imprint MT Shadow;font-size: 20px;text-align: center;"><u>Add Friends
								</u></p>
				<?php
					$u->addFriends();
				?>					
				</div>
				<div class="col-md-12" style="padding-top: 20px;padding-bottom: 20px;background-color: white;bottom: -20px;position: fixed;">
					<!-- <button class="btn btn-success">change</button> -->
					<p title="theme" class="bgimg" data-toggle="popoverbg" data-trigger="hover" data-content="click to change" data-placement="left"><img src="background/back/icon.png" style="height: 40px;"> change theme</p>
				</div>

		</div>

<!-- end friend section -->
	</div>
	<div class="col-md-6 col-md-offset-3 text-center " style="position: fixed;bottom: -20px;padding: 0 0 0 0;">
				
				<nav class="navbar navbar-inverse " style="background-color:;border:none;">
					<div class="navbar-header text-center">
						<button class="navbar-toggle" data-toggle="collapse" data-target="#myhomeNav1" style="margin-top: 1px;margin-left: 5px;">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse text-center " id="myhomeNav1" >
						<form method="post" action="main.php">
						<ul class="nav navbar-nav text-center pull-center" style="font-size: 18px;background-color:;padding-bottom: 10px;padding: 5px 2px;">
							<li>
							<!-- <img src="images/1.jpg" height="50px" width="50px" style="border-radius: 50%;"> -->
							<?php
								$u->profilePic();
							?>
							&nbsp;&nbsp;&nbsp;</li>
							<li><textarea placeholder="write what to u wish.." class="form-control" name="wish" ></textarea></</li>
							<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-music upload_audio" style="padding-top: 20px;color: white;" title="upload audio"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-image upload_img" title="upload photo" style="padding-top: 20px;color: white;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-video-camera upload_video" title="upload video" style="padding-top: 20px;color: white;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="status">Publish</button></li>
							
						</ul>
						</form>

					</div>

				</nav>
			</div>
</div>



<?php
	include 'include/friendlist.php';
	include 'include/postpic.php';
	include 'include/postvideo.php';
	include 'include/postaudio.php';
	include 'include/backgroundmodal.php';

?>




<script type="text/javascript" src="js/likecomment.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

			// $('body').oiplayer();
		// alert("hello");
		$(".upload_img").click(function(){

			$("#p1").modal('show');
			
		});


		$(".upload_video").click(function(){

			$("#p2").modal('show');

		});

		$(".upload_audio").click(function(){

			$("#p3").modal('show');


		});
		$(document).ready(function(){

			$('[data-toggle="popoverbg"]').popover();
		});

		$(".bgimg").click(function(){

			$("#backimg").modal('show');

		});

	});
</script>

<script type="text/javascript">
	
</script>



</body>
</html>