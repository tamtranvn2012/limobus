<?php
/*
Name: box header
Author: Thanh
Version: 1.0
Description: This box adds the Revolution Slider box to the Thesis Template Editor.  It requires the Revolution Slider plugin to function properly.  It allows the user to insert instances of the Revolution Slider on various templates
Class: box_header
*/

class box_header extends thesis_box {
	protected function translate() {
		global $thesis;
                $this->name = __('box header', 'os-rev-thesis');
		$this->title = sprintf(__('box header', 'os-rev-thesis'));
                
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
	   	echo '<a href="http://myjobodesk.com/price4limo/"><div class="logos2"></div></a>';
		echo '<div class="boxHeaderTxt"><b><font size="2"><strong>WE ARE A NATIONAL LIMOUSINE BOOKING SERVICE IN ALL 50 STATES. RENT A LIMO OR PARTY BUS ANYWHERE IN THE U.S.A.A</strong></font></div>';
		echo '<div class="boxHeaderTxt"><font size="2">Marketplace where independently owned limousine companies compete for your business</font></div>';
		?>
		<div class="boxHeaderTxt" style="margin-top:6px;">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=375622905881916";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like" data-href="http://developers.facebook.com/docs/reference/plugins/like" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div></div>
		<?php
	}
}