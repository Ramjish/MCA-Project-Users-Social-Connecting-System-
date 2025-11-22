$(document).ready(function(){

			// alert("hello");

			$(".likesb").click(function(){

					// alert("hello");
					var thisbt=$(this);
					var pid=thisbt.parent().children('input').val();

					// alert(pid);

					$.ajax({

							type:'post',
							url:'main.php',
							data:{likebt:pid},
							success:function(data)
							{
								
								thisbt.attr('disabled','disabled');
								thisbt.attr('readonly','true');
								thisbt.css({"color":"darkgreen"});
								thisbt.children('.lks').html(data);
								
							}

					});

			});

			$(".unlikesb").click(function(){


					// alert("unlike");
					var thisbt=$(this);
					var pid=thisbt.parent().children('input').val();

					// alert(pid);

					$.ajax({

							type:'post',
							url:'main.php',
							data:{unlikebt:pid},
							success:function(data)
							{
								thisbt.attr('disabled','disabled');
								// thisbt.attr('readonly','false');
								thisbt.css({"color":"red"});
								thisbt.children('.ulks').html(data);
                                console.log("hello");
							}

					});
			});



			// $(".cmtbtn").click(function(){


				// alert("hello");
				// $()
			// });

			$(".cmtform").on("submit",function()
			{

				// alert("hello");
				var data1=$(this).serialize();
				var bt=$(this);
				// alert(data1);

				$.ajax({

					type:'post',
					url:'main.php',
					data:data1,
					cache:false,
					success:function(data)
					{
						// alert(data);
						bt.parent().parent().children().children().append(data);
						console.log(bt.parent().children().children().children().next().val(" "));
							bt.parent().children().children().next().next().hide();

							// bt.hide();
						// $(this).parent(".fetchcmt").children().html(data);
					}

				});

				return false;

			});

	});