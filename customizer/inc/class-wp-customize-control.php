<?php
/**
 * WPshed Customizer custom control classes
 */
if ( !class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Add Categories control
 */
class WPC_Customize_Categories_Control extends WP_Customize_Control {

	public $type = 'categories';

	// Render the content
	public function render_content() {

		$dropdown = wp_dropdown_categories(
		array(
			'name'				 => '_customize-dropdown-categories-' . $this->id,
			'echo'				 => 0,
			'show_option_none'	 => __( '&mdash; Select &mdash;', 'marvy' ),
			'option_none_value'	 => '0',
			'hierarchical'		 => 1,
			'selected'			 => $this->value(),
		)
		);

		// Hackily add in the data link parameter.
		$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

		printf(
		'<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s</label>', $this->label, esc_html( $this->description ), $dropdown
		);
	}

}

/**
 * Add Menus control
 */
class WPC_Customize_Menus_Control extends WP_Customize_Control {

	public $type	 = 'menus';
	private $menus	 = false;

	public function __construct( $manager, $id, $args = array(), $options = array() ) {

		$this->menus = wp_get_nav_menus( $options );
		parent::__construct( $manager, $id, $args );
	}

	// Render the content
	public function render_content() {

		if ( empty( $this->menus ) ) {
			return;
		}
		?>

		<label class="customize-control-select">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
			<select <?php $this->link(); ?>>
				<option value=""><?php _e( '&mdash; Select &mdash;', 'marvy' ); ?></option>
				<?php
				foreach ( $this->menus as $menu ) {
					printf(
					'<option value="%s" %s>%s</option>', $menu->term_id, selected( $this->value(), $menu->term_id, false ), $menu->name
					);
				}
				?>
			</select>
		</label>
		<?php
	}

}

/**
 * Add Users control
 */
class WPC_Customize_Users_Control extends WP_Customize_Control {

	public $type	 = 'users';
	private $users	 = false;

	public function __construct( $manager, $id, $args = array(), $options = array() ) {

		$this->users = get_users( $options );
		parent::__construct( $manager, $id, $args );
	}

	// Render the content
	public function render_content() {

		if ( empty( $this->users ) ) {
			return;
		}
		?>

		<label class="customize-control-select">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<select <?php $this->link(); ?>>
				<option value=""><?php _e( '&mdash; Select &mdash;', 'marvy' ); ?></option>
				<?php
				foreach ( $this->users as $user ) {
					printf(
					'<option value="%s" %s>%s</option>', $user->data->ID, selected( $this->value(), $user->data->ID, false ), $user->data->display_name
					);
				}
				?>
			</select>
		</label>
		<?php
	}

}

/**
 * Add Posts control
 */
class WPC_Customize_Posts_Control extends WP_Customize_Control {

	public $type	 = 'posts';
	private $posts	 = false;

	public function __construct( $manager, $id, $args = array(), $options = array() ) {

		$postargs	 = wp_parse_args( $options, array( 'numberposts' => '-1' ) );
		$this->posts = get_posts( $postargs );
		parent::__construct( $manager, $id, $args );
	}

	// Render the content
	public function render_content() {

		if ( empty( $this->posts ) ) {
			return;
		}
		?>
		<label class="customize-control-select">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
			<select <?php $this->link(); ?>>
				<option value=""><?php _e( '&mdash; Select &mdash;', 'marvy' ); ?></option>
				<?php
				foreach ( $this->posts as $post ) {
					printf( '<option value="%s" %s>%s</option>', $post->ID, selected( $this->value(), $post->ID, false ), $post->post_title
					);
				}
				?>
			</select>
		</label>
		<?php
	}

}

/**
 * Add Post Types control
 */
class WPC_Customize_Post_Type_Control extends WP_Customize_Control {

	public $type		 = 'post_types';
	private $post_types	 = false;

	public function __construct( $manager, $id, $args = array(), $options = array() ) {

		$postargs			 = wp_parse_args( $options, array( 'public' => true ) );
		$this->post_types	 = get_post_types( $postargs, 'object' );
		parent::__construct( $manager, $id, $args );
	}

	// Render the content
	public function render_content() {

		if ( empty( $this->post_types ) ) {
			return;
		}
		?>
		<label class="customize-control-select">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<select <?php $this->link(); ?>>
				<option value=""><?php _e( '&mdash; Select &mdash;', 'marvy' ); ?></option>
				<?php
				foreach ( $this->post_types as $k => $post_type ) {
					printf(
					'<option value="%s" %s>%s</option>', $k, selected( $this->value(), $k, false ), $post_type->labels->name
					);
				}
				?>
			</select>
		</label>
		<?php
	}

}

/**
 * Add Tags control
 */
class WPC_Customize_Tags_Control extends WP_Customize_Control {

	public $type	 = 'tags';
	private $tags	 = false;

	public function __construct( $manager, $id, $args = array(), $options = array() ) {

		$this->tags = get_tags( $options );
		parent::__construct( $manager, $id, $args );
	}

	// Render the content
	public function render_content() {
		if ( empty( $this->tags ) ) {
			return;
		}
		?>
		<label class="customize-control-select">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<?php if ( !empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<select <?php $this->link(); ?>>
				<option value=""><?php _e( '&mdash; Select &mdash;', 'marvy' ); ?></option>
				<?php
				foreach ( $this->tags as $tag ) {
					printf(
					'<option value="%s" %s>%s</option>', $tag->term_id, selected( $this->value(), $tag->term_id, false ), $tag->name
					);
				}
				?>
			</select>
		</label>
		<?php
	}

}
