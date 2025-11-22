$(document).ready(function()
{

	
	// alert("hello");

	$(".click").click(function(){


		var id=$(this).children().val();


		// alert(id);

		$.ajax({

			type:'post',
			url:'main.php',
			data:{postdetails:id},
			success:function(data)
			{
				// alert(data);
				$(".ar").html(data);
			}

		});
	});

});