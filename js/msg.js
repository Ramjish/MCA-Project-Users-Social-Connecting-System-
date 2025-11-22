$(document).ready(function()

{


	$(".msg").click(function(){
		var bt=$(this);
		var id=bt.children().val();

	// alert(id);
		// alert(id);


					$.ajax({

							type:'post',
							url:'main.php',
							data:{receiver_id:id},
							success:function(data)
							{
								
								// alert(data);
								$(".viewmsg").html(data);
								
							}

					});

	});

});