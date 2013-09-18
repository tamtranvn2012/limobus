<?php
/*
Name:box show post
Author: Thanh
Version: 1.0
Description: trang box buffalo limousine service
Class: box_show_post
*/

class box_show_post extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box show post', 'os-rev-thesis');
		$this->title = sprintf(__('box show post', 'os-rev-thesis'));
                
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
	              ?>
				  <h2><?php the_title();?></h2>
				  <?php
			   the_post(); 
            the_content();
	} 
}