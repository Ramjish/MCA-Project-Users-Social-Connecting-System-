<?php

require_once("main.php");

class msg extends Connection
{
	public function fetchSMS($reciever)
	{
		$id=$_SESSION['id'];
		$receiver_id=$_SESSION['rid'];
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
										/*width: auto ;*/
										margin-top:10px;border-radius: 10px;background-color: #ffff99;
										
											padding: 5px;height: auto;min-width: 20%;max-width: 80%;clear: both;float: right;"><?=$rowSMS[3]?></div>

											<div style="margin-left: <?=$margin?>px;  
										/*width: auto;*/
										margin-top:2px;border-radius: 10px;color: #ccc;
										
											padding: 5px;height: auto;min-width: 10%;max-width: 80%;clear: both;float: right;font-size: 15px;"><?=$date?></div>



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
}


$m=new msg;


	$reciver_id1=$_SESSION['rid'];
	$m->fetchSMS($reciver_id1);





?>