<?php
/**
 * _mbbasetheme Theme Customizer
 *
 * @package _mbbasetheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function _mbbasetheme_customize_register( $wp_customize ) {

	// Custom Branding
	//
	$wp_customize->add_section( 'mbdmaster_branding_section' , array(
    'title'       => __( 'Branding', 'mbdmaster' ),
    'priority'    => 30,
    'description' => 'Upload your logos here.',
 ) );
	
	// Hero logo 
	//
	$wp_customize->add_setting( 'mbdmaster_hero_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mbdmaster_hero_logo', array(
    'label'    => __( 'Hero Logo', 'mbdmaster' ),
    'section'  => 'mbdmaster_branding_section',
    'settings' => 'mbdmaster_hero_logo',
 ) ) );
	
	// Header Logo
	//
	$wp_customize->add_setting( 'mbdmaster_header_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mbdmaster_header_logo', array(
    'label'    => __( 'Header Logo', 'mbdmaster' ),
    'section'  => 'mbdmaster_branding_section',
    'settings' => 'mbdmaster_header_logo',
 ) ) );

	// Footer logo 
	//
	$wp_customize->add_setting( 'mbdmaster_footer_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mbdmaster_footer_logo', array(
    'label'    => __( 'Footer Logo', 'mbdmaster' ),
    'section'  => 'mbdmaster_branding_section',
    'settings' => 'mbdmaster_footer_logo',
 ) ) );

		// Custom hero background
	//
	$wp_customize->add_section( 'mbdmaster_hero_section' , array(
    'title'       => __( 'Hero Image', 'mbdmaster' ),
    'priority'    => 30,
    'description' => 'Add a full-width background image to your hero section.',
 ) );

	$wp_customize->add_setting( 'mbdmaster_hero_background' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mbdmaster_hero_background', array(
    'label'    => __( 'Hero Background Image', 'mbdmaster' ),
    'section'  => 'mbdmaster_hero_section',
    'settings' => 'mbdmaster_hero_background',
) ) );

	$wp_customize->add_section(
		// ID
		'layout_section',
		// Arguments array
		array(
			'title' => __( 'Layout', 'mbdmaster' ),
			'capability' => 'edit_theme_options',
			'description' => __( 'Allows you to edit your theme\'s layout.', 'mbdmaster' )
		)
	);
	$wp_customize->add_setting(
		// ID
		'mbdmaster_settings[layout_setting]',
		// Arguments array
		array(
			'default' => 'no-sidebar',
			'type' => 'option'
		)
	);

		// Add the featured content section.
	$wp_customize->add_section( 'featured_content', array(
		'title'    => __( 'Featured Content', 'twentyfourteen' ),
		'priority' => 120,
	) );

	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'featured_content_layout', array(
		'default'    => 'grid',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'featured_content_layout', array(
		'label'   => __( 'Layout', 'twentyfourteen' ),
		'section' => 'featured_content',
		'type'    => 'select',
		'choices' => array(
			'grid'   => __( 'Grid', 'twentyfourteen' ),
			'slider' => __( 'Slider', 'twentyfourteen' ),
		),
	) );

	$wp_customize->add_control(
		// ID
		'layout_control',
		// Arguments array
		array(
			'type' => 'radio',
			'label' => __( 'Theme layout', 'mbdmaster' ),
			'section' => 'layout_section',
			'choices' => array(
				'left-sidebar' => __( 'Left sidebar', 'mbdmaster' ),
				'right-sidebar' => __( 'Right sidebar', 'mbdmaster' ),
				'no-sidebar' => __( 'No sidebar', 'mbdmaster' ),
				
			),
			// This last one must match setting ID from above
			'settings' => 'mbdmaster_settings[layout_setting]'
		)
	);

	// Contact Details
	//
	//

	class MBD_Customize_Textarea_Control extends WP_Customize_Control {
  	public $type = 'textarea';
  	public function render_content() {
?>

  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
  </label>

<?php
  }
}
	$wp_customize->add_section( 'mbdmaster_contact_section' , array(
    	'title'       => __( 'Contact details', 'mbdmaster' ),
    	'priority'    => 30,
    	'description' => 'Your contact details.',
 	) );

	$wp_customize->add_setting( 'mbdmaster_contact_number' );

	$wp_customize->add_control( new MBD_Customize_Textarea_Control( $wp_customize, 'mbdmaster_contact_number', array(
    'label'    => __( 'Telephone Number', 'mbdmaster' ),
    'section'  => 'mbdmaster_contact_section',
    'settings' => 'mbdmaster_contact_number',
 ) ) );

	$wp_customize->add_setting( 'mbdmaster_email' );

	$wp_customize->add_control( new MBD_Customize_Textarea_Control( $wp_customize, 'mbdmaster_email', array(
    'label'    => __( 'Email address', 'mbdmaster' ),
    'section'  => 'mbdmaster_contact_section',
    'settings' => 'mbdmaster_email',
 ) ) );

	// Address
	
	$wp_customize->add_setting( 'mbdmaster_address' );

	$wp_customize->add_control( new MBD_Customize_Textarea_Control( $wp_customize, 'mbdmaster_address', array(
    'label'    => __( 'Street address', 'mbdmaster' ),
    'section'  => 'mbdmaster_contact_section',
    'settings' => 'mbdmaster_address',
 ) ) );

	$wp_customize->add_setting( 'mbdmaster_map_link' );

	$wp_customize->add_control( new MBD_Customize_Textarea_Control( $wp_customize, 'mbdmaster_map_link', array(
    'label'    => __( 'Link to map', 'mbdmaster' ),
    'section'  => 'mbdmaster_contact_section',
    'settings' => 'mbdmaster_map_link',
 ) ) );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', '_mbbasetheme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function _mbbasetheme_customize_preview_js() {
	wp_enqueue_script( '_mbbasetheme_customizer', get_template_directory_uri() . 'assets/js/vendor/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', '_mbbasetheme_customize_preview_js' );
