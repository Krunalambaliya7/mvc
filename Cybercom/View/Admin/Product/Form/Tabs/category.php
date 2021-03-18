<?php $category = $this->getCategory()->getData();?>

<div>
	<form method="POST" action="<?php echo $this->getUrl()->getUrl('save','Admin\Product\Category');?>" id="selectCategoryForm">
		<table>
			<tr>
				<td>
					<label>Select Category:</label>
				</td>
				<td>
					<select name="Category">
						<?php foreach ($category as $key => $value) { ?>
								<option value="<?php echo $value->CategoryId; ?>"><?php echo $value->Name; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<button class="btn btn-primary" type="button" onclick="base.setForm();">Submit</button>
				</td>
			</tr>
		</table>
	</form>
</div>

