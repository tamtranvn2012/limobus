<?php
/*
Name: slider box
Author: Thanh
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: slider_box
*/

class slider_box extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('slider_box', 'os-rev-thesis');
		$this->title = sprintf(__('slider_box', 'os-rev-thesis'));
                
	}

	        
        protected function options() {
	    
		    return array(
				'slidershort' => array(
					'type' => 'text',
					'width' => 'medium',
					'label' => __('Slider Shortcode', 'os-rev-thesis'),
					'tooltip' => sprintf(__('Enter the Slider Shortcode of the Slider you wish to use. Note - The Slider Shortcode can be found in the Revolution Slider Options for the slide plan to use.', 'os-rev-thesis')),
					'default' => ''
					)
			);
		}
		
		
		
	public function html() {
	   echo '<div class="boxSlider"><h2>Photo:</h2><a href="http://myjobodesk.com/price4limo/limo-fleet/"><div class="boxSlideButtonLeft"></div></a><a href="http://myjobodesk.com/price4limo/frequently-fasked-questions/"><div class="boxSlideButtonRight"></div></a>';
		//echo '<div width="100%" height="80px"><img src="http://myjobodesk.com/price4limo/wp-content/uploads/photol.gif" align="left" /><img src="http://myjobodesk.com/price4limo/wp-content/uploads/photor.png" align="left"></div>';
        ?>
		<div class="boxSliderPhoto">
		<?php
		echo do_shortcode('[layerslider id="2"]');
		?>
		</div>
		<?php
		  echo '<div class="boxSlideBottom"></div></div>';
	}
}