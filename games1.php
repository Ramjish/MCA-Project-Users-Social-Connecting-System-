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
	
	<title style="text-transform: capitalize;">
		
		<?php

			$u->titleName();

		?>
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/scroll.css">
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
        .left-inner-addon i {
            position: absolute;
            padding: 10px 12px;
            left: 15px;
            /*pointer-
            events: none;*/
        }
        .drag,.drop1
		{
			/*height: 400px;*/
			width: 504px;
			border:2px solid black;
			float: left;
			margin-left: 100px;

		}
		.drag
		{
			padding-bottom: 100px;
		}

		.drop1 div
		{
			height: 200px;
			width: 250px;
			background-color: green;
			/*border:1px solid green;*/
			float: left;
			opacity: .5;
		}
		.drop1 div img
		{
		
			height: 200px;
			width: 250px;
			float: left;
		}
		.drag img
		{
			height: 100px;
			width: 200px;
			/*float: left;*/
		}
		table
		{
			margin: 60px 0 0 40px;
		}
		
        </style>
	<link rel="stylesheet" type="text/css" href="css\font-awesome-4.7.0\css\font.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/puzzel.css"> -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	var win=0;
			var i=0;
			var totalTime=0;
	   		var id;
			var jj=1;

		$(document).ready(function(){

			$(".ak").hide();
			$(".friend1").click(function(){

					$("#friendlist").modal('show');
				});


			$(".start").click(function(){
				$(".ak").show();
				setInterval(function(){

				// document.getElementById('times').innerHTML=i;
				$("#times").html(i);

				if(win==4)
				{
					totalTime=parseInt(100/i);
					dbscore=i;
					if(jj==1)
					{
						$("#score1").html(totalTime);
						$("#score").modal('show');
						jj=0;
					}
					// win=0;

				}
				else
				{
					i++;
				}





			},1000);

			});
		});

		


	   function dragAllow(ev)
			{
				ev.preventDefault();
			}

			function drag(ev)
			{
				id=ev.target.id;
				// alert(id)
			}

			function drop(ev)
			{
				var fetch=ev.target.id;
				
				// alert(fetch);

				if(fetch=="one")
				{
					if(id=="img1")
					{
						ev.target.appendChild(document.getElementById(id));
						win++;
						

					}	
				}
				if(fetch=="two")
				{
					if(id=="img2")
					{
						ev.target.appendChild(document.getElementById(id));
						win++;
						


					}
				}
				 if(fetch=="three")
				{
					if(id=="img3")
					{
						ev.target.appendChild(document.getElementById(id));
						win++;
						
					}
				}
				if(fetch=="four")
				{
					if(id=="img4")
					{
						ev.target.appendChild(document.getElementById(id));
						win++;
					}
				}

				
		
			}

	</script>
</head>
<body>
<?php

	include 'nav.php';
?>
<?php
	include 'include/friendlist.php';

?>

<div class="container-fluid" style="margin-top: 70px;">

	<div class="col-md-6">
		<button class="btn btn-success start">start</button>
	</div>
	<div class="col-md-6" >
		<p id="times" class="pull-right"> </p>
	</div>
</div>
	

<div class="ak">
	<div class="drag">
	<table>
		<tr>
			<td>1</td>
			<td><img src="images/gamepic/1.png" id="img1" ondrag="drag(event)"></td>
		<!-- </tr> -->
		<!-- <tr> -->
			<td>2</td>
			<td><img src="images/gamepic/2.png" id="img2" ondrag="drag(event)"></td>
		</tr>
		<tr>
			<td>3</td>
			<td><img src="images/gamepic/3.png" id="img3" ondrag="drag(event)"></td>
			<td>4</td>
			<td><img src="images/gamepic/4.png" id="img4" ondrag="drag(event)"></td>
		</tr>
	</table>
</div>



<div class="drop1">
	<div class="one" id="one" ondragover="dragAllow(event)" ondrop="drop(event)" >
	</div>
	<div class="two" id="two" ondragover="dragAllow(event)" ondrop="drop(event)" >
	</div>
	<div class="three" id="three" ondragover="dragAllow(event)" ondrop="drop(event)">
	</div>
	<div class="four" id="four" ondragover="dragAllow(event)" ondrop="drop(event)">
	</div>
</div>
</div>


</body>

<div class="modal fade"  id="score">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				POST ON UR WALL
			</div>
			<div class="modal-body text-center">
				<p><?php
				$u->titleName();
				?></p>
				<p id="score1" style="font-size: 40px;"></p>
			</div>
		</div>
	</div>
</div>
</html>