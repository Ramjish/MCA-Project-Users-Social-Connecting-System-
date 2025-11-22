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
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/scroll.css">
	<link rel="stylesheet" type="text/css" href="css\font-awesome-4.7.0\css\font.css">
	<link href="css/2/thumbnail-slider.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		body
		{
			overflow-x: hidden; 
		}
		.left-inner-addon input
         {
            padding-left: 30px; 
            width: 100%;
            font-size: 16px;
            text-transform: capitalize;
            /*padding-left:    */
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

        .input1x tr
        {
        	line-height: 30px;
        }
        .input1x  input
        {
        	border: none;
        	/*height: 40px;*/
        	line-height: 30px;
        	text-indent: 4px;
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
	<script type="text/javascript" src="js/userupdate.js"></script>
	<script type="text/javascript" src="js/password.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.remove').hide();
			// alert("hello");
			// $(".people").click(function(){

			// 	$(".Newsfeed").hide();
			// });
			// $(".newsfeed").click(function(){
			// 	$(".Newsfeed").show();
			// });
			
			

			// profile pic show modal
			$(".profile").click(function(){
				$("#profile").modal('show');

			});

			// end profile pic show modal

			// cover pic show modal
			$(".cover").click(function(){

				$("#cover").modal('show');

			});
			// end cover pic modal
			// making a friend list

			$(".check").click(function(){

				var this1=$(this);
				var btn=this1.parent().children('input').val();

				$.ajax({
					type:'post',
					url:'main.php',
					data:{postid:btn},
					success:function(data)
					{
						// alert(data);
						
						this1.parent().children('button').hide().children('span').show();
						this1.siblings('span').show();
					}
				})

			});

			// end making a friend list


			// friend request accept
				$(".accept").click(function(){

					var this1=$(this);
					var accept=this1.parent().children('input').val();

					// alert(accept);

					$.ajax({

						type:'post',
						url:'main.php',
						data:{reciver_id:accept},
						success:function(data)
						{
							alert(data);
							this1.parent().children('button').hide();
							this1.siblings('span').show();
						}
					})

				});
			// end friend request accept

			// show friend accept or nostrud
				$(".friend1").click(function(){

					$("#friendlist").modal('show');
				});

			// end show friend accept or not

			// removing friend list
			$(".hide1").click(function(){

				// var btn=$(this).parent().slideUp().hide(1000);
				$(this).parent().hide('slide',{direction:'right'},500);

			});

			// end removing friend list


			$(".edit").click(function(){

				// alert("hello");
				// var id=$(this).val();
				// alert(id);
				// alert();
				$(this).parent().next().removeAttr('readonly');
				$(this).hide();
				$(this).next().show();
			});
			

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
		<div class="col-md-3 p w3-hide-small" style="font-size: 18px;padding: 5px 0px 0px 10px;" >
				<?php

						include 'sidenav.php';
				?>	
		</div>
		
<!-- end menu section -->

<!-- middle section like post,chat,group chat -->
		<div class="col-md-9">
			
			<!-- my wall -->
			<div class="w3-container w3-animate-bottom profile1" style="background-color:;padding-left: 0px;padding-right: 0px;height: 600px;overflow-y: scroll;" id="scroll">
			<?php
				$u->coverPic();

			?>
			
			</div>


			<div class="col-md-12 one" style="background-color: white;opacity: .8" id="searchfriend">
				
			</div>
			<!-- end my wall -->

			<!-- friend request -->
			<div class="">
				
			</div>
			<!-- end friend request -->
			

			
		</div>
<!-- end middle section -->





<!-- friend section -->
	<!-- 	<div class="col-md-2" style="border-left: 1px solid #ccc;">
				<p style="font-family: Imprint MT Shadow;font-size: 20px;"><u>Who to follow</u></p>
				<div class="col-md-12" style="padding: 0 0 0 0;overflow-y: scroll;max-height: 300px;overflow-x: hidden;">
					<?php
					$u->addFriends();
				?>
				</div>
		</div> -->

<!-- end friend section -->
	</div>
</div>

<!-- include file -->

<?php
	include 'include/friendlist.php';

?>


<!-- end include files -->

<!-- profile pic update -->

<div class="modal fade" role="dialog" id="profile">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Update profile pic</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="main.php" enctype="multipart/form-data">
					<input type="file" class="form-control" required name="profile">
					<br>
					<button class="btn btn-success" type="submit" name="profilebtn">Upload</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- end profile pic update -->


<!-- cover photo update -->
<div class="modal fade" role="dialog" id="cover">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Upload cover pic</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="main.php" enctype="multipart/form-data">
					<input type="file" class="form-control" required name="cover">
					<br>
					<button class="btn btn-success" type="submit" name="coverbtn">Upload</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- end cover photo update -->


<div class="modal fade" role="dialog" id="password">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<span class="modal-title" id="msgtitle">change password</span>
			</div>
			<div class="modal-body">
				<form class="chgpass">
					<input type="password" name="current" placeholder="current password" class="form-control current" required><br>
					<input type="password" name="new" placeholder="new password" class="form-control new" required><br>
					<input type="password" name="confirm" placeholder="conform password" class="form-control confirm" required><br>
					<button class="btn btn-success" type="submit">change</button>
				</form>
			</div>
		</div>
	</div>
</div>



</body>
</html>