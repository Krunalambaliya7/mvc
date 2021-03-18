<?php $cms = $this->getCms();
/*echo "<pre>";
print_r($cms->title);
die();*/ ?>
<div>
	<form method="POST" id="cmsForm" action="<?php echo $this->getUrl()->getUrl('save',NULL,[]) ?>">
		<table class="t">
			<tr>
				<td>
					<label>Title:</label>
				</td>
				<td>
					<input type="text" name="Cms[title]" value="<?php echo $cms->title; ?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Identifier:</label>
				</td>
				<td>
					<input type="text" name="Cms[identifier]" value="<?php echo $cms->identifier ?>" required="">
				</td>
			</tr>
			<tr>
				<td>
					<label>Content:</label>
				</td>
				<td>
					<textarea name="Cms[content]" value="<?php echo $cms->content ?>"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<button type="button" class="btn btn-primary" onclick="base.setCms().load()">Submit</button>
				</td>
			</tr>
		</table>
	</form>
</div>

<script>
    CKEDITOR.replace( 'Cms[content]' );
</script>









