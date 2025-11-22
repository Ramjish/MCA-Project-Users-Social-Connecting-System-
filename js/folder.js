$(document).ready(function(){
	// $(".openfolder").hover(function(){

	// 	var bt=$(this);
	// 	bt.css("background-color","blue");
	// 	// alert("he");

	//

	// });
	$(".openfolder").dblclick(function(){


		var thisbt=$(this);
		var folder_id=$(this).children().val();
		var folder_name=$(this).children().next().val();

		$.ajax({


			data:{fid:folder_id,fname:folder_name},
			url:'main.php',
			type:'post',
			success:function(data)
			{
				window.location.href='files.php';
			}
		})

	});


});