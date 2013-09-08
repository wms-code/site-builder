
			
			<!-- main content -->
			<div id="main_content" class="span12">
				<div class="row-fluid">
					<div class="widget_container">
					
				<div class="navbar navbar-static">
				<form action="" method="post">
							<textarea id="myedit" name="myedit"><?php echo $filecontents ?></textarea>

						</form>
							<script type="text/javascript">

							CKEDITOR.replace( 'myedit', {
								fullPage: true,
								allowedContent: true,
								 height: '680',
        						width: '100%'

							});
							CKEDITOR.config.fillEmptyBlocks = false;
														
							CKEDITOR.config.keystrokes = [
								 
								[ CKEDITOR.CTRL + 83, 'save' ],    // CTRL + SHIFT + L
								
							];	

							
							</script>
							
							


								

							
							
						</div>
					</div>
				</div>
			</div><!-- main content -->
			
			
			







