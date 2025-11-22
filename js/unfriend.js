$(document).ready(function(){


	$(".unfriend").click(function()
	{

		var bt=$(this);
		var id=$(this).prev().val();
		// alert(id);

		$.ajax({

			type:'post',
			url:'main.php',
			data:{unfriend_id:id},
			success:function(data)
			{
				// alert(data);
				bt.parent().parent().parent().hide('slide',{direction:'right'},500);
			}

		});

	});


});