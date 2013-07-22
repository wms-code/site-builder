
<div class="well">
	<form method='post'>
	 <fieldset>
	 <legend>Legend</legend>
    <label>Page Title: </label>
<input type='text' name='mytitle' value="<?php echo $mytitle ?>" /> 
<br/><input type="submit" class="btn btn-info" />
</fieldset>
</form>
</div>
<textarea id="myedit">
	<?php echo $filecontents ?>
</textarea>
<script>
CKEDITOR.config.fillEmptyBlocks = false;
CKEDITOR.replace( 'myedit', {
	fullPage: true,
	allowedContent: true
});
</script>