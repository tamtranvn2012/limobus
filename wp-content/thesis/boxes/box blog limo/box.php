<?php
/*
Name:box blog limo
Author: Thanh
Version: 1.0
Description: trang box buffalo limousine service
Class: box_blog_limo
*/

class box_blog_limo extends thesis_box {
	protected function translate() {
		global $thesis;
            $this->name = __('box blog limo', 'os-rev-thesis');
			$this->title = sprintf(__('box blog limo', 'os-rev-thesis'));
                
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
		$type = 'blog_limo';
		$args=array(
		  'post_type' => $type,
		  'post_status' => 'publish',
		  'posts_per_page' => -1,
		  'caller_get_posts'=> 1
		  );
		  
		$my_query = null;
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		?>
		<h2>Limo Blog</h2>
		<?php
			echo do_shortcode('[dcssb-link]');
		  while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<p style="font-size:25px;font-weight:bold;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			<p><?php the_content();?></p>
			<hr/>
			<?php
		  endwhile;
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
        
	} 
}