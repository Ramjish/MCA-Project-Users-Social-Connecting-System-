		$(document).ready(function(){
			
			$('.remove').hide();
			// alert("hello");
			$(".people").click(function(){

				$(".Newsfeed").hide();
			});
			$(".newsfeed").click(function(){
				$(".Newsfeed").show();
			});
			$(".like").click(function(){

					alert("hello");
			});

			// making a friend list 

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

			// end making a friend list


			// friend request accept list
				$(".accept").click(function(){

					var this1=$(this);
					var accept=this1.parent().children('input').val();

					// alert(accept);

					$.ajax({

						type:'post',
						url:'main.php',
						data:{reciver_id:accept},
						success:function(data)
						{
							// alert(data);
							this1.parent().children('button').hide();
							this1.siblings('span').show();
						}
					})

				});
			// end friend request accept

			// show friend accept or nostrud
				$(".friend1").click(function(){

					$("#friendlist").modal('show');
				});

			// end show friend accept or not

			// removing friend list
			$(".hide1").click(function(){

				// var btn=$(this).parent().slideUp().hide(1000);
				$(this).parent().hide('slide',{direction:'right'},500);

			});

			// end removing friend list


			$(".reject").click(function(){
					var this1=$(this);
					var id=this1.parent().children('input').val();
					// alert(id);

					$.ajax({

						data:{reject_id:id},
						type:'post',
						url:'main.php',
						success:function(data)
						{
							// alert(data);

							this1.parent().parent().hide('slide',{direction:'left'},500);
						}

					});


			});



			




		});
