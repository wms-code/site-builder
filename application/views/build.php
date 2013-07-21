<h1>Welcome</h1>
<form method='post'>
Page Title: <input type='text' name='mytitle' value="<?php echo $mytitle ?>" /> 
<br/><input type="submit" class="btn btn-info" />
</form>
<div class="well">
	<p>Add your awesome content here!</p>
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