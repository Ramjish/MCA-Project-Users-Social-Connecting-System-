<div class="modal fade" role="dialog" id="friendlist" style="padding-bottom: 10px;">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<a class="modal-brand" style="text-decoration: none;"><h3>Friend request</h3></a>
			</div>
			<div class="modal-body" style="max-height: 350px;overflow-x: hidden;overflow-y: scroll;" id="scroll">
				<?php

   					$u->showFriendRequestList();
				?>
			</div>
		</div>
	</div>
</div>