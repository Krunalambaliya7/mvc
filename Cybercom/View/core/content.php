<div id="contentHtml">
<?php 
$child = $this->getChildren();

foreach ($child as $key => $value) {
	echo $value->toHtml();
}
?>

</div>

<script type="text/javascript">
	var base = new Base();
</script>