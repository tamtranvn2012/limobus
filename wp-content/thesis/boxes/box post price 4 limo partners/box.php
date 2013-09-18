<?php
/*
Name: box post price 4 limo partners
Author: Thanh
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: box_post_price_4_limo_partners
*/

class box_post_price_4_limo_partners extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box post price 4 limo partners', 'os-rev-thesis');
		$this->title = sprintf(__('box post price 4 limo partners', 'os-rev-thesis'));
                
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
	<hr style="border:solid 2px gray;border-radius:10px;margin-top:15px;float:left;width:100%;"/>
	<a href="http://myjobodesk.com/price4limo/frequently-fasked-questions/"><div class="boxHelp1"></div></a>
	<a href="http://myjobodesk.com/price4limo/affiliate/"><div class="boxHelp2"></div></a>
	<div style="float:left">
	<?php
$my_postid = 67;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo '<h2>'.get_the_title($my_postid).'</h2>'.$content;
?>
</div>
<?php

	}
}