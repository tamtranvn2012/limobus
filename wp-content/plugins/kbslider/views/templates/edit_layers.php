
	
	<div class="edit_slide_wrapper">
		<a href="javascript:void(0)" id="button_change_image" class="button-primary margin_right10">Change Image</a>
		<a href="javascript:void(0)" id="button_add_layer" class="button-secondary margin_left10">Add Layer</a>
		<a href="javascript:void(0)" id="button_add_layer_image" class="button-secondary margin_left10">Add Layer: Image</a>
		
		<span class="hor_sap"></span>
		<a href="javascript:void(0)" id="button_delete_layer" class="button-secondary margin_left10 button-disabled">Delete Layer</a>
		<a href="javascript:void(0)" id="button_delete_all" class="button-secondary margin_left10 button-disabled">Delete All Layers</a>
		 
		<div class="vert_sap_small"></div>
		
		<div id="divLayers" class="slide_layers kb_slider_wrapper" style="<?php echo $style?>"></div>
		
		<div class="vert_sap"></div>
		
		<?php
			$settingsLayer->setAddClass("layers_settingsbox"); 
			$settingsLayer->draw("form_layers");
		?>
		
			<div class="postbox layer_sortbox">
				<h3>
					<span>Layers Sorting</span>
				</h3>			
						
				<div class="inside">
					<ul id="sortlist" class='sortlist'></ul>
				</div>
			</div>		
			
			<div class="clear"></div>
	</div>
	
	<div id="dialog_edit_css" class="dialog_edit_file" title="Edit captions.css file" style="display:none">
		<p>
			<textarea id="textarea_edit" rows="20" cols="100"></textarea>
		</p>
		<div class='unite_error_message' id="dialog_error_message" style="display:none;"></div>
		<div class='unite_success_message' id="dialog_success_message" style="display:none;"></div>
	</div> 
	
	<script type="text/javascript">
		
		jQuery(document).ready(function() {
			<?php if(!empty($jsonLayers)):?>
				//set init layers object
				UniteLayers.setInitLayersJson(<?php echo $jsonLayers?>);
			<?php endif?>

			<?php if(!empty($jsonCaptions)):?>
			UniteLayers.setInitCaptionClasses(<?php echo $jsonCaptions?>);
			<?php endif?>
			
			UniteLayers.setCssCaptionsUrl('<?php echo $urlCaptionsCSS?>'); 
			UniteLayers.init();
			
		});
	
	</script>
