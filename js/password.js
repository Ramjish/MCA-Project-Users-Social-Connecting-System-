$(document).ready(function(){


	$(".changepassword").click(function(){


		// alert("hello");
		$("#password").modal('show');


		$(".chgpass").on("submit",function()

		{

			// alert("hello");
			var data1=$(this).serialize();
			// alert(data1);
			$.ajax({


				data:data1,
				type:'post',
				url:'main.php',
				success:function(data)
				{
					// alert(data);
					if(data=="current error")
					{
						$(".current").css('border','1px solid red');
						$("#msgtitle").html("please enter current password");
					}
					else if(data=="not match")
					{
						$(".confirm").css('border','1px solid red');
						$(".current").css('border','1px solid #ccc');

						$("#msgtitle").html("confirm password does not match");

					}
				}
			});
			return false;

		});

	});

});