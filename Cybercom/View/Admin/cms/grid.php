<?php 
	$content = $this->getCms();
 ?>
<div>	
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>			
	<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Page Id</th>
						<th>Title</th>
						<th>Identifier</th>
						<th>Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
						if (!$content) { ?>
							<tr><td colspan="5">No data avilable</td></tr>
						<?php }
						else{
							foreach ($content->getData() as $key => $value) {	
								?>
							<tr>
							<td><?php echo $value->pageId ;?></td>
							<td><?php echo $value->title?></td>
							<td><?php echo $value->identifier ?></td>
							<td><?php echo $value->createdDate;?></td>
							<td>
								<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$value->pageId]); ?>').resetParams().load()">Update</button>

								<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->pageId]); ?>').resetParams().load()">Delete</button>						
							</td>
							</tr>
						<?php }	} ?>
							
				</tbody>
			</table>
</div>