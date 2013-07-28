<div class="well">
<form method='post'>
Page Title: <input type='text' name='mytitle' value="<?php echo $mytitle ?>" /> 
<br/><input type="submit" class="btn btn-info" />
</form>	
</div>
<form method="post">
<textarea id="myedit" name="myedit">
	<?php echo $filecontents ?>
</textarea>
<script type="text/javascript">

CKEDITOR.replace( 'myedit', {
	fullPage: true,
	allowedContent: true
	

});
CKEDITOR.config.fillEmptyBlocks = false;
CKEDITOR.on('instanceReady',
      function( evt )
      {
         var editor = evt.editor;
         editor.execCommand('maximize');
      });
	  
	//CKEDITOR.config.extraPlugins = 'autosave';
	
CKEDITOR.config.keystrokes = [
	 
    [ CKEDITOR.CTRL + 83, 'save' ],    // CTRL + SHIFT + L
    
];	  
	 
</script>

<p>
			<input type="submit" class="btn btn-info"  value="Submit">
		</p>
	</form>
