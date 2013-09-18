
	<table class='wp-list-table widefat fixed unite_table_items'>
		<thead>
			<tr>
				<th width='5%'>ID</th>
				<th width='30%'>Name</th>
				<th width='10%'>N. Slides</th>						
				<th width=''>Actions</th>
				<th width='15%'>Shortcode</th>						
			</tr>
		</thead>		
		<tbody>
			<?php foreach($arrSliders as $slider):
				
				$id = $slider->getID();
				$showTitle = $slider->getShowTitle();
				$title = $slider->getTitle();
				$alias = $slider->getAlias();
				$shortCode = $slider->getShortcode();
				$numSlides = $slider->getNumSlides();
				
				$editLink = self::getViewUrl(KBSliderAdmin::VIEW_SLIDER,"id=$id");
				$editSlidesLink = self::getViewUrl(KBSliderAdmin::VIEW_SLIDES,"id=$id");
				
				$showTitle = UniteFunctions::getHtmlLink($editLink, $showTitle);
				
			?>
				<tr>
					<td><?php echo $id?><span id="slider_title_<?php echo $id?>" class="hidden"><?php echo $title?></span></td>								
					<td><?php echo $showTitle?></td>
					<td><?php echo $numSlides?></td>
					<td>
						<a href='<?php echo $editSlidesLink ?>'>Edit Slides</a>
						<span class="hor_sap"></span>
						<a id="button_delete_<?php echo $id?>" href='javascript:void(0)' class="button-secondary button_delete_slider">Delete</a>
					</td>
					<td><?php echo $shortCode?></td>
				</tr>							
			<?php endforeach;?>
			
		</tbody>		 
	</table>

	<script type="text/javascript">
		jQuery(document).ready(function(){
			KBSliderAdmin.initSlidersListView();
		});
	</script>

	