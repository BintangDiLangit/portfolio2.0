<?php

function workart_blog_customize_register( $wp_customize ) {

	Class Workart_Blog_Switch_Control extends WP_Customize_Control{

		public $type = 'switch';

		public $on_off_label = array();

		public function __construct( $manager, $id, $args = array() ){
	        $this->on_off_label = $args['on_off_label'];
	        parent::__construct( $manager, $id, $args );
	    }

		public function render_content(){
	    ?>
		    <span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
			</span>

			<?php if( $this->description ){ ?>
				<span class="description customize-control-description">
				<?php echo wp_kses_post( $this->description ); ?>
				</span>
			<?php } ?>

			<?php
				$switch_class = ( $this->value() == 'true' ) ? 'switch-on' : '';
				$on_off_label = $this->on_off_label;
			?>
			<div class="onoffswitch <?php echo esc_attr( $switch_class ); ?>">
				<div class="onoffswitch-inner">
					<div class="onoffswitch-active">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['on'] ) ?></div>
					</div>

					<div class="onoffswitch-inactive">
						<div class="onoffswitch-switch"><?php echo esc_html( $on_off_label['off'] ) ?></div>
					</div>
				</div>	
			</div>
			<input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr( $this->value() ); ?>"/>
			<?php
	    }
	}

	Class Workart_Blog_Dropdown_Chooser extends WP_Customize_Control{

		public $type = 'dropdown_chooser';

		public function render_content(){
			if ( empty( $this->choices ) )
	                return;
			?>
	            <label>
	                <span class="customize-control-title">
	                	<?php echo esc_html( $this->label ); ?>
	                </span>

	                <?php if($this->description){ ?>
		            <span class="description customize-control-description">
		            	<?php echo wp_kses_post($this->description); ?>
		            </span>
		            <?php } ?>

	                <select class="workart-blog-chosen-select" <?php $this->link(); ?>>
	                    <?php
	                    foreach ( $this->choices as $value => $label )
	                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
	                    ?>
	                </select>
	            </label>
			<?php
		}
	}

	Class Workart_Blog_Dropdown_Taxonomies_Control extends WP_Customize_Control {

		public $type = 'dropdown-taxonomies';

		public $taxonomy = '';

		public function __construct( $manager, $id, $args = array() ) {

			$taxonomy = 'category';
			if ( isset( $args['taxonomy'] ) ) {
				$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
				if ( true === $taxonomy_exist ) {
					$taxonomy = esc_attr( $args['taxonomy'] );
				}
			}
			$args['taxonomy'] = $taxonomy;
			$this->taxonomy = esc_attr( $taxonomy );

			parent::__construct( $manager, $id, $args );
		}

		public function render_content() {

			$tax_args = array(
				'hierarchical' => 0,
				'taxonomy'     => $this->taxonomy,
			);
			$taxonomies = get_categories( $tax_args );

		?>
	    <label>
	      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	      <?php if ( ! empty( $this->description ) ) : ?>
	      	<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
	      <?php endif; ?>
	       <select <?php $this->link(); ?>>
				<?php
				printf( '<option value="%s" %s>%s</option>', '', selected( $this->value(), '', false ), esc_html__( '--None--', 'workart-blog') );
				?>
				<?php if ( ! empty( $taxonomies ) ) :  ?>
	            <?php foreach ( $taxonomies as $key => $tax ) :  ?>
					<?php
					printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $this->value(), $tax->term_id, false ), esc_html( $tax->name ) );
					?>
	            <?php endforeach ?>
				<?php endif ?>
	       </select>
	    </label>
	    <?php
		}
	}

	$wp_customize->remove_section( 'colors' );

	require get_theme_file_path() . '/inc/topbar.php';

	require get_theme_file_path() . '/inc/slider.php';
	
	require get_theme_file_path() . '/inc/about.php';

	require get_theme_file_path() . '/inc/cta.php';	

	require get_theme_file_path() . '/inc/recent-posts.php';



}
add_action( 'customize_register', 'workart_blog_customize_register' );


function workart_blog_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'call_to_action_section_enable' )->value() );
}


function workart_blog_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'topbar_section_enable' )->value() );
}

function workart_blog_is_recent_posts_enable( $control ) {
	return ( $control->manager->get_setting( 'recent_posts_section_enable' )->value() );
}

function workart_blog_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'about_us_section_enable' )->value() );
}

function workart_blog_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'featured_slider_section_enable' )->value() );
}
