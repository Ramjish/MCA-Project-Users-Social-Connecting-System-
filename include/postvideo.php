<div class="modal fade" role="dialog" id="p2">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Post video</h3>
				
			</div>
			<div class="modal-body" style="max-height: 400px;overflow-y: hidden;">
				<form class="" method="post" action="main.php" enctype="multipart/form-data">
					<input type="file" name="video" class="form-control" style="padding-bottom: 5px;"><br>
					
					<textarea placeholder="description" class="form-control" name="description" rows="4"></textarea>
					<br>
					<button class="btn btn-success pull-right" type="submit" name='postvideo'>Upload</button>
				</form>
			</div>
		</div>
	</div>
</div>