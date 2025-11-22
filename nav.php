
<!-- 'navigation' -- >
	<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-header">
		<button class="navbar-toggle" data-toggle="collapse" data-target="#myhomeNav">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="home.php" class="navbar-brand akash" style="color:white;"><span style="text-transform:;"><span style="font-family:Old English Text MT;color:red;font-weight: bold;font-size: 40px;">G</span>irish<span><sub><span style="color: red;font-weight: bold;font-family: Old English Text MT;font-size: 22px;">C</span>onnect</sub></a>

	</div>
	<div class="collapse navbar-collapse " id="myhomeNav">


		<form class="navbar-form pull-left text-center" name="f">
			<div class="col-sm-4 text-center w3-hide-small">
				<div class="form-group left-inner-addon">
                <i class="fa fa-search"></i>
                <input type="text" name="search_name" id="search123" class="form-control search123" placeholder="Search" style="border-radius: 10px;" onkeyup="searchFriends_()">
            	</div>

			</div>
			<div class="col-md-12 w3-hide-large w3-hide-medium text-center ">
				
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="home.php" style="font-size: 25px;"><i class="fa fa-home"></i></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" style="font-size: 25px;"><i class="fa fa-users friend1" ><?php
					$u->showFriendRequest();

				?>
				</i></a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<!-- <a href="#" style="font-size: 25px;"><i class="fa fa-comments"><span class="badge btn-danger" style="background-color: red;">3</span></i></a> -->
			</div>
		</form>
		<ul class="nav navbar-nav pull-right w3-hide-small w3-hide-medium" style="font-size: 20px;">
			<li ><a href="home.php" ><i class="fa fa-home"></i></a></li>
			<li><a href="#"><i class="fa fa-users friend1" ><?php
					$u->showFriendRequest();

				?>
				</i>
			</a></li>
			
 			<li><a href="logout.php" style="font-size: 16px;padding-top: 17px;"><i class="fa fa-sign-out"></i>&nbsp;logout</a></li>

		</ul>
		<ul class="nav navbar-nav">
			
		</ul>
		<ul class="w3-hide-large w3-hide-medium nav navbar-nav pull-left">
			
			<li><a href="userprofile.php" class="prfile"><p>&nbsp;<i class="fa fa-user" style="color: purple;"></i> &nbsp;Profile</p></a></li>
			<li><a href="home.php" class="newsfeed"><i class="fa fa-newspaper-o " style="color: green;"></i> &nbsp;My Newsfeed</a></li>
			<!-- <li><a href="#" class="people"><i class="fa fa-users" style="color: purple;"></i> &nbsp;People Nearby</a></li> -->
			<li><a href="friend.php" class="friends"><i class="fa fa-group" style="color: pink;"></i > &nbsp;Friends</a></li>
			<li><a href="message.php" class="message"><i class="fa fa-comments" style="color: orange;"></i> &nbsp;Message</a></li>
			<li><a href="image.php" class="image"><i class="fa fa-image" style="color: blue;"></i> &nbsp;Images</a></li>
			<li><a href="video.php" class="video"><i class="fa fa-video-camera" style="color: indigo;"></i> &nbsp;Videos</a></li>
			<li><a href="audio.php" class="audio"><i class="fa fa-music" style="color: indigo;"></i> &nbsp;audio</a></li>
			<li><a href="games.php" class="audio"><i class="fa fa-gamepad" style="color: green;"></i> &nbsp;Activity graph</a></li>
			<li><a href="folder.php"><i class="fa fa-dropbox" style="color: blue;"></i> &nbsp;Dropbox</a></li>

			<li><a href="logout.php"><i class="fa fa-sign-out"></i>logout</a></li>

			
		</ul>


		
		
	</div>
</nav>