<?php 
	$admins = $this->getAdmins();
 ?>
<div>	
	<button class="btn btn-primary" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form') ?>').resetParams().load()">Insert</button>			
	<table class="table table-striped">
				<thead>
					<tr class="success">
						<th>Admin Id</th>
						<th>User Name</th>
						<th>Status</th>
						<th>Created Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
							foreach ($admins->getData() as $key => $value) {	
								?>
							<tr>
							<td><?php echo $value->adminId ;?></td>
							<td><?php echo $value->userName?></td>
							<td>
								<button class="btn btn-info" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('changeStatus',NULL,['id'=>$value->adminId,'Status'=>$value->status]); ?>').resetParams().load()"><?php echo $value->status;?></button>
							</td>
							<td><?php echo $value->createdDate;?></td>
							<td>
								<button class="btn btn-warning" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('form',NULL,['id'=>$value->adminId]); ?>').resetParams().load()">Update</button>

								<button class="btn btn-danger" onclick="base.setUrl('<?php echo $this->getUrl()->getUrl('delete',NULL,['id'=>$value->adminId]); ?>').resetParams().load()">Delete</button>						
							</td>
							</tr>
						<?php	} ?>
							
				</tbody>
			</table>
</div>