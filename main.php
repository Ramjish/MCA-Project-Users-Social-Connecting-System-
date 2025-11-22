<?php

session_start();
// $name=$_POST['fname'];
// $lname=$_POST['lname'];
// $email=$_POST['email'];
// $cnt=$_POST['cnt'];
// $password=sha1($_POST['password']);
// $gender=$_POST['gender'];


// echo "$name<br>$lname<br>$email<br>$cnt<br>$password<br>$gender";

class Connection
{
	public $con;
	public function __construct()
	{
		$this->con=mysqli_connect("localhost","root","","db_ramjishconnect");


		if($this->con!=true)
		{
			echo "error in connection";
		}
		
	}
}

class User extends Connection
{
	public $accounter_first_name,$accounter_last_name,$accounter_email,$accounter_password,$accounter_contact,$accounter_gender;
	public $i=0;
	public function registrationUser()
	{
		$this->accounter_first_name=$_POST['fname'];
		$this->accounter_last_name=$_POST['lname'];
		$this->accounter_email=$_POST['email'];
		$this->accounter_password=sha1($_POST['password']);
		$this->accounter_contact=$_POST['cnt'];
		$this->accounter_gender=$_POST['gender'];

		// echo "$this->accounter_first_name,$this->accounter_last_name,$this->accounter_email,$this->accounter_password,$this->accounter_contact,$this->accounter_gender";

		$query="insert into accounter(accounter_first_name,accounter_last_name,accounter_email,accounter_password,accounter_contact,accounter_gender) values('$this->accounter_first_name','$this->accounter_last_name','$this->accounter_email','$this->accounter_password',$this->accounter_contact,'$this->accounter_gender')";


		$run=mysqli_query($this->con,$query);


		if($run==true)
		{
			header('location:index.php?status=1');
				$msg1="welcome to SkyConnect ur email email: ".$this->accounter_email." password: ".$_POST['password'];
				$data = array('username' => 'gra0-ahmad', 'password' => 'ahmad','type'=>'0','dlr'=>'1','source'=>'022751','message'=>$msg1,'destination'=>$this->accounter_contact);
				$str = http_build_query($data);
				$url= "http://smsstore.graciassoft.com:8080/sendsms/bulksms?$str";
				// echo "$url";

				// header("Location: $url");
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
		else
		{
			header('location:index.php?status=2');
		}
	}

	public function loginUser()
	{

		$useremail=$_POST['email'];
		$userpassword=sha1($_POST['pass']);


		// echo "$useremail";
		// echo "$pass";

		$query = "SELECT COUNT(*) 
          FROM accounter 
          WHERE accounter_email = '$useremail' 
            AND accounter_password = '$userpassword'";

$running_login = mysqli_query($this->con, $query);

// Check if query failed
if (!$running_login) {
    die("SQL Error: " . mysqli_error($this->con));
}

$data = mysqli_fetch_row($running_login);

// Check result safely
if ($data && $data[0] == 1) {
    // login success
} else {
    // login failed
}

		{
			///fetching folder///



			$fetch_accounter_id="select accounter_id,status from accounter where accounter_email='$useremail' and accounter_password='$userpassword'";

			$running_fetch_id=mysqli_query($this->con,$fetch_accounter_id);

			$id=mysqli_fetch_row($running_fetch_id);

			if($id[1]==0)
			{

				$_SESSION['id']=$id[0];

				header('location:home.php');


				$act="select * from active where accounter_id=$id[0]";
				$act1=mysqli_query($this->con,$act);

				$rowact=mysqli_num_rows($act1);

				if($rowact==0)
				{
					$q1="insert into active values($id[0],1)";
					$r1=mysqli_query($this->con,$q1);
				}
				else
				{
					$q2="update active set status=1 where accounter_id=$id[0]";
					$r2=mysqli_query($this->con,$q2);
				}

				$query="select count(*) from accounter_details where accounter_id=$id[0]";

				$run=mysqli_query($this->con,$query);

				$row=mysqli_fetch_row($run);

				if($row[0]==0)
				{
					


					$query="select accounter_gender from accounter where accounter_id=$id[0]";
					$run=mysqli_query($this->con,$query);
					$row=mysqli_fetch_row($run);

					if($row[0]=="male")
					{
						$query="insert into accounter_details(accounter_address,accounter_dp,accounter_nationality,accounter_language,accounter_id,accounter_DOB) values('mumbai','male1.png','indian','english',$id[0],'1995-12-8')";
						// $query="insert into accounter_details(accounter_dp,accounter_id) values('male1.png',$id[0])";
						$run=mysqli_query($this->con,$query);
					}
					else if($row[0]=="female")
					{
						// $query="insert into accounter_details(accounter_dp,accounter_id) values('female.png',$id[0])";
					// LOGIN QUERY
$query = "SELECT COUNT(*) 
          FROM accounter 
          WHERE accounter_email = '$useremail' 
            AND accounter_password = '$userpassword'";

$running_login = mysqli_query($this->con, $query);

// CHECK IF LOGIN QUERY FAILED
if (!$running_login) {
    die("SQL Error: " . mysqli_error($this->con));
}

$data = mysqli_fetch_row($running_login);

// LOGIN SUCCESS?
if ($data && $data[0] == 1) {

    // CHECK IF BLOCKED
    $block_q = "SELECT accounter_block FROM accounter WHERE accounter_email='$useremail'";
    $block_run = mysqli_query($this->con, $block_q);

    if (!$block_run) {
        die("SQL Error: " . mysqli_error($this->con));
    }

    $block_data = mysqli_fetch_row($block_run);

    // IF NOT BLOCKED
    if ($block_data && $block_data[0] == 0) {

        // GET accounter_id
        $id_q = "SELECT accounter_id FROM accounter WHERE accounter_email='$useremail'";
        $id_run = mysqli_query($this->con, $id_q);

        if (!$id_run) {
            die("SQL Error: " . mysqli_error($this->con));
        }

        $id = mysqli_fetch_row($id_run);

        // INSERT INTO accounter_details
        $query = "INSERT INTO accounter_details
                  (accounter_address, accounter_dp, accounter_nationality, accounter_language, accounter_id, accounter_DOB)
                  VALUES
                  ('mumbai', 'female.png', 'indian', 'english', '$id[0]', '1995-12-08')";

        $run = mysqli_query($this->con, $query);

        if (!$run) {
            die("SQL Error: " . mysqli_error($this->con));
        }

        // SUCCESS — REDIRECT
        header("location: dashboard.php");
        exit();

    } else {
        // USER IS BLOCKED
        echo "<script>alert('Sorry, you are blocked');</script>";
        echo "<script>window.location.href='index.php';</script>";
        exit();
    }

} else {

    // LOGIN FAILED
    header("location:index.php?status=3");
    exit();
}


// Find username

    // Check if session ID exists
    if (!isset($_SESSION['id'])) {
        echo "Guest";
        return;
    }

    // Ensure the ID is an integer
    $id = intval($_SESSION['id']);

    // Prepare SQL query
    $fetch_name = "SELECT accounter_first_name, accounter_last_name 
                   FROM accounter 
                   WHERE accounter_id = $id";

    // Execute query
    $run = mysqli_query($this->con, $fetch_name);

    // Check for query errors
    if (!$run) {
        die("SQL Error: " . mysqli_error($this->con));
    }

    // Fetch the row
    $dta = mysqli_fetch_row($run);

    // Output the username safely
    if ($dta && isset($dta[0], $dta[1])) {
        echo "&nbsp;&nbsp;" . htmlspecialchars($dta[0]) . "<br>" . htmlspecialchars($dta[1]);
    } else {
        echo "Unknown User";
    }
}

    // Check if session ID exists
    if (!isset($_SESSION['id'])) {
        echo "Guest";
        return;
    }

    // Ensure the ID is an integer
    $id = intval($_SESSION['id']);

    // Prepare the query
    $fetch_name = "SELECT accounter_first_name, accounter_last_name 
                   FROM accounter 
                   WHERE accounter_id = $id";

    // Execute the query
    $run = mysqli_query($this->con, $fetch_name);

    // Check if query failed
    if (!$run) {
        die("SQL Error: " . mysqli_error($this->con));
    }

    // Fetch the result
    $dta = mysqli_fetch_row($run);

    // Output the name if exists, otherwise show default
    if ($dta && isset($dta[0], $dta[1])) {
        echo "&nbsp;&nbsp;" . htmlspecialchars($dta[0]) . "<br>" . htmlspecialchars($dta[1]);
    } else {
        echo "Unknown User";
    }
}

{
    // Check session
    if (!isset($_SESSION['id'])) {
        echo "Unknown User";
        return;
    }

    $id = intval($_SESSION['id']);

    // Query
    $fetch_name = "SELECT accounter_first_name, accounter_last_name 
                   FROM accounter 
                   WHERE accounter_id = $id";

    $run = mysqli_query($this->con, $fetch_name);

    // Check query failure
    if (!$run) {
        die("SQL Error: " . mysqli_error($this->con));
    }

    $dta = mysqli_fetch_row($run);

    // Check if row exists
    if ($dta) {
        echo $dta[0] . " " . $dta[1];
    } else {
        echo "Unknown User";
    }
}

// end user name


// wish
	
	
	{
		$id=$_SESSION['id'];
		$status=$_POST['wish'];

		$query="insert into post(post_description,accounter_id) values('$status',$id)";

		$run_status=mysqli_query($this->con,$query);

		header('location:home.php');
			
	}
// end wish

//post pic

	
	{
		$id=$_SESSION['id'];
		$pic_description=$_POST['description'];
		$actualpic=$_FILES['pic']['name'];
		$temp=$_FILES['pic']['tmp_name'];

		$path="post/".$actualpic;
		$ext=pathinfo($path,PATHINFO_EXTENSION);
		// $ext=pathinfo($path,PATHINFO_EXTENSION);
		// echo "$ext";
		if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
		{
			$move=move_uploaded_file($temp,$path);
			if($move==true)
			{
					if($pic_description=="")
					{
						$query="insert into post(post_img,accounter_id) values('$actualpic',$id)";
						$run=mysqli_query($this->con,$query);
						if($run==true)
						{
							
							echo "<script>window.location.href='home.php';</script>";	
						}
					}
					else
					{
						$query="insert into post(post_description,post_img,accounter_id) values('$pic_description','$actualpic',$id)";
						$run=mysqli_query($this->con,$query);
						if($run==true)
						{
							// echo "<script>alert('image uploaded successfully');</script>";
							echo "<script>window.location.href='home.php';</script>";
						}
					}
			}
			else
			{
				echo "<script>alert('plz try again');</script>";
				echo "<script>window.location.href='home.php';</script>";		
			}
		}



		// echo "$path";
		// echo "$id $actualpic $pic_description";
	}

//end post pic


// video post

	
	{
		$id=$_SESSION['id'];
		$description=$_POST['description'];
		$actual_video=$_FILES['video']['name'];
		$temp_video=$_FILES['video']['tmp_name'];


		// echo "$description $actual_video";

 
 
		$path="postvideo/".$actual_video;
		// $move=move_uploaded_file($temp_video,$path);
		
		// echo "$path";
		$ext=pathinfo($path,PATHINFO_EXTENSION);
		// echo "$ext";

		if($ext=="mp4" || $ext=="avi" || $ext=="mkv" || $ext=="flv" || $ext=="gif" || $ext=="3gp")
		{
			$move=move_uploaded_file($temp_video,$path);


			// echo "$temp_video $actual_video";
			if($move==true)
			{
				if($description=="")
				{
					$query="insert into post(accounter_id,post_video) values($id,'$actual_video')";
					$run=mysqli_query($this->con,$query);
					if($run==true)
					{
						// echo "<script>alert('video uploaded successfully');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
					else
					{
						echo "<script>alert('Server is down plz try again..');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
				}
				else
				{
					$query="insert into post(post_description,accounter_id,post_video) values('$description',$id,'$actual_video')";
					$run=mysqli_query($this->con,$query);	
					if($run==true)
					{
						// echo "<script>alert('video uploaded successfully');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
					else
					{
						echo "<script>alert('Server is down plz try again..');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('something wrong in that video');</script>";
				echo "<script>window.location.href='home.php';</script>";
			}
		}
		else
		{
			echo "<script>alert('plz select the proper video');</script>";
			echo "<script>window.location.href='home.php';</script>";
		}

	}

// end video post

// audio post
	public function postAudio()
	{
		$id=$_SESSION['id'];
		$description=$_POST['description'];
		$actual_audio=$_FILES['audio']['name'];
		$temp_audio=$_FILES['audio']['tmp_name'];


		// echo "$actual_audio";
		$path="postaudio/".$actual_audio;
		// echo "$path";
		$ext=pathinfo($path,PATHINFO_EXTENSION);


		if($ext=="mp3" || $ext=="3gp" || $ext=="aac" || $ext=="aax" || $ext=="mpc" || $ext=="m4a")
		{
			$move=move_uploaded_file($temp_audio,$path);
			if($move==true)
			{
				if($description==null)
				{
					$query="insert into post(accounter_id,post_audio) values($id,'$actual_audio')";
					$run=mysqli_query($this->con,$query);
					if($run==true)
					{
						// echo "<script>alert('audio uploaded successfully');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
					else
					{
						echo "<script>alert('Server is down plz try again..');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
				}
				else
				{
					$query="insert into post(accounter_id,post_description,post_audio) values($id,'$description','$actual_audio')";
					$run=mysqli_query($this->con,$query);
					if($run==true)
					{
						// echo "<script>alert('audio uploaded successfully');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
					else
					{
						echo "<script>alert('Server is down plz try again..');</script>";
						echo "<script>window.location.href='home.php';</script>";
					}
				}
			}
		}
		else
		{
			echo "<script>alert('plz select the proper audio');</script>";
			echo "<script>window.location.href='home.php';</script>";
		}

	}
// end audio post

// fetch status
	public function fetchPost()
	{
		$id=$_SESSION['id'];
		// $query="select accounter_first_name,accounter_last_name,post_description,post_date,post_id from accounter a,post p where a.accounter_id=p.accounter_id group by post_date desc";
		$query="select p.*,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp from accounter a,post p,friend f,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=p.accounter_id and a.accounter_id=f.tos and f.status=1 and froms=$id
			 union
			  SELECT p.*,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp from accounter a,post p,friend f,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=p.accounter_id and a.accounter_id=f.froms and f.status=1 and tos=$id 
			  union
			  select p.*,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp from accounter a,post p,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=p.accounter_id and p.accounter_id=$id order by post_date desc;  
			  ";


		$run=mysqli_query($this->con,$query);

		while($row=mysqli_fetch_row($run))
		{
			$likecount=0;
			$unlikecount=0;
			$date=date('d-m-y ',strtotime($row[2]));

			
			$date2=date('j F,Y',strtotime($row[2]));
			$date3=date('g:ia',strtotime($row[2]));

			$date1=$date2." at ".$date3;
			// echo "$date1";


			// check like
			$checklike="select post_id,accounter_id from likes where post_id=$row[0]";

			$runchecklike=mysqli_query($this->con,$checklike);

			while($rowlike=mysqli_fetch_row($runchecklike))
			{
				if($rowlike[1]==$_SESSION['id'])
				{
					$likecount++;
				}
			}

			// end check like


			// check unlike
			$checkunlike="select post_id,accounter_id from unlike where post_id=$row[0]";

			$runcheckunlike=mysqli_query($this->con,$checkunlike);

			while($rowunlike=mysqli_fetch_row($runcheckunlike))
			{
				if($rowunlike[1]==$_SESSION['id'])
				{
					$unlikecount++;
				}
			}

			// end check unlike

			// check cmt
			$cmtquery="select count(*) from comments where post_id=$row[0]";
			$runcmt=mysqli_query($this->con,$cmtquery);
			$rowcmt=mysqli_fetch_row($runcmt);

			// end chk cmt
			$fetchlike="select count(*) from likes where post_id=$row[0]";
			$runlike=mysqli_query($this->con,$fetchlike);
			$likes=mysqli_fetch_row($runlike);

			$fetchunlike="select count(*) from unlike where post_id=$row[0]";
			$rununlike=mysqli_query($this->con,$fetchunlike);
			$unlikes=mysqli_fetch_row($rununlike);
			

			if($row[1]!="" && $row[3]==null  && $row[5]==null && $row[6]==null)
			{

				?>

						<div class="col-md-12" style="border: ;background-color:; ;padding:0 0px 10px 0" >

						<div class="col-md-12" style="background-color:white ;box-shadow: 1px 1px 1px gray; border:1px solid gray;padding-bottom: 10px; ">

	
							<p style="line-height:50px ;"><span style="font-size: 20px;font-family: calibri;text-transform: capitalize;"><img src="propic/<?= $row[9] ?>" width="50px" height="50px" style="border-radius:50% ;padding-top: 5px;">&nbsp;<?= $row[7]."&nbsp;".$row[8] ?></span><span style="color: #ccc;font-size: 12px;" class="uploaddate">&nbsp;&nbsp;&nbsp;&nbsp;<?= $date1 ?></span>
							<hr style="border:;font-size: 5px;"></p>

							
							
							<p ><h4 style="font-family: open sans;word-break: break-all;">"<?= $row[1]?>"</h4></p>
							
							<table class="" style="color:lightblue;padding: 0 0 0 0;">
								<tr>
								<!-- like button -->
									<td>
										<?php

											if($likecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small w3-hide-medium" disabled style="border:none;font-size: 20px;color: #07f40b;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large " disabled style="border:none;font-size: 15px;color: green;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small" style="border:none;font-size: 20px;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large" style="border:none;font-size: 15px;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>



												<?php
											}
										?>
									</td>
									<!-- unlike butto -->
									<td>
										<!-- <input type="hidden" name="post_id" value="<?= $row[0] ?>"> -->
										<?php

											if($unlikecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" disabled style="border:none;font-size: 20px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" disabled style="border:none;font-size: 14px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>

												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" style="border:none;font-size: 20px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" style="border:none;font-size: 15px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>



												<?php
											}
										?>
									</td>
									<td>
										<button class="btn btn-default w3-hide-small fa fa-commenting" data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 20px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										<button class="btn btn-default w3-hide-large fa fa-commenting" data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 15px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										
									</td>
								</tr>
								
							</table>
							<!-- comment section -->
							<div class="collapse comment<?= $this->i ?> " style="max-height: 300px;overflow-y: scroll;" id="post_scroll">
									<div class="fetchcmt">
											<div class="col-md-12">
												<table class="table">
													<?php
														

														$query_comment="SELECT accounter_dp,accounter_first_name,accounter_last_name,comment_desc from accounter a,accounter_details ad,comments c,post p where a.accounter_id=ad.accounter_id and a.accounter_id=c.accounter_id and c.post_id=p.post_id and c.post_id=$row[0]";

														$run_comment=mysqli_query($this->con,$query_comment);
														while($row_comment=mysqli_fetch_row($run_comment))
														{
															?>
																<div class="col-md-12" style="padding: 0 0 0 0;" >
																	<tr>
																		<td>
																			<span style="text-transform: capitalize;font-size: 20px;color: "><img src="propic/<?= $row_comment[0] ?>" width="50px" height="50px" style="border-radius: 50%;">&nbsp;&nbsp;<?= $row_comment[1] ?>&nbsp;<?= $row_comment[2] ?></span>
																			<br><br>
																			<span style="text-indent: 0px;font-size: 18px;color:gray; font-family: open sans"><i class="fa fa-reply"></i>&nbsp;<?= $row_comment[3] ?></span>
																		</td>
																	</tr>
																</div>
															<?php
														}
													?>

												</table>
											</div>
											<div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;padding: 0 0 0 0;">
												<form class="cmtform">
													<div class="col-md-10" style="padding: 0 0 0 0;">
															<input type="hidden" name="post_id" value="<?= $row[0] ?>">
															<textarea cols="4" required class="form-control" name="cmt" placeholder="write comment"></textarea>
																												
													</div>
													<div class="col-md-2 text-center" style="padding: 0 0 0 0;margin-top: 10px;">
															<button class="btn btn-success cmtbtn" type="submit">comment</button>
																													
													</div>
														
												</form>
											</div>
									</div>

								</div>
							<?php
								$this->i++;
							?>

							<!-- end comment section -->
						</div>
					</div>

				<?php
				
			}
			else if($row[3]!="" || $row[1]!="" && $row[5]==null && $row[6]==null)
			{
				?>
				<div class="col-md-12" style="border: ;background-color:; ;padding:0 0px 10px 0">
					
					<div class="col-md-12"  style="background-color:white ;box-shadow: 1px 1px 1px gray; border:1px solid gray;padding-bottom: 10px;">
						<p style="line-height:50px ;"><span style="font-size: 20px;font-family: calibri;text-transform: capitalize;"><img src="propic/<?= $row[9] ?>" width="50px" height="50px" style="border-radius:50% ;padding-top: 5px;">&nbsp;<?= $row[7]."&nbsp;".$row[8] ?></span><span style="color: #ccc;">&nbsp;&nbsp;&nbsp;&nbsp;<?= $date1 ?></span>
							<hr style="border:;font-size: 5px;"></p>


							<p><h4 style="font-family: open sans;word-break: break-all;"><?= $row[1]?></h4></p>
							<a href="post/<?= $row[3] ?>" target="_block">
							<div class="col-md-12 postpic11" style="padding: 0 0 0 0;">
							<img src="post/<?= $row[3] ?>" width="100%" class="img-thumbnail" title="<?= $row[7]?>&nbsp;<?= $row[8] ?>" style="transform: rotateX();">
							</div>
							</a>
							<div class="col-md-12">&nbsp;</div>
							<table class="">
								<tr>
								<!-- like button -->
									<td>
										<?php

											if($likecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small" disabled style="border:none;font-size: 20px;color: green;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large" disabled style="border:none;font-size: 15px;color: green;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small" style="border:none;font-size: 20px;;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large" style="border:none;font-size: 15px;;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>



												<?php
											}
										?>
									</td>
									<!-- unlike butto -->
									<td>
										<!-- <input type="hidden" name="post_id" value="<?= $row[0] ?>"> -->
										<?php

											if($unlikecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" disabled style="border:none;font-size: 20px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" disabled style="border:none;font-size: 14px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>

												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" style="border:none;font-size: 20px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" style="border:none;font-size: 15px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>



												<?php
											}
										?>
									</td>
									<td>
										<button class="btn btn-default w3-hide-small fa fa-commenting" data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 20px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										<button class="btn btn-default w3-hide-large fa fa-commenting"  data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 15px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										
									</td>
								</tr>
								
							</table>
							<!-- comment section -->
							<div class="collapse comment<?= $this->i ?> " style="max-height: 300px;overflow-y: scroll;" id="post_scroll">
									<div class="fetchcmt">
											<div class="col-md-12">
												<table class="table">
													<?php
														

														$query_comment="SELECT accounter_dp,accounter_first_name,accounter_last_name,comment_desc from accounter a,accounter_details ad,comments c,post p where a.accounter_id=ad.accounter_id and a.accounter_id=c.accounter_id and c.post_id=p.post_id and c.post_id=$row[0]";

														$run_comment=mysqli_query($this->con,$query_comment);
														while($row_comment=mysqli_fetch_row($run_comment))
														{
															?>
																<div class="col-md-12" style="padding: 0 0 0 0;" >
																	<tr>
																		<td>
																			<span style="text-transform: capitalize;font-size: 20px;color: "><img src="propic/<?= $row_comment[0] ?>" width="50px" height="50px" style="border-radius: 50%;">&nbsp;&nbsp;<?= $row_comment[1] ?>&nbsp;<?= $row_comment[2] ?></span>
																			<br><br>
																			<span style="text-indent: 0px;font-size: 18px;color:gray;background-color:; font-family: open sans"><i class="fa fa-reply"></i>&nbsp;<?= $row_comment[3] ?></span>
																		</td>
																	</tr>
																</div>
															<?php
														}
													?>

												</table>
											</div>
											<div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;padding: 0 0 0 0;">
												<form class="cmtform">
													<div class="col-md-10" style="padding: 0 0 0 0;">
															<input type="hidden" name="post_id" value="<?= $row[0] ?>">
															<textarea cols="4" required class="form-control" name="cmt" placeholder="write comment"></textarea>
																												
													</div>
													<div class="col-md-2 text-center" style="padding: 0 0 0 0;margin-top: 10px;">
															<button class="btn btn-success cmtbtn" type="submit">comment</button>
																													
													</div>
														
												</form>
											</div>
									</div>

								</div>
							<?php
								$this->i++;
							?>

							<!-- end comment section -->
					</div>
				</div>
				<?php
			}
			else if($row[5]!="" || $row[1]!="" &&  $row[3]==null && $row[6]==null)
			{
				?>
					<div class="col-md-12" style="border: ;background-color:; ;padding:0 0px 10px 0">
						<div class="col-md-12" style="background-color:white ;box-shadow: 1px 1px 1px gray; border:1px solid gray;padding-bottom: 10px;">
							<p style="line-height:50px ;"><span style="font-size: 20px;font-family: calibri;text-transform: capitalize;"><img src="propic/<?= $row[9] ?>" width="50px" height="50px" style="border-radius:50% ;padding-top: 5px;">&nbsp;<?= $row[7]."&nbsp;".$row[8] ?></span><span style="color: #ccc;">&nbsp;&nbsp;&nbsp;&nbsp;<?= $date1 ?></span>
							<hr style="border:;font-size: 5px;"></p>
							<p><h4 style="font-family: open sans;word-break: break-all;"><?= $row[1]?></h4></p>
							<!-- <p><?= $row[5] ?></p> -->
							<video src="postvideo/<?= $row[5] ?>" width="100%" controls></video>
							<table class="">
								<tr>
								<!-- like button -->
									<td>
										<?php

											if($likecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small" disabled style="border:none;font-size: 20px;color: green;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large" disabled style="border:none;font-size: 15px;color: green;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small" style="border:none;font-size: 20px;;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large" style="border:none;font-size: 15px;;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>



												<?php
											}
										?>
									</td>
									<!-- unlike butto -->
									<td>
										<!-- <input type="hidden" name="post_id" value="<?= $row[0] ?>"> -->
										<?php

											if($unlikecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" disabled style="border:none;font-size: 20px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" disabled style="border:none;font-size: 14px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>

												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" style="border:none;font-size: 20px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" style="border:none;font-size: 15px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>



												<?php
											}
										?>
									</td>
									<td>
										<button class="btn btn-default w3-hide-small fa fa-commenting" data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 20px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										<button class="btn btn-default w3-hide-large fa fa-commenting" data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 15px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										
									</td>
								</tr>
								
							</table>
							<!-- comment section -->
							<div class="collapse comment<?= $this->i ?> " style="max-height: 300px;overflow-y: scroll;" id="post_scroll">
									<div class="fetchcmt">
											<div class="col-md-12">
												<table class="table">
													<?php
														

														$query_comment="SELECT accounter_dp,accounter_first_name,accounter_last_name,comment_desc from accounter a,accounter_details ad,comments c,post p where a.accounter_id=ad.accounter_id and a.accounter_id=c.accounter_id and c.post_id=p.post_id and c.post_id=$row[0]";

														$run_comment=mysqli_query($this->con,$query_comment);
														while($row_comment=mysqli_fetch_row($run_comment))
														{
															?>
																<div class="col-md-12" style="padding: 0 0 0 0;" >
																	<tr>
																		<td>
																			<span style="text-transform: capitalize;font-size: 20px;color: "><img src="propic/<?= $row_comment[0] ?>" width="50px" height="50px" style="border-radius: 50%;">&nbsp;&nbsp;<?= $row_comment[1] ?>&nbsp;<?= $row_comment[2] ?></span>
																			<br><br>
																			<p style="text-indent: 0px;font-size: 18px;color:gray;background-color:; font-family: open sans"><i class="fa fa-reply"></i>&nbsp;<?= $row_comment[3] ?></p>
																		</td>
																	</tr>
																</div>
															<?php
														}
													?>

												</table>
											</div>
											<div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;padding: 0 0 0 0;">
												<form class="cmtform">
													<div class="col-md-10" style="padding: 0 0 0 0;">
															<input type="hidden" name="post_id" value="<?= $row[0] ?>">
															<textarea cols="4" required class="form-control" name="cmt" placeholder="write comment"></textarea>
																												
													</div>
													<div class="col-md-2 text-center" style="padding: 0 0 0 0;margin-top: 10px;">
															<button class="btn btn-success cmtbtn" type="submit">comment</button>
																													
													</div>
														
												</form>
											</div>
									</div>

								</div>
							<?php
								$this->i++;
							?>

							<!-- end comment section -->
						</div>
					</div>
				<?php
			}
			else if($row[6]!="" || $row[1]!="" && $row[3]==null && $row[5]==null)
			{
				?>
					<div class="col-md-12" style="border: ;background-color:; ;padding:0 0px 10px 0">
						<div class="col-md-12" style="background-color:white ;box-shadow: 1px 1px 1px gray; border:1px solid gray;padding-bottom: 10px;">
						<p style="line-height:50px ;"><span style="font-size: 20px;font-family: calibri;text-transform: capitalize;"><img src="propic/<?= $row[9] ?>" width="50px" height="50px" style="border-radius:50% ;padding-top: 5px;">&nbsp;<?= $row[7]."&nbsp;".$row[8] ?></span><span style="color: #ccc;">&nbsp;&nbsp;&nbsp;&nbsp;<?= $date1 ?></span>
							<hr style="border:;font-size: 5px;"></p>
							<p><h4 style="font-family: open sans;word-break: break-all;"><?= $row[1] ?></h4></p>
							<audio src="postaudio/<?= $row[6] ?>" width="" controls></audio>
							<br>
							<table class="">
								<tr>
								<!-- like button -->
									<td>
										<?php

											if($likecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small" disabled style="border:none;font-size: 20px;color: green;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large" disabled style="border:none;font-size: 15px;color: green;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-small" style="border:none;font-size: 20px;;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>
												<button class="fa fa-thumbs-up btn btn-default likesb w3-hide-large" style="border:none;font-size: 15px;;color:gray;"><span class="lks"><?= $likes[0] ?></span>likes</button>



												<?php
											}
										?>
									</td>
									<!-- unlike butto -->
									<td>
										<!-- <input type="hidden" name="post_id" value="<?= $row[0] ?>"> -->
										<?php

											if($unlikecount>0)
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" disabled style="border:none;font-size: 20px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" disabled style="border:none;font-size: 14px;color: red;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>

												<?php
											}
											else
											{
												?>
												<input type="hidden" name="post_id" value="<?= $row[0] ?>">
												
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-small" style="border:none;font-size: 20px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>
												<button class="fa fa-thumbs-down btn btn-default unlikesb w3-hide-large" style="border:none;font-size: 15px;color:gray;">&nbsp;<span class="ulks"><?= $unlikes[0] ?></span>&nbsp;unlike</button>



												<?php
											}
										?>
									</td>
									<td>
										<button class="btn btn-default w3-hide-small fa fa-commenting" data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 20px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										<button class="btn btn-default w3-hide-large fa fa-commenting" data-toggle="collapse" data-target=".comment<?= $this->i ?>" style="border:none;font-size: 15px;;color:gray;">
											<?= $rowcmt[0] ?>&nbsp;comments
										</button>
										
									</td>
								</tr>
								
							</table>
							<!-- comment section -->
							<div class="collapse comment<?= $this->i ?> " style="max-height: 300px;overflow-y: scroll;" id="post_scroll">
									<div class="fetchcmt">
											<div class="col-md-12 f">
												<table class="table ">
													<?php
														

														$query_comment="SELECT accounter_dp,accounter_first_name,accounter_last_name,comment_desc from accounter a,accounter_details ad,comments c,post p where a.accounter_id=ad.accounter_id and a.accounter_id=c.accounter_id and c.post_id=p.post_id and c.post_id=$row[0]";

														$run_comment=mysqli_query($this->con,$query_comment);
														while($row_comment=mysqli_fetch_row($run_comment))
														{
															?>
																<div class="col-md-12" style="padding: 0 0 0 0;" >
																	<tr>
																		<td>
																			<span style="text-transform: capitalize;font-size: 18px;color: "><img src="propic/<?= $row_comment[0] ?>" width="50px" height="50px" style="border-radius: 50%;">&nbsp;&nbsp;<?= $row_comment[1] ?>&nbsp;<?= $row_comment[2] ?></span>
																			<br><br>
																			<span style="text-indent: 0px;font-size: 18px;color:gray;background-color:; font-family: open sans"><i class="fa fa-reply"></i>&nbsp;<?= $row_comment[3] ?></span>
																		</td>
																	</tr>
																</div>
															<?php
														}
													?>

												</table>
											</div>
											<div class="col-md-12" style="margin-top: 10px;margin-bottom: 10px;padding: 0 0 0 0;">
												<form class="cmtform">
													<div class="col-md-10" style="padding: 0 0 0 0;">
															<input type="hidden" name="post_id" value="<?= $row[0] ?>">
															<textarea cols="4" required class="form-control" name="cmt" placeholder="write comment"></textarea>
																												
													</div>
													<div class="col-md-2 text-center" style="padding: 0 0 0 0;margin-top: 10px;">
															<button class="btn btn-success cmtbtn" type="submit">comment</button>
																													
													</div>
														
												</form>
											</div>
									</div>

								</div>
							<?php
								$this->i++;
							?>

							<!-- end comment section -->

						</div>


					</div>
				<?php
			}

			


			
		}
	}
// end fetch status


	
// do like

		public function doLike()
		{
			$post_id=$_POST['likebt'];
			$id=$_SESSION['id'];
			// echo "$post_id";


			$query="insert into likes(post_id,accounter_id) values($post_id,$id)";
			$run=mysqli_query($this->con,$query);

			if($run==true)
			{
				$fetchlike="select count(*) from likes where post_id=$post_id";
				$runlike=mysqli_query($this->con,$fetchlike);

				$likes=mysqli_fetch_row($runlike);

				echo $likes[0];
			}
			else
			{
				echo "error";
			}
		}

// end do like


// do unlike
			public function doUnlike()
			{
				$post_id=$_POST['unlikebt'];
					$id=$_SESSION['id'];
			// echo "$post_id";


				$query="insert into unlike(post_id,accounter_id) values($post_id,$id)";
				$run=mysqli_query($this->con,$query);

				if($run==true)
				{
					$fetchlike="select count(*) from unlike where post_id=$post_id";
					$runlike=mysqli_query($this->con,$fetchlike);

					$likes=mysqli_fetch_row($runlike);

					echo $likes[0];
				}
				else
				{
					echo "error";
				}
			}
// end do unlike


// do comment
	 public function doComment()	
	 {
	 	$id=$_SESSION['id'];
	 	$post_id=$_POST['post_id'];
	 	$cmt=$_POST['cmt'];

	 	// echo "$post_id $cmt";

	 	$query="insert into comments(post_id,accounter_id,comment_desc) values($post_id,$id,'$cmt')";
	 	$run=mysqli_query($this->con,$query);
	 	if($run==true)
	 	{
	 		$query_comment="SELECT accounter_dp,accounter_first_name,accounter_last_name,comment_desc from accounter a,accounter_details ad,comments c,post p where a.accounter_id=ad.accounter_id and a.accounter_id=c.accounter_id and c.post_id=p.post_id and c.post_id=$post_id order by comment_id desc";

			$run_comment=mysqli_query($this->con,$query_comment);
			$row_comment=mysqli_fetch_row($run_comment);
				?>

						<!-- <tr> -->
							<td>
								<span style="text-transform: capitalize;font-size: 20px;color: "><img src="propic/<?= $row_comment[0] ?>" width="50px" height="50px" style="border-radius: 50%;">&nbsp;&nbsp;<?= $row_comment[1] ?>&nbsp;<?= $row_comment[2] ?></span>
								<br><br>
								<span style="text-indent: 0px;font-size: 18px;color:gray;background-color:; font-family: open sans"><i class="fa fa-reply"></i>&nbsp;<?= $row_comment[3] ?></span>
							</td>
						<!-- </tr> -->
					
				<?php	
			
	 	}
	 	else
	 	{
	 		echo "bye";
	 	}
	 }
// end do comment

	// show friend

		public function addFriends()
		{
			$id=$_SESSION['id'];
			$query="select ad.accounter_id,accounter_first_name,accounter_last_name,accounter_dp from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id<>$id and status=0 ";

			$running_addfriend=mysqli_query($this->con,$query);

			while($fetching_addfriend=mysqli_fetch_row($running_addfriend))
			{
				$query="select count(*) from friend where froms=$id and tos=$fetching_addfriend[0]";

				$run=mysqli_query($this->con,$query);

				$row=mysqli_fetch_row($run);
				if($row[0]==0)
				{

					$query1="select count(*) from friend where tos=$id and froms=$fetching_addfriend[0]";

					$run1=mysqli_query($this->con,$query1);
					$row1=mysqli_fetch_row($run1);
					if($row1[0]==0)
					{
					 ?>
					  <div class="col-md-12 friend" style="border-bottom: 0.5px solid lightgray;font-size: 16px;padding-bottom: 10px;padding-left: 0px;padding-right:0px;">
						<input type="hidden" value="<?= $fetching_addfriend[0] ?>" name="friend_id" class="name1">
						<p style="line-height: 40px;">&nbsp;<img src="propic/<?= $fetching_addfriend[3] ?>" height="40px" class="" width="40px;" style="border-radius: 50%;">
						<span style="font-size: 18px;text-transform: capitalize;line-height: 30px;background-color:;"><?= "&nbsp".$fetching_addfriend[1]."&nbsp;".$fetching_addfriend[2] ?></span></p>
						&nbsp;<button class="btn btn-success check" style="height: 30px;line-height: 15px;">Make</button>
						&nbsp;<button class="btn btn-danger hide1" style="height: 30px;line-height: 15px;">Remove</button>
						<span style="font-size: 15px;color: silver;" class="remove">&nbsp;&nbsp;friend request sent</span>
					</div>
					 <?php
					}

				}



				?>

					


				<?php
			}

		}


	// end show friends


		// adding friend to database
			public function sendRequest()
			{
				$id=$_SESSION['id'];
				$id2=$_POST['postid'];

				$query="insert into friend(froms,tos) values($id,$id2)";

				$running_sendRequest=mysqli_query($this->con,$query);

				if($running_sendRequest==true)
				{
					echo "friend requset sent";
				}
				else
				{
					echo "error";
				}

				// echo "$id2";


			}
		// end  adding friend to database




		// show friend requset

			public function showFriendRequest()
			{
				$id=$_SESSION['id'];
				$query="select count(*) from friend where tos='$id' and status=0";

				$run=mysqli_query($this->con,$query);

				$fetch_row=mysqli_fetch_row($run);

				   if($fetch_row[0]==0)
				   {

				   }
				   else
				   {
					?>
							<span class="badge btn-danger" style="background-color: red;margin-left: -10px;"><?=$fetch_row[0]?></span>
					<?php
					}
				
			}

			// end show friend requset
				
			// show friend request list

				public function showFriendRequestList()
				{
					
								
					
					$id=$_SESSION['id'];
					// $query="select accounter_first_name,accounter_last_name,accounter_id from accounter where accounter_id in(select froms from friend where tos=$id and status=0)";
					$query="select accounter_first_name,accounter_last_name,accounter.accounter_id,accounter_dp,accounter_cover_photo from accounter ,accounter_details where accounter.accounter_id=accounter_details.accounter_id and accounter.accounter_id in(select froms from friend where tos=$id and status=0)"; 

					$run=mysqli_query($this->con,$query);

					while($fetch_row=mysqli_fetch_row($run))
					{
						?>
							<div style="border-bottom: 2px gray;background-image: url('coverpic/<?=$fetch_row[4]?>'); 
    background-position: center; background-size: 550px 250px;height: 150px;text-transform: capitalize;margin-top: 2px;" class="friendrequest">
								<td>
								<!-- <?= $fetch_row[4] ?> -->
								<img src="propic/<?=$fetch_row[3]?>" height="40px" width="40px" class="img-circle">&nbsp;&nbsp;<span style="font-size: 25px;padding-top: 10px;color: white;">
								<?= $fetch_row[0]."&nbsp;".$fetch_row[1] ?></span><br><br>
								<p><input type="hidden" value="<?= $fetch_row[2] ?>" name="">&nbsp;&nbsp;&nbsp;&nbsp;
								<button class="btn btn-success accept">Accept</button>&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger reject">reject</button>
								<span class="remove" style="color: silver">request accepted</span>
								</p>
								</td>
							</div>
						<?php
					}
				}
			// end friend request list
				// accept friends
					public function acceptFriend()
					{
						$id=$_SESSION['id'];
						$reciver_id=$_POST['reciver_id'];
						// echo $reciver_id;

						$query="update friend set status=1 where froms=$reciver_id and tos=$id";

						$run=mysqli_query($this->con,$query);

						if($run==true)
						{
							echo "Updated";
						}
						else
						{
							echo "not";
						}
					}

				// end accept friends

						// reject friend
						public function rejectFriend()
						{
							$id=$_SESSION['id'];
							$sender_id=$_POST['reject_id'];

							// echo "$sender_id";

							$query="delete from friend where froms=$sender_id and tos=$id";
							$run=mysqli_query($this->con,$query);

							if($run==true)
							{
								echo "hi";
							}
							else
							{
								echo "bye";
							}
						}

						// end reject friend


					// propic 

					public function profilePic()
					{
						$id=$_SESSION['id'];
						$query="select accounter_gender from accounter where accounter_id=$id";

						$runprofilePic=mysqli_query($this->con,$query);

						$row=mysqli_fetch_row($runprofilePic);

						if($row[0]=="male")
						{
							$query="select accounter_dp from accounter_details where accounter_id=$id";

							$runMale=mysqli_query($this->con,$query);

							$fetch=mysqli_fetch_row($runMale);

							if($fetch[0]==null)
							{

								echo "<img src='propic/male1.png' height='150px' width='60px' style='border-radius: 50%;' class='img-thumbnail '>";
							}
							else
							{

								?>
									<img src="propic/<?=$fetch[0]?>" height='50px' width='50px' style='border-radius:50%;' class=''>
								<?php
							}
						}
						else if($row[0]=="female")
						{
							$query="select accounter_dp from accounter_details where accounter_id=$id";

							$runMale=mysqli_query($this->con,$query);

							$fetch=mysqli_fetch_row($runMale);

							if($fetch[0]==null)
							{

								echo "<img src='propic/female.png' height='60px' width='60px' style='border-radius: 50%;' class='img-thumbnail img-circle'>";
							}
							else
							{

								?>
									<img src="propic/<?=$fetch[0]?>" height='60px'  width='60px' style='border-radius: 50%;' class='img-thumbnail img-circle'>
								<?php
							}
						}

							
					}


					// end propic

					// cover pic
						public function coverPic()
						{
							$id=$_SESSION['id'];
							$query="select accounter_cover_photo from accounter_details where accounter_id='$id'";

							$runcoverpic=mysqli_query($this->con,$query);
							$row=mysqli_fetch_row($runcoverpic);


							?>

							<div class="w3-display-container" style="padding-left: 0px;padding-right: 0px;background-color: ;">
								<img src="coverPic/<?= $row[0]?>" name="img" width="100%" style="max-height: 300px;">
								<div class="w3-display-topright w3-red w3-padding-4 cover"><a href="#"><i class="fa fa-pencil" style="font-size: 25px;color:;" title="update cover photo"></i></a></div>
								
								<?php
									$query="select accounter_gender from accounter where accounter_id=$id";

									$runprofilePic=mysqli_query($this->con,$query);

									$row=mysqli_fetch_row($runprofilePic);

									if($row[0]=="male")
									{
										$query="select accounter_dp from accounter_details where accounter_id=$id";

										$runMale=mysqli_query($this->con,$query);

										$fetch=mysqli_fetch_row($runMale);

										if($fetch[0]!=null)
										{
											$query="select accounter_dp,accounter_first_name,accounter_last_name from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=$id";
											$run=mysqli_query($this->con,$query);
											$row=mysqli_fetch_row($run);
											?>

												<div class="w3-display-bottomleft profile" style="padding-left: 10px;padding-bottom: 5px;">
													<img src="propic/<?= $row[0]?>" width="20%;" class="w3-circle w3-border w3-hide-large">
													<img src="propic/<?= $row[0]?>" width="20%" class="w3-circle w3-border w3-hide-small w3-hide-medium">
												</div>
												<div class="w3-display-bottomright" style="text-transform: capitalize;padding-right: 30px;color: white;">
													<h1><?= "&nbsp;&nbsp;".$row[1]."<br>".$row[2] ?></h1>
												</div>
											<?php
											
											
										}
										else
										{
											?>
											<div class="w3-display-bottomleft profile" style="padding-left: 10px;padding-bottom: 5px;">
												<img src="propic/male1.png" width="20%;" class="w3-circle w3-border w3-hide-large">
												<img src="propic/male1.png" width="40%;" class="w3-circle w3-border w3-hide-small">
											</div>
											<div class="w3-display-bottomright" style="text-transform: capitalize;padding-right: 30px;color: white;">
													<h1><?= "&nbsp;&nbsp;".$row[1]."<br>".$row[2] ?></h1>
												</div>
											<?php
											
										}
									}
									else if($row[0]=="female")
									{
										$query="select accounter_dp from accounter_details where accounter_id=$id";

										$runMale=mysqli_query($this->con,$query);

										$fetch=mysqli_fetch_row($runMale);

										if($fetch[0]!=null)
										{
											$query="select accounter_dp,accounter_first_name,accounter_last_name from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=$id";
											$run=mysqli_query($this->con,$query);
											$row=mysqli_fetch_row($run);
											?>

												<div class="w3-display-bottomleft profile" style="padding-left: 10px;padding-bottom: 5px;">
													<img src="propic/<?= $row[0]?>" width="20%;" class="w3-circle w3-border w3-hide-large">
													<img src="propic/<?= $row[0]?>" width="20%" class="w3-circle w3-border w3-hide-small w3-hide-medium">
												</div>
												<div class="w3-display-bottomright" style="text-transform: capitalize;padding-right: 30px;color: white;">
													<h1><?= "&nbsp;&nbsp;".$row[1]."<br>".$row[2] ?></h1>
												</div>
											<?php
											
											
										}
										else
										{
											?>
											<div class="w3-display-bottomleft profile" style="padding-left: 10px;padding-bottom: 5px;">
												<img src="propic/female.png" width="20%;" class="w3-circle w3-border w3-hide-large">
												<img src="propic/female.png" height="100px" width="100px" class="w3-circle w3-border w3-hide-small">
											</div>
											<div class="w3-display-bottomright" style="text-transform: capitalize;padding-right: 30px;color: white;">
													<h1><?= "&nbsp;&nbsp;".$row[1]."<br>".$row[2] ?></h1>
												</div>
											<?php
											
										}
									}

								?>
								


							</div>
							<div class="col-md-12 input1x" style="margin-top: 20px;padding: 0 0 0 0;background-color: white;opacity: .8">
								<?php
									$id=$_SESSION['id'];
									$query="select * from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=$id";

									$run=mysqli_query($this->con,$query);

									$row=mysqli_fetch_row($run);

									?>

									<table class="table table-hover table-bordered">
										<tr>
											<td>
												<i class="fa fa-envelope" style="font-size: 18px;"> <strong>Email</strong>&nbsp;</i><span class="pull-right">&nbsp;&nbsp;&nbsp;</span><input type="text" name="user_email" value="<?= $row[3] ?>" class="email pull-right" readonly style="border: none;">
											</td>
										</tr>
										<tr>
											<td>
											<form method="post" action="main.php">
													<i class="fa fa-phone" style="color: green;font-size: 20px;"></i>&nbsp;<strong ><i>Contact</i></strong>&nbsp;</i>
													<span class="pull-right" ><i class="fa fa-pencil edit" data-id="<?= $row[5] ?>"></i><button class="btn btn-success save" type="submit" name="update_contact">save</button></span><input type="text" maxlength="11" required minlength="10" name="user_contact" value="<?= $row[5] ?>" readonly class="<?= $row[5] ?> pull-right" style="border:none;" >
											</form>
											</td>
										</tr>
										<tr>
											<td>
												
												<?php
													if($row[6]=="male")
													{
														echo "<i class='fa fa-male'></i>&nbsp;<strong><i>Gender</i></strong>&nbsp;";
														echo "<span class='pull-right'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class='pull-right'>male</span>";
													}
													else if($row[6]=="female")
													{
														echo "<i class='fa fa-female'></i><strong><i>Gender</i></strong>";
														echo "<span class='pull-right'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class='pull-right'>female</span>";
													}

												?>
											</td>
										</tr>

										<tr>
											<td>
												<form method="post" action="main.php">
												<i class="fa fa-location-arrow" style="color: blue;font-size: 20px;"></i>&nbsp;<strong><i>Address</i></strong>&nbsp;

												<span class="pull-right"><i class="fa fa-pencil edit" data-id="<?= $row[10] ?>"></i><button class="btn btn-success save" type="submit" name="update_address">save</button></span>
												<input type="text" name="user_address" value="<?= $row[10] ?>" readonly style="border: none;" class="<?= $row[10] ?> pull-right">
											</form>
											</td>
										</tr>
										<tr>
											<td>
												<form method="post" action="main.php">
												<i class="fa fa-flag" style="color: orange;font-size: 20px;"></i>&nbsp;<strong><i>Nationality</i></strong>
												
												<span class="pull-right"><i class="fa fa-pencil edit" data-id="<?= $row[13] ?>"></i><button class="btn btn-success save">save</button></span>
												<input type="text" name="user_nationality" value="<?= $row[13] ?>" readonly style="border: none" class="<?= $row[13] ?> pull-right">
											</form>
											</td>
										</tr>
										<tr>
											<td>
												<form method="post" action="main.php">
												<i class="fa fa-language" style="color: darkgreen;font-size: 20px;"></i>&nbsp;<strong>Language</strong>
												<span class="pull-right"><i class="fa fa-pencil edit" data-id="<?= $row[14] ?>"></i><button class="btn btn-success save">save</button></span>

												<input type="text" name="user_language" value="<?= $row[14] ?>" style="border: none;"  class="<?= $row[14] ?> pull-right">

												</form>
											</td>
										</tr>
										<tr>
											<td>
												<form method="post" action="main.php">
													<i class="fa fa-birthday-cake" style="color: red;font-size: 20px;"></i>&nbsp;<strong>DOB</strong>
														<span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil edit" data-id="<?= $row[16] ?>"></i><button class="btn btn-success save">save</button></span>
														<input type="date" name="user_dob" value="<?= $row[16] ?>" readonly style="border: none;" class="<?= $row[16] ?> pull-right">
												</form>
											</td>
										</tr>
										<tr>
											<td>
												<i class="fa fa-key" style="color: ;font-size: 20px;"></i>&nbsp;<strong>password</strong>
												<span class="pull-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-pencil changepassword" data-id="<?= $row[16] ?>"></i></span>
														
											</td>
										</tr>
									</table>
									<?php



								?>
							</div>
							<?php
						}
					// end cover pic


//updating the user

public function updateContact()
{
	$contact=$_POST['user_contact'];
	// echo "$contact";
	$id=$_SESSION['id'];
	$query="update accounter set accounter_contact=$contact where accounter_id=$id";
	$run=mysqli_query($this->con,$query);

	if($run==true)
	{
		header('location:userprofile.php');
	}
	else
	{
		echo "bye";
	}
}

public function updateAddress()
{
	$address=$_POST['user_address'];
	$id=$_SESSION['id'];
	echo "$address";
	mysqli_query($this->con,"update accounter_details set accounter_address='$address' where accounter_id=$id");

	header('location:userprofile.php');
}

public function updateNationality()
{
	$id=$_SESSION['id'];
	$Nationality=$_POST['user_nationality'];

	// echo "$Nationality";

	mysqli_query($this->con,"update accounter_details set accounter_nationality='$Nationality' where accounter_id=$id");

	header('location:userprofile.php');
}

public function updateLanguage()
{
	$id=$_SESSION['id'];
	$language=$_POST['user_language'];
	// echo "$language";

	mysqli_query($this->con,"update accounter_details set accounter_language='$language' where accounter_id=$id");

	header('location:userprofile.php');

}

public function updateDob()
{
	$id=$_SESSION['id'];
	$dob=$_POST['user_dob'];
	// echo "$dob";

	mysqli_query($this->con,"update accounter_details set accounter_DOB='$dob' where accounter_id=$id");

	header('location:userprofile.php');
}
// end user information update


// update profile pic

public function updateProfile()
{
	$id=$_SESSION['id'];
	$actualpic=$_FILES['profile']['name'];
	$temppic=$_FILES['profile']['tmp_name'];
	$path="propic/".$actualpic;

	$ext=pathinfo($path,PATHINFO_EXTENSION);

	if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
	{
		$move=move_uploaded_file($temppic,$path);
		if($move==true)
		{
			$query="update accounter_details set accounter_dp='$actualpic' where accounter_id=$id";

			$run=mysqli_query($this->con,$query);
			echo "<script>window.location.href='userprofile.php';</script>";

		}
	}
	else
	{
		echo "<script>alert('plz select proper extension');</script>";
		echo "<script>window.location.href='userprofile.php';</script>";
	}


	
}

// end updating profile pic

// update cover photo
	public function updateCover()
{
	$id=$_SESSION['id'];
	$actualpic=$_FILES['cover']['name'];
	$temppic=$_FILES['cover']['tmp_name'];
	$path="coverpic/".$actualpic;

	$ext=pathinfo($path,PATHINFO_EXTENSION);

	if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
	{
		$move=move_uploaded_file($temppic,$path);
		if($move==true)
		{
			$query="update accounter_details set accounter_cover_photo='$actualpic' where accounter_id=$id";

			$run=mysqli_query($this->con,$query);
			echo "<script>window.location.href='userprofile.php';</script>";

		}
	}
	else
	{
		echo "<script>alert('plz select proper extension');</script>";
		echo "<script>window.location.href='userprofile.php';</script>";
	}


	
}							
// end cover photo
// profile

public function profile()
{
$id=$_SESSION['id'];

$query="select * from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id='$id'";

$running_profile=mysqli_query($this->con,$query);

while($fetch_profile=mysqli_fetch_row($running_profile))
{
echo $fetch_profile[1];
}
}

// end profile






// show images
public function showImages()
{
	$id=$_SESSION['id'];
	$query="select post_id,post_description,post_img from post p,accounter a where p.accounter_id=a.accounter_id and a.accounter_id=$id";
	$run=mysqli_query($this->con,$query);
	while($row=mysqli_fetch_row($run))
	{
		$fetchlike="select count(*) from likes where post_id=$row[0]";
		$runlike=mysqli_query($this->con,$fetchlike);
		$likes=mysqli_fetch_row($runlike);

		$fetchunlike="select count(*) from unlike where post_id=$row[0]";
		$rununlike=mysqli_query($this->con,$fetchunlike);
		$unlikes=mysqli_fetch_row($rununlike);

		$commentquery="select count(*) from comments where post_id=$row[0]";
		$runcmt=mysqli_query($this->con,$commentquery);
		$cmt=mysqli_fetch_row($runcmt);
		if($row[2]!=null && $row[1]!=null)
		{
		?>
			<div class="col-md-4" style="font-size: 15px;">
				<div class="col-md-12 " style="padding:10px 12px;background-color: white;box-shadow: 1px 2px 1px gray;">
					<img src="post/<?= $row[2] ?>" width="100%" style="" class="img-thumbnail"><br>
						<p style="word-break: break-all;font-size: 15px;"><?= $row[1] ?></p>
						<table class="table text-center">
							<tr>
								<td><span class="fa fa-thumbs-up" style="color: green;"> <?= $likes[0] ?></span></td>
								<td><span class="fa fa-thumbs-down" style="color: red;"> <?= $unlikes[0] ?></span></td>
								<td><span class="fa fa-commenting" style="color: skyblue;"> <?= $cmt[0] ?></span></td>
							</tr>
						</table>

				</div>

			</div>
			<?php

		}
		else if($row[1]==null && $row[2]!=null)
		{
		?>
		<div class="col-md-4" style="font-size: 20px;background-color:;padding:;padding-bottom: 0px;">
			<div class="col-md-12 change" style="padding:10px;background-color: white;box-shadow: 1px 2px 1px gray;">
				<img src="post/<?= $row[2] ?>" width="100%" style="" class="img-thumbnail"><br>
					<p></p>
					<table class="table text-center">
							<tr>
								<td><span class="fa fa-thumbs-up" style="color: green;">&nbsp;<?= $likes[0] ?></span></td>
								<td><span class="fa fa-thumbs-down" style="color: red;">&nbsp;<?= $unlikes[0] ?></span></td>
								<td><span class="fa fa-commenting" style="color: skyblue;">&nbsp;<?= $cmt[0] ?></span></td>

							</tr>
						</table>

			</div>

		</div>
		<?php
		}
	}


}
// end show images

			// show video
			public function showVideos()
			{
				$id=$_SESSION['id'];
				$query="select post_id,post_description,post_video from post p,accounter a where p.accounter_id=a.accounter_id and a.accounter_id=$id";
				$run=mysqli_query($this->con,$query);
				while($row=mysqli_fetch_row($run))
				{
					$fetchlike="select count(*) from likes where post_id=$row[0]";
					$runlike=mysqli_query($this->con,$fetchlike);
					$likes=mysqli_fetch_row($runlike);

					$fetchunlike="select count(*) from unlike where post_id=$row[0]";
					$rununlike=mysqli_query($this->con,$fetchunlike);
					$unlikes=mysqli_fetch_row($rununlike);

					$commentquery="select count(*) from comments where post_id=$row[0]";
					$runcmt=mysqli_query($this->con,$commentquery);
					$cmt=mysqli_fetch_row($runcmt);
					if($row[2]!=null && $row[1]!=null)
					{
						?>
							<div class="col-md-6" style="font-size: 20px;background-color:;padding:;padding-bottom: 10px;">
								<div class="col-md-12 change" style="padding:10px;background-color: white;box-shadow: 1px 2px 1px gray;">
									<!-- <img src="post/<?= $row[2] ?>" width="100%" style="" class="img-thumbnail"><br> -->
									<video src="postvideo/<?= $row[2] ?>" width="100%" autocontrols></video>
										<p><?= $row[1] ?></p>
										<table class="table text-center">
											<tr>
											<td><span class="fa fa-thumbs-up" style="color: green;"><?= $likes[0] ?></span></td>
											<td><span class="fa fa-thumbs-down" style="color: red;"><?= $unlikes[0] ?></span></td>
											<td><span class="fa fa-commenting" style="color: skyblue;"><?= $cmt[0] ?></span></td>

										</tr>
										</table>

								</div>

							</div>
						<?php
						
					}
					else if($row[1]==null && $row[2]!=null)
					{
						?>
							<div class="col-md-6" style="font-size: 20px;background-color:;padding:;padding-bottom: 10px;">
								<div class="col-md-12 change" style="padding:10px;background-color: white;box-shadow: 1px 2px 1px gray;">
									<video src="postvideo/<?= $row[2] ?>" width="100%" controls class="img-thumbnail"></video>
									
										<p></p>
										<table class="table text-center">
											<tr>
											<td><span class="fa fa-thumbs-up" style="color: green;"><?= $likes[0] ?></span></td>
											<td><span class="fa fa-thumbs-down" style="color: red;"><?= $unlikes[0] ?></span></td>
											<td><span class="fa fa-commenting" style="color: skyblue;"><?= $cmt[0] ?></span></td>

										</tr>
										</table>

								</div>

							</div>
						<?php
					}
				}


			}
				// end show video	



				// show audio	
				public function showAudios()
			{
				$id=$_SESSION['id'];

				$querytotal="select count(*) from post where accounter_id=$id";
				$query="select post_id,post_description,post_audio,post_date from post p,accounter a where p.accounter_id=a.accounter_id and a.accounter_id=$id";
				$run=mysqli_query($this->con,$query);
				while($row=mysqli_fetch_row($run))
				{
					$date=date('F j,Y',strtotime($row[3]));
					$fetchlike="select count(*) from likes where post_id=$row[0]";
					$runlike=mysqli_query($this->con,$fetchlike);
					$likes=mysqli_fetch_row($runlike);

					$fetchunlike="select count(*) from unlike where post_id=$row[0]";
					$rununlike=mysqli_query($this->con,$fetchunlike);
					$unlikes=mysqli_fetch_row($rununlike);

					$commentquery="select count(*) from comments where post_id=$row[0]";
					$runcmt=mysqli_query($this->con,$commentquery);
					$cmt=mysqli_fetch_row($runcmt);
					if($row[2]!=null && $row[1]!=null)
					{
						?>
							<div class="col-md-6" style="font-size: 20px;background-color:;padding:;padding-bottom: 5px;">
								<div class="col-md-12" style="padding:0px;background-color: white">

										<p style="font-size: 14px;color: #ccc;" class="" ><span style="color: black;font-size: 18px;word-wrap: break-word;"><?= $row[1] ?></span>&nbsp;<span class="pull-right"><?= $date ?></span></p>
										<hr>
									<!-- <img src="post/<?= $row[2] ?>" width="100%" style="" class="img-thumbnail"><br> -->
									<audio src="postaudio/<?= $row[2] ?>" width="100%" controls></audio>
										
									<div class="col-md-12" style="background-color: ;">
										<table class="table text-center">
											<tr>
											<td><span class="fa fa-thumbs-up" style="color: green;"><?= $likes[0] ?></span></td>
											<td><span class="fa fa-thumbs-down" style="color: red;"><?= $unlikes[0] ?></span></td>
											<td><span class="fa fa-commenting" style="color: skyblue;"><?= $cmt[0] ?></span></td>

										</tr>
										</table>
									</div>	

								</div>

							</div>
						<?php
						
					}
					else if($row[1]==null && $row[2]!=null)
					{
						?>
							<div class="col-md-6" style="font-size: 20px;background-color:;padding:;padding-bottom: 10px;">
								<div class="col-md-12" style="padding:10px;background-color: white">
								<br>
									<audio src="postaudio/<?= $row[2] ?>" width="100%" controls class=""></audio>
									
										<p></p>
										<tr>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-thumbs-up" style="color: green;"><?= $likes[0] ?></span></td>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-thumbs-down" style="color: red;"><?= $unlikes[0] ?></span></td>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-commenting" style="color: skyblue;"><?= $cmt[0] ?></span></td>

										</tr>

								</div>

							</div>
						<?php
					}
				}


			}
				// end show audio	
			// fetching friends
			public function fetchFriends()
			{
				$id=$_SESSION['id'];
				$querytotal="SELECT count(*) from friend where  friend.tos=1 or friend.froms=$id and friend.status=$id";
				$runtotal=mysqli_query($this->con,$querytotal);
				$rowtotal=mysqli_fetch_row($runtotal);

				?>
				

				<?php
				$query="select a.accounter_id,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp,ad.accounter_cover_photo from accounter a,friend f,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=f.tos and f.froms=$id and f.status=1
			  		union
			  		select a.accounter_id,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp,ad.accounter_cover_photo from accounter a,friend f,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=f.froms  and f.tos=$id and f.status=1";

			  		$run=mysqli_query($this->con,$query);

			  		while($row=mysqli_fetch_row($run))
			  		{
			  			?>

			  			<div class="col-md-6" style="border-bottom: ;padding-bottom: 10px;padding-top: 10px;margin-top: 10px; background-color:;">
				  				
				  			<div class="col-md-12 change" style="background-color: white;padding:0 0 0 0;cursor: pointer; box-shadow: 1px 2px 1px gray;" title="<?= $row[1] ?>&nbsp;<?= $row[2] ?>">
									
					  			<div class="col-md-12 w3-display-container" style="padding: 0 0 0 0;">
					  				<div class="col-md-12 zoom" style="padding: 0 0 0 0;">
					  					<img src="coverpic/<?= $row[4] ?>" width="100%" style="height: 200px;">
					  				</div>
					  					<img src="propic/<?= $row[3] ?>" width="20%" class="img-circle w3-display-bottomleft img-thumbnail img1" style="margin-left: 2%;margin-top: -5%;">
					  			</div>
					  			<div class="col-md-12" style="text-transform: capitalize;">
					  				<br>

					  				<p style="font-size: 20px;color: blue;font-family: arial"><?= $row[1] ?>&nbsp;<?= $row[2] ?><input type="hidden" name="" value="<?= $row[0] ?>"><span class="pull-right unfriend" style="font-size: 16px;color: green;" title="unfriend" data-toggle="popoverfriend" data-trigger="hover" data-content="<?= $row[1] ?>&nbsp;<?= $row[2] ?>" data-placement="left">friend</span></p>
					  			</div>				  				
				  			</div>

			  			</div>
			  			<?php
			  		}

			}
			// end fetching friends





// searching friend

   public function searchFriend()
   {
	   	$id=$_SESSION['id'];

	   	$query="select a.accounter_id,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp,a.accounter_email,a.accounter_contact from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and status=0 and a.accounter_id<>$id order by a.accounter_first_name asc";

	   	$run=mysqli_query($this->con,$query);
	   	?>

	   		<table class="table table-hover" id="search1" style="text-transform: capitalize;font-size: 20px;font-family: calibri;">
	   			<!-- <thead><tr><thead>Search result</thead></tr></thead> -->
	   			<tbody>
	   			<?php

	   				while($row=mysqli_fetch_row($run))
	   				{
	   					$checkfriend="select count(*) from friend where froms=$id and tos=$row[0] or tos=$id and froms=$row[0] ";


	   					$runchkfrnd=mysqli_query($this->con,$checkfriend);
	   					$rowchk=mysqli_fetch_row($runchkfrnd);


	   					if($rowchk[0]>0)
	   					{
	   						?>
	   							<tr>
	   								<td style="line-height: 50px;padding-top: 20px;padding-bottom: 20px;">
		   								<img src="propic/<?= $row[3] ?>" height="50px" width="50px" style="border-radius: 50%;" >
		   								<?php
		   									$name=$row[1]." ".$row[2];
		   								?>
		   								<span style="padding-left: 10px;"><?php echo $name; ?></span>
		   								<button class="btn btn-success pull-right" style="top: 20px;">Friend</button>
	   								</td>
	   							</tr>
	   						<?php
	   					}
	   					else
	   					{
	   						?>


	   							<tr style="padding-top: 20px;padding-bottom: 20px;">
	   								<td style="padding-top: 20px;padding-bottom: 20px;">
	   								   <img src="propic/<?= $row[3] ?>" height="50px" width="50px" style="border-radius: 50%;" ><span><?= $row[1] ?>&nbsp;<?= $row[2] ?></span><br><br>
	   								   <input type="hidden" name="search_accounter_id" value="<?= $row[0] ?>">
	   								   <button class="btn btn-success check">make</button>
	   								   <span style="font-size: 15px;color: silver;" class="remove">&nbsp;&nbsp;friend request sent</span>
	   								</td>
	   							</tr>
	   						<?php
	   					}
	   				}
	   			?>
	   			</tbody>
	   		</table>

	   		<?php
  	}

// end searching friend




  // searching friends1

  		public function searchFriend1()
  		{
  			$val=$_POST['search1234'];
  			$id=$_SESSION['id'];
  			$query="select a.accounter_id,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp,a.accounter_email,a.accounter_contact from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and status=0 and a.accounter_id<>$id AND a.accounter_first_name like '$val%'";


  			$run=mysqli_query($this->con,$query);
  			?>

	   		<table class="table table-hover" id="search1" style="text-transform: capitalize;font-size: 20px;font-family: calibri;">

	   			<script type="text/javascript">
	   				$(document).ready(function(){

	   					$(".remove").hide();
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
	   				})
	   			</script>
  				<tbody>
  					<?php

  						while($row=mysqli_fetch_row($run))
  						{
  							$checkfriend="select count(*) from friend where froms=$id and tos=$row[0] or tos=$id and froms=$row[0] ";


	   					$runchkfrnd=mysqli_query($this->con,$checkfriend);
	   					$rowchk=mysqli_fetch_row($runchkfrnd);


	   					if($rowchk[0]>0)
	   					{
	   						?>
	   							<tr>
	   								<td style="line-height: 50px;padding-top: 20px;padding-bottom: 20px;">
		   								<img src="propic/<?= $row[3] ?>" height="50px" width="50px" style="border-radius: 50%;" >
		   								<?php
		   									$name=$row[1]." ".$row[2];
		   								?>
		   								<span style="padding-left: 10px;"><?php echo $name; ?></span>
		   								<button class="btn btn-success pull-right" style="top: 20px;">Friend</button>
	   								</td>
	   							</tr>
	   						<?php
	   					}
	   					else
	   					{
	   						?>


	   							<tr style="padding-top: 20px;padding-bottom: 20px;">
	   								<td style="padding-top: 20px;padding-bottom: 20px;">
	   								   <img src="propic/<?= $row[3] ?>" height="50px" width="50px" style="border-radius: 50%;" ><span><?= $row[1] ?>&nbsp;<?= $row[2] ?></span><br><br>
	   								   <input type="hidden" name="search_accounter_id" value="<?= $row[0] ?>">
	   								   <button class="btn btn-success check">make</button>
	   								   <span style="font-size: 15px;color: silver;" class="remove">&nbsp;&nbsp;friend request sent</span>
	   								</td>
	   							</tr>
	   						<?php
	   					}
  						}


  					?>
  				</tbody>

  			<?php

  			



  		}

  // end searching friends1






 // chatting section
			// show friends
			public function showFriends()
			{
				$id=$_SESSION['id'];

 
			  $query="select a.accounter_id,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp from accounter a,friend f,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=f.tos and f.froms=$id and f.status=1
			  		union
			  		select a.accounter_id,a.accounter_first_name,a.accounter_last_name,ad.accounter_dp from accounter a,friend f,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=f.froms  and f.tos=$id and f.status=1";
			  	$run=mysqli_query($this->con,$query);
			  	?>

			  		<table class="table" style="text-transform: capitalize;" id="hoveractive">
			  			<?php

			  				while($row=mysqli_fetch_row($run))
			  				{
			  					$q="select status from active where accounter_id=$row[0]";
			  					$r=mysqli_query($this->con,$q);
			  					$active=mysqli_fetch_row($r);


			  					
			  					?>

			  						<tr style="opacity: .7;background-color: white;cursor: pointer;" >
			  							<td  class="msg"><input type="hidden" name="id" value="<?= $row[0] ?>"><img src="propic/<?= $row[3] ?>" height="40px" width="40px">&nbsp;<?= $row[1] ?>&nbsp;&nbsp;<?= $row[2] ?></td><td><?php if($active[0]==1){

			  										?>
			  										<div style="width: 10px;height: 10px;background-color: green;margin-top: 15px;" class="img-circle">
			  											
			  										</div>
			  										<?php
			  								} ?></td>
			  						</tr>

			  					<?php
			  					
			  				}
			  			?>
			  		</table>

			  	<?php
			}
			// end show friends


			// text msg

				public function viewMsg()
				{
					$sender_id=$_SESSION['id'];
					$receiver_id=$_POST['receiver_id'];

					$_SESSION['rid']=$receiver_id;
					$query="select accounter_dp,accounter_first_name,accounter_last_name from accounter a,accounter_details ad where a.accounter_id=ad.accounter_id and a.accounter_id=$receiver_id";
					$run=mysqli_query($this->con,$query);

					$row=mysqli_fetch_row($run);



					// echo "$row[0] $row[1] $row[2]";
					?>
						<div class="col-md-12" style="background-color: white;padding: 0 0 0 0;border: 1px solid gray;overflow: hidden;">
							
							<div class="col-md-12" style="padding: 10px 12px;text-transform: capitalize;">
								<img src="propic/<?= $row[0] ?>" height="40px" width="40px" style="border-radius: 50%;">&nbsp;&nbsp;<span style="padding-top: 30px;font-family: open sans;font-size: 20px;"><?= $row[1] ?>&nbsp;<?= $row[2] ?></span>
							</div>




							
								<!-- view msg -->
							<div class="col-md-12 w3-hide-small" style="height: 505px;background-color:;overflow-y: scroll;overflow-x: hidden;background-image: url('propic/<?= $row[0] ?>'); background-size: 650px 505px;background-repeat: no-repeat;" id="scroll" class="autoload1">
									
							<?php
								$fetchmsg="select * from message where sender_id=$sender_id and receiver_id=$receiver_id union select * from message where sender_id=$receiver_id and receiver_id=$sender_id order by message_date";

								$runfetchmsg=mysqli_query($this->con,$fetchmsg);

									while($rowSMS=mysqli_fetch_row($runfetchmsg))
									{
										$date=date('F j g:ia',strtotime($rowSMS[4]));
										if($rowSMS[1]==$sender_id)
										{
											$margin=80;

											?>

												<div style="margin-left: <?=$margin?>px;  
			 							/*width: auto;*/
										margin-top:10px;border-radius: 10px;background-color: #ffff99;
										
											padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: right;"><?=$rowSMS[3]?>
												
												

											</div>

											 <div style="margin-left: <?=$margin?>px;margin-top:0px;border-radius: 10px;color: #ccc;padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: right;">
													<?= $date ?>
												
												

											</div>

											<?php
										}
										else
										{
											$margin=10;

											?>

												<div style="margin-left: <?=$margin?>px;margin-top:10px;border-radius: 10px;background-color: #ffff99;padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: left;"><?=$rowSMS[3]?></div>
												<div style="margin-left: <?=$margin?>px;margin-top:10px;border-radius: 10px;color: #ccc;padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: left;"><?=$date?></div>


											<?php
										}
										?>
										
										<?php
									}


							?>

							</div>




							<!-- mobile section -->

								<div class="col-md-12 w3-hide-large scroll12" style="height: 340px;background-color:;overflow-y: scroll;overflow-x: hidden;background-image: url('propic/<?= $row[0] ?>'); background-size: 380px 340px;background-repeat: no-repeat;" id="scroll" class="autoload1">
									
							<?php
								$fetchmsg="select * from message where sender_id=$sender_id and receiver_id=$receiver_id union select * from message where sender_id=$receiver_id and receiver_id=$sender_id order by message_date";

								$runfetchmsg=mysqli_query($this->con,$fetchmsg);

									while($rowSMS=mysqli_fetch_row($runfetchmsg))
									{
										$date=date('F j g:ia',strtotime($rowSMS[4]));
										if($rowSMS[1]==$sender_id)
										{
											$margin=80;

											?>

												<div style="margin-left: <?=$margin?>px;  
										/*width: auto;*/
										margin-top:10px;border-radius: 10px;background-color: #ffff99;
										
											padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: right;"><?=$rowSMS[3]?>
												
												

											</div>

											 <div style="margin-left: <?=$margin?>px;margin-top:0px;border-radius: 10px;color: #ccc;padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: right;">
													<?= $date ?>
												
												

											</div>

											<?php
										}
										else
										{
											$margin=10;

											?>

												<div style="margin-left: <?=$margin?>px;margin-top:10px;border-radius: 10px;background-color: #ffff99;padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: left;"><?=$rowSMS[3]?></div>
												<div style="margin-left: <?=$margin?>px;margin-top:10px;border-radius: 10px;color: #ccc;padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: left;"><?=$date?></div>


											<?php
										}
										?>
										
										<?php
									}


							?>

							</div>

							<!-- end mobile section -->


								<!-- end view msg -->
							



							<div class="col-md-12" style="padding: 0 0 0 0;margin-top: 0px;">
								
								<!-- <form class="form3" name=""> -->
								 	<div class="col-md-12 col-sm-12" style="padding: 0 0 0 0;">
								 		<div class="left-inner-addon w3-hide-small" style="padding: 0 0 0 0;">

								 		<script type="text/javascript">
								 				
								 		$(document).ready(function(){

								 				
												$('.send').click(function(){

													// alert("hello");
													$thisbt=$(this);

													var text=$('.sms1').val();
													// alert(text);
													var lent=text.length;
														// alert(lent);
													if(lent!=0)
													{
														var reciver_id=$thisbt.next().val();
														
														
														// alert(reciver_id);
														// console.log(reciver_id);

														$.ajax({

															type:'post',
															url:'main.php',
															data:{msg:text,reciver:reciver_id},
															success:function(data)
															{
																// $thisbt.parent().parent().parent().parent().prev().html(data);
																$('.autoload1').html(data);
																// $thisbt.next().val('');
																$('.sms1').val('');
															}

														});

														$('.sms1').css("border","1px solid skyblue");

													}
													else
													{
														$('.sms1').css("border","1px solid red");
													}
													
													
												});





								 		});
									</script>
								 		<!-- <input type="button" class="send" value="send" name=""> -->
				                             <!--  <i class="fa fa-paper-plane send" style="left: 595px;padding: 18px 12px;font-size: 20px;"></i>
				                              <input type="text" class="form-control"  placeholder="write msg" name="txt" required style="height: 50px;">
				                              <input type="hidden" name="receiver_id" value="<?= $receiver_id ?>"> -->

				                        </div>
				                       <!--  <div class="left-inner-addon w3-hide-large" style="padding: 0 0 0 0;">
				                              <i class="fa fa-paper-plane send" style="left: 300px;"></i>
				                              <input type="text" class="form-control"  placeholder="write msg" name="txt" required>
				                              <input type="hidden" name="receiver_id" value="<?= $receiver_id ?>">

				                        </div> -->


				                        <div class='input-group add-on'>
										    <input  type="text" class="form-control sms1" name="txt" />
										    <div class="input-group-btn">
										        <button class="btn btn-default">
										            <i class="fa fa-paper-plane send"></i>
										            <input type="hidden" name="receiver_id" value="<?= $receiver_id ?>">
										        </button>
										    </div>
										</div>


								 	</div>	
								 	<style type="text/css">
								 		/* remove border between controls */
										.add-on .input-group-btn > .btn {
										    border-left-width: 0;
										    left:-2px;
										    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
										            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
										}
										/* stop the glowing blue shadow */
										.add-on .form-control:focus {
										    -webkit-box-shadow: none; 
										            box-shadow: none;
										    border-color:#cccccc; 
										}
								 	</style>								
								<!-- </form> -->
							</div>
						</div>
					<?php						
				}

			// end text msg


				// send sms
				public function sendSMS()
				{
					$id=$_SESSION['id'];
					$receiver_id=$_POST['reciver'];
					$text=$_POST['msg'];
					// $_SESSION['rid']=$receiver_id;

					
					$query="insert into message(sender_id,receiver_id,message) values($id,$receiver_id,'$text')";

					$run=mysqli_query($this->con,$query);

					if($run==true)
					{


								$fetchmsg="select * from message where sender_id=$id and receiver_id=$receiver_id union select * from message where sender_id=$receiver_id and receiver_id=$id order by message_date";

								$runfetchmsg=mysqli_query($this->con,$fetchmsg);

									while($rowSMS=mysqli_fetch_row($runfetchmsg))
									{
										$date=date('F j g:ia',strtotime($rowSMS[4]));

										if($rowSMS[1]==$id)
										{
											$margin=80;

											?>

												<div style="margin-left: <?=$margin?>px;  
										/*width: auto;*/
										margin-top:10px;border-radius: 10px;background-color: #ffff99;
										
											padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: right;"><?=$rowSMS[3]?></div>

											<div style="margin-left: <?=$margin?>px;  
										/*width: auto;*/
										margin-top:2px;border-radius: 10px;color: #ccc;
										
											padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: right;font-size: 15px;"><?=$date?></div>


											<?php
										}
										else
										{
											$margin=10;

											?>

												<div style="margin-left: <?=$margin?>px;  
										/*width: auto;*/
										margin-top:10px;border-radius: 10px;background-color: #ffff99;
										
											padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: left;"><?=$rowSMS[3]?></div>
												<div style="margin-left: <?=$margin?>px;  
										/*width: auto;*/
										margin-top:2px;border-radius: 10px;color: #ccc;
										
											padding: 5px;font-size: 15px; height: auto;min-width: 20%;max-width: 80%;clear: both;float: left;"><?=$date?></div>

											<?php
										}
										
										
										
									}


							
						
					}
					else
					{
						echo "not inserted";
					}
				}
				// end send sms


				// view sms auto




				
// end chatting section


 // password change
	public function changePassword()
	{
		$id=$_SESSION['id'];
		$current=sha1($_POST["current"]);
		$new=sha1($_POST["new"]);
		$confirm=sha1($_POST["confirm"]);

		$query="select accounter_password from accounter where accounter_id=$id";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		if($current==$row[0])
		{
			if($new==$confirm)
			{
				$newquery="update accounter set accounter_password='$new' where accounter_id=$id";
				$runnew=mysqli_query($this->con,$newquery);
				if($runnew==true)
				{
					echo "hello";
				}
				else
				{
					echo "bye";
				}

			}
			else
			{
				echo "not match";
			}
		}
		else
		{
			echo "current error";
		}
		


		
	}
// end password change


	// unfriend section

		public function unFriend($unfriend_id)
		{
			$id=$_SESSION['id'];
			$query="delete from friend where froms=$id and tos=$unfriend_id or froms=$unfriend_id and tos=$id";
			$run=mysqli_query($this->con,$query);

		}

	// end unfriend section


		// pic 

		public function picname()
		{
			$id=$_SESSION['id'];
			$query="select accounter_dp from accounter_details where accounter_id=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);

			echo "$row[0]";
		}


		public function changeBackground()
		{
			$id=$_SESSION['id'];
			$actualpic=$_FILES['bgpics']['name'];
			$temp=$_FILES['bgpics']['tmp_name'];

			$path="background/".$actualpic;
			$ext=pathinfo($path,PATHINFO_EXTENSION);


			$query="select * from background where accounter_id=$id";
			$run=mysqli_query($this->con,$query);
			$check=mysqli_num_rows($run);
			if($check==1)
			{
				if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
					{
						$move=move_uploaded_file($temp,$path);
						if($move==true)
						{
								$update="update background set background_img='$actualpic' where accounter_id=$id";
								$run1=mysqli_query($this->con,$update);
								echo "<script>window.location.href='home.php';</script>";		

						}
						else
						{
							echo "<script>alert('plz try again');</script>";
							echo "<script>window.location.href='home.php';</script>";		
						}
					}
			}
			else
			{

				if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
				{
					$move=move_uploaded_file($temp,$path);
					if($move==true)
					{
							$q="insert into background values($id,'$actualpic')";
							$r=mysqli_query($this->con,$q);
							echo "<script>window.location.href='home.php';</script>";		

					}
					else
					{
						echo "<script>alert('plz try again');</script>";
						echo "<script>window.location.href='home.php';</script>";		
					}
				}

			}
		
		

		}


		public function fetchBack()
		{
			$id=$_SESSION['id'];
			$query="select background_img from background where accounter_id=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);
			echo "$row[0]";
		}




		public function totalPost()
		{
			$id=$_SESSION['id'];
			$query="select count(*) from post where accounter_id=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);
			echo "$row[0]";
		}


		public function totalFriends()
		{
			$id=$_SESSION['id'];
			$query="select count(*) from friend where status=1 and froms=$id or tos=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);
			echo "$row[0]";
		}

		public function totalLikes()
		{
			$id=$_SESSION['id'];
			$query="select count(*) from post ,likes where post.post_id=likes.post_id and post.accounter_id=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);
			echo "$row[0]";
		}


		public function totalUnLikes()
		{
			$id=$_SESSION['id'];
			$query="select count(*) from post ,unlike where post.post_id=unlike.post_id and post.accounter_id=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);
			echo "$row[0]";
		}
		public function totalcomment()
		{
			$id=$_SESSION['id'];
			$query="SELECT COUNT(*) FROM post,comments where post.post_id=comments.post_id and post.accounter_id=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);
			echo "$row[0]";
		}


		public function totalmessage()
		{
			$id=$_SESSION['id'];
			$query="SELECT COUNT(*) FROM message where sender_id=$id";
			$run=mysqli_query($this->con,$query);
			$row=mysqli_fetch_row($run);
			echo "$row[0]";
		}


		public function createDropbox()
		{
			$id=$_SESSION['id'];
			$foldername=$_POST['foldername'];
			$query="select * from folder where accounter_id=$id and folder_name='$foldername'";
			$run=mysqli_query($this->con,$query);

			$row=mysqli_num_rows($run);

			if($row==0)
			{
				$createfolder="insert into folder(folder_name,accounter_id) values('$foldername',$id)";

				$runcreatefolder=mysqli_query($this->con,$createfolder);
				mkdir('connector_folder/'.$foldername);
				?>
					<script>window.location.href='folder.php';</script>

				<?php
			}
			else
			{
				?>
					<script>alert('folder is alreday created');window.location.href='folder.php';</script>
				<?php
			}
		}


		public function fetchFolder()
		{
			$id=$_SESSION['id'];
			$query="select * from folder where accounter_id=$id";

			$run=mysqli_query($this->con,$query);

			while($row=mysqli_fetch_row($run))
			{
				?>
				
						<div class="col-md-2 text-center openfolder" style="padding: 0 0 0 0;">
						<input type="hidden" name="folderid" value="<?= $row[0] ?>" >
						<input type="hidden" name="foldername1" value="<?= $row[1] ?>">
							<img src="connector_folder/folder.png" class="img-respomsive" width="70%"><br>
							<?= $row[1] ?>
						</div>
					
				<?php
			}
		}


		public function setFoldersession()
		{
			$folderid=$_POST['fid'];
			$foldername=$_POST['fname'];
			// alert('folderid');
			// echo "$folderid";

			$_SESSION['folderid']=$folderid;
			$_SESSION['foldername']=$foldername;
			// echo "hello";
		}


		public function uploadFile()
		{
			$folderid=$_SESSION['folderid'];
			$foldername=$_SESSION['foldername'];
			$id=$_SESSION['id'];

			$actual=$_FILES['uploadfile']['name'];
			$temp=$_FILES['uploadfile']['tmp_name'];

			$path="connector_folder/".$foldername."/".$actual;
			// echo "$path";

			$move=move_uploaded_file($temp,$path);

			if($move==true)
			{
				$query="insert into files(file_name,folder_id) values('$actual',$folderid)";
				$run=mysqli_query($this->con,$query);

				if($run==true)
				{
					// echo "hello $folderid $foldername";

					?>
					<script type="text/javascript">
						window.location.href='files.php';
					</script>
					<?php
				}
				else
				{
					?>


					<script type="text/javascript">
						alert('error in uploading');
						window.location.href='files.php';
					</script>
					<?php

					
				}
			}
			else
			{
				echo "bye";
			}



			
		}


		public function openFolder()
		{
				$folderid=$_SESSION['folderid'];
				$foldername=$_SESSION['foldername'];
				$id=$_SESSION['id'];
				$directory_path="connector_folder/".$foldername;
				
				$query="select file_name from files where folder_id=$folderid";
				$run=mysqli_query($this->con,$query);

				while($row=mysqli_fetch_row($run))
				{
					$ext=pathinfo($directory_path."/".$row[0],PATHINFO_EXTENSION);
					// echo "$directory_path";
					if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="JPG" || $ext=="JPEG" || $ext=="PNG")
					{
							?>
								<div class="col-md-3">
									<a href="<?= $directory_path ?>/<?= $row[0] ?>"><img src="<?= $directory_path ?>/<?= $row[0] ?>" width=100%></a>

								</div>
							<?php
					}
					if($ext=="pdf")
					{
						?>
							<div class="col-md-3" style="background-color: white">
									<a href="<?= $directory_path ?>/<?= $row[0] ?>"><img src="connector_folder/pdf.png" width="100%"></a>
									<p><?= $row[0] ?></p>
								
							</div>
						<?php
					}


				}
				
		}

		


}


$u=new User();
// $u->post_status();

if(isset($_POST['registration']))
{
	$u->registrationUser();
}
else if(isset($_POST['login']))
{
	$u->loginUser();
}
else if(isset($_POST['status']))
{
	$u->post_status();
}
else if(isset($_POST['postpic']))
{
	$u->postPic();
}
else if(isset($_POST['postvideo']))
{
	$u->postVideo();
}
else if(isset($_POST['postaudio']))
{
	$u->postAudio();
}
else if(isset($_POST['postid']))
{
	$u->sendRequest();
}
else if(isset($_POST['reciver_id']))
{
	$u->acceptFriend();	
}
else if(isset($_POST['reject_id']))
{
	$u->rejectFriend();
}
else if(isset($_POST['profilebtn']))
{
	$u->updateProfile();
}
else if(isset($_POST['coverbtn']))
{
	$u->updateCover();
}
else if(isset($_POST['likebt']))
{
	$u->doLike();
}
else if(isset($_POST['unlikebt']))
{
	$u->doUnlike();
}
else if(isset($_POST['cmt']))
{
	$u->doComment();
}
else if(isset($_POST['receiver_id']))
{
	$u->viewMsg();
}
else if(isset($_POST['reciver']))
{
	$u->sendSMS();
}
else if(isset($_POST['user_contact']))
{
	$u->updateContact();
}
else if(isset($_POST['update_address']))
{
	$u->updateAddress();
}
else if(isset($_POST['user_nationality']))
{
	$u->updateNationality();
}
else if(isset($_POST['user_language']))
{
	$u->updateLanguage();
}
else if(isset($_POST['user_dob']))
{
	$u->updateDob();
}
else if(isset($_POST['search1234']))
{
	$u->searchFriend1();
}
else if(isset($_POST['current']))
{
	$u->changePassword();
}
else if(isset($_POST['unfriend_id']))
{
	$uid=$_POST['unfriend_id'];
	$u->unFriend($uid);
}
else if(isset($_POST['changeback']))
{
	$u->changeBackground();
}
else if(isset($_POST['makefolder']))
{
	$u->createDropbox();
}
else if(isset($_POST['fid']))
{
	$u->setFoldersession();
}
else if(isset($_POST['uploadinfolder']))
{
	$u->uploadFile();
}
?>