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
		body
		{
			overflow: hidden;
		}
		#hoveractive tr:hover
		{
			opacity: 1;
			/*font-size: 20px;*/
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
			#scroll::-webkit-scrollbar {
			    width: 10px;
			} 
			 
			#scroll::-webkit-scrollbar-track {
			    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			}
			 
			#scroll::-webkit-scrollbar-thumb
			 {
			  background-color: darkgrey;
			  outline: 1px solid slategrey;
			}


			#scroll1::-webkit-scrollbar {
			    width: 5px;
			} 
			 
			#scroll1::-webkit-scrollbar-track {
			    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.6);
			}
			 
			#scroll1::-webkit-scrollbar-thumb {
			  background-color: green;
			  outline: 1px solid slategrey;
			}
	</style>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/homescript.js"></script>
	<script type="text/javascript" src="js/msg.js"></script>
	<script type="text/javascript">
		
	setInterval(function(){
				$("#scroll").load('autofetchmsg.php');
				$(".scroll12").load('autofetchmsg.php');

		},1000);




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
		<!-- end menu section -->
			<div class="col-md-9" style="">

				<div class="col-md-12 profile1" style="padding: 0 0 0 0">
							<div class="col-md-4" style="border-right: 1px solid gray;">
							<!-- <button class="btn btn-success off">Offline SMS</button> -->
							<div class="col-md-12" style="padding: 0 0 0 0;max-height: 150px;overflow-y: scroll;margin-top: 20px;" id="scroll1">
								<?php

									$u->showFriends();
								?>
							</div>
						</div>

						<div class="col-md-8 viewmsg" style="padding: 0 0 0 0;">
								
						</div> 
				</div>
				<div class="col-md-12 " style="background-color: white;opacity: .8" id="searchfriend">
				
				</div>

			</div>


			<!-- friend section -->
		
<!-- end friend section -->
	</div>
</div>



<!-- include file -->

<?php
	include 'include/friendlist.php';

?>


<!-- end include files -->



<!-- offline sms modal -->


<div class="modal fade" role="dialog" id="offline">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<a href="#" style="text-transform: capitalize;">Offline sms</a>
			</div>
			<div class="modal-body">
				<form class="" method="post" action="message.php">
					<input type="text" placeholder="enter number" name="num" class="form-control"><br>
					<textarea class="form-control" name="offlinesms" placeholder="enter sms"></textarea><br>
					<button class="btn btn-success" type="submit" name="off1">send</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){


		$(".off").click(function(){

			$("#offline").modal('show');
						

		});

	});
</script>

<?php

	if(isset($_POST['off1']))
	{

		$con=$_POST['num'];
		$msg=$_POST['offlinesms'];


		$msg1=$msg." --from sky-connect ";

						
			$data = array('username' => 'gra0-ahmad', 'password' => 'ahmad','type'=>'0','dlr'=>'1','source'=>'022751','message'=>$msg1,'destination'=>$con);
							$str = http_build_query($data);
							$url= "http://smsstore.graciassoft.com:8080/sendsms/bulksms?$str";
							$ch = curl_init();
							
			$header = array("Content-Type:application/json", "Accept:application/json");
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $str);

			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			$responseBody = json_decode($response);
			curl_close($ch);
	}


?>
</body>
</html>