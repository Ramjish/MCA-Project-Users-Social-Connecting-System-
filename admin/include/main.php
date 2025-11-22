<?php
session_start();
class Connection
{
	public $con;
	public function __construct()
	{
		$this->con=mysqli_connect("localhost","root","","social");


		if($this->con!=true)
		{
			echo "error in connection";
		}
		
	}
}


class Admin extends Connection
{
	public function logIn()
	{
		$useremail=$_POST['email'];
		$userpassword=sha1($_POST['pass']);


		// echo "$useremail";
		// echo "$pass";

		$query="select * from accounter where accounter_email='$useremail' and accounter_password='$userpassword' and status=1";

		$running_login=mysqli_query($this->con,$query);
		$check=mysqli_num_rows($running_login);

		$row=mysqli_fetch_row($running_login);
		if($check==1)
		{
			$_SESSION['aid']=$row[0];
			// echo "$row[0]";
			header('location:home.php');
		}
		else
		{
			echo "<script>alert('invalid username n password');window.location.href='../index.php';</script>";
		}


	}
	


	public function totalConnector()
	{
		$query="select count(*) from accounter where status=0";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		echo "$row[0]";
	}
	public function totalMale()
	{
		$query="select count(*) from accounter where status=0 and accounter_gender='male'";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		echo "$row[0]";
	}
	public function totalFemale()
	{
		$query="select count(*) from accounter where status=0 and accounter_gender='female'";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		echo "$row[0]";
	}


	public function tpost()
	{
		$query="select count(*) from post";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		echo "$row[0]";
	}

	public function totallike()
	{
		$query="select count(*) from likes";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		echo "$row[0]";
	}

	public function totalunlike()
	{
		$query="select count(*) from unlike";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		echo "$row[0]";
	}

	public function totalcomment()
	{
		$query="select count(*) from comments";
		$run=mysqli_query($this->con,$query);
		$row=mysqli_fetch_row($run);
		echo "$row[0]";
	}


	public function connectors()
	{
		$query="select accounter.accounter_id,accounter_first_name,accounter_last_name,accounter_dp from accounter,accounter_details where accounter.accounter_id=accounter_details.accounter_id and accounter.status=0";
		$run=mysqli_query($this->con,$query);

		?>
			<table class="table table-hover">
				<tbody >
					
				<?php
					while($row=mysqli_fetch_row($run))
					{
						?>
							<tr>
								<td><img src="../../propic/<?= $row[3]; ?>" width="40px" height="40px" style="border-radius: 50%;"></td>
								<td style="line-height: 40px;text-transform: capitalize;" class="click" title="click" data-toggle="popoverfriend" data-trigger="hover" data-content="view post's" data-placement="right" ><input type="hidden" name="" value="<?= $row[0] ?>"><?= $row[1] ?>&nbsp;&nbsp;<?= $row[2] ?></td>
								<td><form method="post" action="main.php"><input type="hidden" value="<?= $row[0] ?>" name="accounter_id"><button class="btn btn-danger block" name="block" type="post">block</button></form></td>
							</tr>
						<?php
					}	
				?>
				</tbody>
			</table>
		<?php
	}


	public function blockconnectors()
	{
		$query="select accounter.accounter_id,accounter_first_name,accounter_last_name,accounter_dp from accounter,accounter_details where accounter.accounter_id=accounter_details.accounter_id and accounter.status=2";
		$run=mysqli_query($this->con,$query);

		?>
			<table class="table table-hover">
				<tbody >
					
				<?php
					while($row=mysqli_fetch_row($run))
					{
						?>
							<tr>
								<td><img src="../../propic/<?= $row[3]; ?>" width="40px" height="40px" style="border-radius: 50%;"></td>
								<td style="line-height: 40px;text-transform: capitalize;" class="click"  title="click" data-toggle="popoverfriend" data-trigger="hover" data-content="view post's" data-placement="right"><input type="hidden" name="" value="<?= $row[0] ?>"><?= $row[1] ?>&nbsp;&nbsp;<?= $row[2] ?></td>
								<td><form method="post" action="main.php"><input type="hidden" value="<?= $row[0] ?>" name="accounter_id"><button class="btn btn-success block" name="unblock" type="post">unblock</button></form></td>
							</tr>
						<?php
					}	
				?>
				</tbody>
			</table>
		<?php
	}


	public function block()
	{
		$id=$_POST['accounter_id'];

		// echo "$id";
		$query="update accounter set status=2 where accounter_id=$id";
		$run=mysqli_query($this->con,$query);
		header('location:connector.php');
	}

	public function unBlock()
	{
		$id=$_POST['accounter_id'];

		// echo "$id";
		$query="update accounter set status=0 where accounter_id=$id";
		$run=mysqli_query($this->con,$query);
		header('location:connector.php');
	}
	public function viewPost()
	{
		$id=$_POST['postdetails'];

		$query="select accounter_first_name,accounter_last_name ,post_img,post_video from post p,accounter a where p.accounter_id=a.accounter_id and p.accounter_id=$id order by post_date desc";
		$run=mysqli_query($this->con,$query);
		$row1=mysqli_fetch_row($run);
		?>
			<p>&nbsp;<?= $row1[0]  ?>&nbsp;&nbsp;<?= $row1[1] ?>&nbsp;Post's</p>
		<?php
		while($row=mysqli_fetch_row($run))
		{
			if(!empty($row[2]))
			{
				?>
					<div class="col-md-6">
						<img src="../../post/<?= $row[2] ?>" width="100%" class="img-thumbnail" style="height: 230px;">
					</div>
				<?php
			}

			if(!empty($row[3]))
			{
				?>
					<div class="col-md-6">
						<!-- <img src="../../postvideo/<?= $row[2] ?>" width="100%" class="img-thumbnail"> -->
							<video src="../../postvideo/<?= $row[3] ?>" width="100%" controls class="img-thumbnail"  style="max-height: 300px;"></video>

					</div>
				<?php
			}
		}
	}

}


$a=new Admin();

if(isset($_POST['login']))
{
	$a->logIn();
}
else if(isset($_POST['block']))
{
	$a->block();
}
else if(isset($_POST['unblock']))
{
	$a->unBlock();
}
else if(isset($_POST['postdetails']))
{
	$a->viewPost();
}

?>